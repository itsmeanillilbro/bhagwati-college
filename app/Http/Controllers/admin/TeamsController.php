<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Teams;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Teams::orderByDesc('created_at')->paginate(10);
        return view('admin.teams.index', ['teams'=>$teams]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teams.create');
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

            $image->storeAs('public/images/team/', $imageName);
            $data['image'] = $imageName;
            }

            $teams = new Teams();
            $teams->status='draft';

            if ($teams->create($data)) {
                Toastr::success('teams inserted successfully','Inserted');
                return redirect()->route('teams.index');
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
    public function edit(Teams $team)
    {
        return view('admin.teams.edit',['team'=>$team]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teams $team)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/team/', $imageName);
            $data['image'] = $imageName;
        }

        $team->update($data);
        toastr::success('Updated Successfully');
        return redirect()->route('teams.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teams=Teams::findOrFail($id);
        $this->authorize('admin-only');
        $imagePath = $teams->news_img;
        $fullPath = public_path('storage/images/team/'.$imagePath);
        if (file_exists($fullPath)) {
            if (is_file($fullPath)) {
                unlink($fullPath);
            }
        }
        $teams->delete();
        toastr::success('Deleted Successfully');
        return redirect(route('teams.index'));
    }

    public function publish($id){
        $teams = Teams::find($id);
        $teams->status='published';
        $teams->save();
        return redirect()->route('teams.index');
    }
}
