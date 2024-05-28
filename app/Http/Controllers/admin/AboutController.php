<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AboutController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::orderByDesc('created_at')->paginate(10);
        return view('admin.about.about', ['about' => $about]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.publish');
        // return  redirect(route('about.index'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $data=$request->all();
        $data['author'] = Auth::user()->name;
        if($request->hasFile('image')){
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images/about/', $imageName);
        $data['image'] = $imageName;
        }

        $about = new About();
        // $about->status='draft';
        if ($about->create($data)) {
            Toastr::success('Insertion Successfull!!');
            return redirect()->route('about.index');
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
    public function edit(About $about)
    {

        return view('admin.about.edit', ['about' => $about]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/about/', $imageName);
            $data['image'] = $imageName;
        }

        $about->update($data);
        toastr::success('Updated Successfully!!');
        return redirect()->route('about.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $about = About::findOrFail($id);

        $this->authorize('admin-only');
        $imagePath = $about->image;
        $fullPath = public_path('storage/images/about/'.$imagePath);
        if (file_exists($fullPath)) {
            if (is_file($fullPath)) {
                unlink($fullPath);
            }
        }
        $about->delete();
        toastr::success('Deleted Successfully!!');
        return redirect(route('about.index'));

    }
    public function publish(About $about)
    {
         $about->status = 'published';
        $about->save();

        return redirect()->route('about.index');
    }
}
