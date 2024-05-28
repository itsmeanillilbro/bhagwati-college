<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\Timeline;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timeline = Timeline::orderByDesc('created_at')->paginate(10);
        return view('admin.timeline.index', ['timeline'=>$timeline]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.timeline.create');
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

            $image->storeAs('public/images/timeline/', $imageName);
            $data['image'] = $imageName;
            }

            $timeline = new Timeline();
            $timeline->status='draft';

            if ($timeline->create($data)) {
                Toastr::success('Timeline inserted successfully','Inserted');
                return redirect()->route('timeline.index');
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
    public function edit(Timeline $timeline)
    {
        return view('admin.timeline.edit',['timeline'=>$timeline]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Timeline $timeline)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/timeline/', $imageName);
            $data['image'] = $imageName;
        }

        $timeline->update($data);
        toastr::success('Updated Successfully');
        return redirect()->route('timeline.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $timeline=Timeline::findOrFail($id);
        $this->authorize('admin-only');
        $imagePath = $timeline->news_img;
        $fullPath = public_path('storage/images/timeline/'.$imagePath);
        if (file_exists($fullPath)) {
            if (is_file($fullPath)) {
                unlink($fullPath);
            }
        }
        $timeline->delete();
        toastr::success('Deleted Successfully');
        return redirect(route('timeline.index'));
    }

    public function publish($id){
        $timeline = Timeline::find($id);
        $timeline->status='published';
        $timeline->save();
        return redirect()->route('timeline.index');
    }
}
