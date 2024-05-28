<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonial = Testimonial::orderByDesc('created_at')->paginate(10);
        return view('admin.testimonial.index',['testimonial'=>$testimonial]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $data = $request->all();
    $data['author'] = Auth::user()->name;

    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images/testimonial/', $imageName);
        $data['image'] = $imageName;
    }
    $testimonial = new Testimonial();
    $testimonial->status = 'draft';
    if ($testimonial->create($data)) {
        Toastr::success('Data Inserted Successfully');
        return redirect()->route('testimonial.index');
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
    public function edit(Testimonial $testimonial)
    {

        return view('admin.testimonial.edit',['testimonial'=>$testimonial]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->all();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time(). '.' .$image->getClientOriginalExtension();
            $image -> storeAs('public/images/testimonial/'.$imageName);
            $data['image']= $imageName;
        }
        $testimonial->update($data);
        toastr::success('Updated Successfully!!');
        return redirect()->route('testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $this->authorize('admin-only');
        $imagePath = $testimonial->image;
        $fullPath= public_path('storage/images/testimonial/'.$imagePath);
        if (file_exists($fullPath)) {
            if (is_file($fullPath)) {
                unlink($fullPath);
            }
        }
        $testimonial->delete();
        toastr::success('Deleted Successfully!!');
        return redirect()->route('testimonial.index');
    }

    public function publish(Testimonial $testimonial)
    {
        $testimonial->status = 'published';

        $testimonial->save();

        return redirect()->route('testimonial.index');
    }
}
