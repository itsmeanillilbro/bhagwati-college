<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SSR;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SSRController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ssr = SSR::orderByDesc('created_at')->paginate(10);
        return view('admin.ssr.index', ['ssr' => $ssr]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ssr.create');
        // return  redirect(route('ssr.index'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $data=$request->all();
        $data['author'] = Auth::user()->name;
        if($request->hasFile('file')){
        $image = $request->file('file');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images/file/', $imageName);
        $data['file'] = $imageName;
        }

        $ssr = new SSR();
        // $ssr->status='draft';
        if ($ssr->create($data)) {
            Toastr::success('Insertion Successfull!!');
            return redirect()->route('ssr.index');
        }
        return redirect()->back();
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
    public function edit(SSR $ssr)
    {

        return view('admin.ssr.edit', ['ssr' => $ssr]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SSR $ssr)
    {
        $data = $request->all();

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/file/', $imageName);
            $data['file'] = $imageName;
        }

        $ssr->update($data);
        toastr::success('Updated Successfully!!');
        return redirect()->route('ssr.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ssr = SSR::findOrFail($id);
        $this->authorize('admin-only');
        $imagePath = $ssr->image;
        $fullPath = public_path('storage/images/file/'.$imagePath);
        if (file_exists($fullPath)) {
            if (is_file($fullPath)) {
                unlink($fullPath);
            }
        }
        $ssr->delete();
        toastr::success('Deleted Successfully!!');
        return redirect(route('ssr.index'));

    }
    public function publish($id){
        $ssr = SSR::find($id);
        $ssr->status='published';
        $ssr->save();
        return redirect()->route('ssr.index');
    }
}
