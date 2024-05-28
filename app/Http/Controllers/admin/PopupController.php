<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Popup;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PopupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $popup = Popup::orderByDesc('created_at')->paginate(10);
        return view('admin.popup.index', ['popup'=>$popup]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.popup.create');
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

            $image->storeAs('public/images/popup/', $imageName);
            $data['image'] = $imageName;
            }

            $popup = new Popup();
            $popup->status='draft';

            if ($popup->create($data)) {
                Toastr::success('Popup inserted successfully','Inserted');
                return redirect()->route('popup.index');
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
    public function edit(Popup $popup)
    {
        return view('admin.popup.edit',['popup'=>$popup]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Popup $popup)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/popup/', $imageName);
            $data['image'] = $imageName;
        }

        $popup->update($data);
        toastr::success('Updated Successfully');
        return redirect()->route('popup.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $popup=Popup::findOrFail($id);
        $this->authorize('admin-only');
        $imagePath = $popup->news_img;
        $fullPath = public_path('storage/images/popup/'.$imagePath);
        if (file_exists($fullPath)) {
            if (is_file($fullPath)) {
                unlink($fullPath);
            }
        }
        $popup->delete();
        toastr::success('Deleted Successfully');
        return redirect(route('popup.index'));
    }

    public function publish($id){
        $popup = Popup::find($id);
        $popup->status='published';
        $popup->save();
        return redirect()->route('popup.index');
    }
}
