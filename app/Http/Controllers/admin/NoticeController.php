<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Notice;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class NoticeController extends Controller

{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notice = Notice::orderByDesc('created_at')->paginate(10);
        return view('admin.notice.index', ['notice'=>$notice]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.notice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['author']=Auth::user()->name;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->storeAs('public/images/notice/', $imageName);
            $data['image'] = $imageName;
            }

            $notice = new Notice();
            $notice->status='draft';

            if ($notice->create($data)) {
                Toastr::success('Notice inserted successfully','Inserted');
                return redirect()->route('notice.index');
            } else {
                Toastr::error('Error');
                return redirect()->back();
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notice $notice)
    {
        return view('admin.notice.edit',['notice'=>$notice]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notice $notice)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/notice/', $imageName);
            $data['image'] = $imageName;
        }

        $notice->update($data);
        toastr::success('Updated Successfully');
        return redirect()->route('notice.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)

    {

        $notice=Notice::findOrFail($id);
        $this->authorize('admin-only');
        $imagePath = $notice->image;
        $fullPath = public_path('storage/images/notice/'.$imagePath);
        if (file_exists($fullPath)) {
            if (is_file($fullPath)) {
                unlink($fullPath);
            }
        }
        $notice->delete();
        toastr::success('Deleted Successfully');
        return redirect(route('notice.index'));
    }

    public function publish($id){
        $notice = Notice::find($id);
        $notice->status='published';
        $notice->save();
        return redirect()->route('notice.index');
    }
}
