<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Images;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

//      public function index()
// {

//     $images = Images::with('gallery')->orderByDesc('created_at')->get();
//     return view('admin.images.index', ['images' => $images]);
// }
public function list(Request $request, $gallery_id)
{
  $gallery = Gallery::findOrFail($gallery_id);
  $imagesFromMultipleimages = json_decode($gallery->multipleimages, true);
  $imagesFromModel = Images::where('gallery_id', $gallery_id)->orderByDesc('created_at')->get();
  if (isset($imagesFromMultipleimages) && isset($imagesFromModel)) {
    $images = array_merge($imagesFromMultipleimages, $imagesFromModel->toArray());
  } else {
    $images = (isset($imagesFromMultipleimages)) ? $imagesFromMultipleimages : $imagesFromModel;
  }

  return view('admin.images.index', compact('images', 'gallery_id'));
}

    /**
     * Show the form for creating a new resource.
     */
//     public function create(Request $request)
// {

//     return view('admin.images.create');
// }
public function create($gallery_id)
{
    $gallery = Gallery::find($gallery_id);
    $images = Gallery::all();
    return view('admin.images.create', compact('images', 'gallery_id'));
}

public function store(Request $request)
{
  $data = $request->all();

  if ($request->hasFile('images')) {
    $images = $request->file('images');

    foreach ($images as $image) {
      $imageName = time() . '_' . $image->getClientOriginalName();
      $image->storeAs('public/images/gallery/', $imageName);

      $imageModel = new Images();
      $imageModel->images = $imageName;

      if ($request->filled('gallery_id')) {
        $imageModel->gallery_id = $request->input('gallery_id');
      }

      if ($imageModel->save()) {
        Toastr::success('Image uploaded successfully', 'Inserted');
      } else {
        Toastr::error('Failed to save image');
      }
    }

    $url = route('images.list', ['gallery_id' => $data['gallery_id']]);
    return Redirect::to($url);
  } else {

    Toastr::error('Please select images to upload');
    return redirect()->back();
  }
}
public function destroy(string $id)
{
    $image = Images::findOrFail($id);
    $this->authorize('admin-only');
    $imagePath = $image->images;
    $fullPath = public_path('storage/images/gallery/'.$imagePath);

    if (file_exists($fullPath) && is_file($fullPath)) {
        unlink($fullPath);
    }

    $gallery_id = $image->gallery_id;
    $image->delete();

    Toastr::success('Image deleted successfully');
    return redirect()->route('images.list', ['gallery_id' => $gallery_id]);
}

}
