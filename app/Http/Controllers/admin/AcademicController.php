<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Academic;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class AcademicController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academic = Academic::orderByDesc('created_at')->paginate(10);
        return view('admin.academics.index',['academic'=>$academic]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.academics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['author'] = Auth::user()->name;
        if($request->hasFile('academic_img')){
            $image = $request->file('academic_img');
            $imageName = time(). '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/academic/', $imageName);
            $data['academic_img'] = $imageName;
        }
        $academics = new Academic();
        if($academics->create($data)){
            Toastr::success('Insertion Successfull');
            return redirect()->route('academic.index');
        }else{
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
    public function edit(Academic $academic)
    {
        return view('admin.academics.edit',['academic' => $academic]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Academic $academic)
    {
        $data = $request->all();
        if($request->hasFile('academic_img')){
            $image = $request->file('academic_img');
            $imageName = time(). '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/academic/', $imageName);
            $data['academic_img'] = $imageName;
        }
        $academic->update($data);
        Toastr::success('Updated Successfully');
        return redirect()->route('academic.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $academics =  Academic::findOrFail($id);
       $this->authorize('admin-only');
       $imageName = $academics->academic_img;
       $imagePath = public_path('storage/images/academic/'.$imageName);
       if(file_exists($imagePath)){
        if(is_file($imagePath)){
            unlink($imagePath);
        }
       }
       $academics->delete();
       toastr::success('Deleted Successufully');
       return redirect()->route('academic.index');

    }

    public function publish($id){
        $academic = Academic::find($id);
        $academic->status='published';
        $academic->save();
        return redirect()->route('academic.index');
    }
}
