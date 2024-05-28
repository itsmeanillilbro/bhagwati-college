<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Images;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gallery = Gallery::orderByDesc('created_at')->paginate(10);
        return view('admin.gallery.index', ['gallery'=>$gallery]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */

            public function store(Request $request)
            {
               $data= $request->all();

                $data['author'] = Auth::user()->name;
                $data['status'] = 'draft'; // Assuming draft is the default status

                try {
                    $gallery = Gallery::create($data);

                    if ($request->hasFile('image')) {
                        $image = $request->file('image');
                        $imageName = time() . '.' . $image->getClientOriginalExtension();
                        $image->storeAs('public/images/gallery/', $imageName);
                        $gallery->image = $imageName;
                        $gallery->save(); // Update gallery with cover image path
                    }

                    if ($request->hasFile('multipleimages')) {
                        $imageNames = [];
                        foreach ($request->file('multipleimages') as $image) {
                            $imageName = time() . '_' . $image->getClientOriginalName();
                            $image->storeAs('public/images/gallery/', $imageName);
                            $imageNames[] = $imageName;

                            $newImage = new Images();
                            $newImage->images = $imageName;
                            $newImage->gallery_id = $gallery->id;
                            $newImage->save();
                        }

                    }

                    toastr::success('Images inserted successfully', 'Inserted');
                    return redirect()->route('gallery.index');
                } catch (\Exception $e) {
                    toastr::error('Error creating gallery: ' . $e->getMessage());
                    return back()->withInput();
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
    public function edit(gallery $gallery)
    {
        return view('admin.gallery.edit',['gallery'=>$gallery]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, gallery $gallery)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/gallery/', $imageName);
            $data['image'] = $imageName;
        }

        $gallery->update($data);
        toastr::success('Updated Successfully');
        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        $this->authorize('admin-only');
        $imagePath = $gallery->image;
        $fullPath = public_path('storage/images/gallery/'.$imagePath);
        if (file_exists($fullPath)) {
            if (is_file($fullPath)) {
                unlink($fullPath);
            }
        }
        $images = Images::where('gallery_id', $gallery->id)->get();
        foreach ($images as $image) {
            $imagePath = $image->images;
            $fullPath = public_path('storage/images/gallery/' . $imagePath);
            if (file_exists($fullPath) && is_file($fullPath)) {
                unlink($fullPath);
            }
            $image->delete();
        }
        $gallery->delete();

        Toastr::success('Deleted Successfully');
        return redirect(route('gallery.index'));
    }


    public function publish($id){
        $gallery = Gallery::find($id);
        $gallery->status='published';
        $gallery->save();
        return redirect()->route('gallery.index');
    }




}
