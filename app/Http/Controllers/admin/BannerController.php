<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Popup;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = Banner::orderByDesc('created_at')->paginate(10);
        return view('admin.banner.index', ['banner'=>$banner]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.create');
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

            $image->storeAs('public/images/banner/', $imageName);
            $data['image'] = $imageName;
            }

            $banner = new Banner();
            $banner->status='draft';

            if ($banner->create($data)) {
                Toastr::success('Banner inserted successfully','Inserted');
                return redirect()->route('banner.index');
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
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit',['banner'=>$banner]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/banner/', $imageName);
            $data['image'] = $imageName;
        }

        $banner->update($data);
        toastr::success('Updated Successfully');
        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner=Banner::findOrFail($id);
        $this->authorize('admin-only');
        $imagePath = $banner->news_img;
        $fullPath = public_path('storage/images/banner/'.$imagePath);
        if (file_exists($fullPath)) {
            if (is_file($fullPath)) {
                unlink($fullPath);
            }
        }
        $banner->delete();
        toastr::success('Deleted Successfully');
        return redirect(route('banner.index'));
    }

    public function publish($id){
        $banner = Banner::find($id);
        $banner->status='published';
        $banner->save();
        return redirect()->route('banner.index');
    }
}
