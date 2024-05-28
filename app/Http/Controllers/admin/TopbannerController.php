<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Topbanner;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TopbannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topbanner = Topbanner::orderByDesc('created_at')->get();
        return view('admin.topbanner.index', ['topbanner'=>$topbanner]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.topbanner.create');
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

            $image->storeAs('public/images/topbanner/', $imageName);
            $data['image'] = $imageName;
            }

            $topbanner = new Topbanner();
            $topbanner->status='draft';

            if ($topbanner->create($data)) {
                Toastr::success('Banner inserted successfully','Inserted');
                return redirect()->route('topbanner.index');
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
    public function edit(Topbanner $topbanner)
    {
        return view('admin.topbanner.edit',['topbanner'=>$topbanner]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topbanner $topbanner)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/topbanner/', $imageName);
            $data['image'] = $imageName;
        }

        $topbanner->update($data);
        toastr::success('Updated Successfully');
        return redirect()->route('topbanner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $topbanner=Topbanner::findOrFail($id);
        $this->authorize('admin-only');
        $imagePath = $topbanner->news_img;
        $fullPath = public_path('storage/images/topbanner/'.$imagePath);
        if (file_exists($fullPath)) {
            if (is_file($fullPath)) {
                unlink($fullPath);
            }
        }
        $topbanner->delete();
        toastr::success('Deleted Successfully');
        return redirect(route('topbanner.index'));
    }

    public function publish($id){
        $topbanner = Topbanner::find($id);
        $topbanner->status='published';
        $topbanner->save();
        return redirect()->route('topbanner.index');
    }
}
