<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\Submenu;
use App\Models\subsubmenu;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubsubmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subsubmenu = subsubmenu::with('submenu')->orderByDesc('created_at')->paginate(10);
        return view('admin.subsubmenu.index', ['subsubmenu' => $subsubmenu]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $submenus = Submenu::all();

        return view('admin.subsubmenu.create', compact('submenus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $data=$request->all();
        $data['author'] = Auth::user()->name;

      $submenu = Submenu::find($data['submenu_id']);
        $data['submenutitle'] = $submenu->title1;
        $subsubmenu = new subsubmenu();
        $subsubmenu->status='draft';
        if ($subsubmenu->create($data)) {
            Toastr::success('Insertion Successfull!!');
            return redirect()->route('subsubmenu.index');
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
    public function edit(subsubmenu $subsubmenu)
    {
        $menus = Submenu::all();
        return view('admin.subsubmenu.edit', ['subsubmenu' => $subsubmenu, 'menus'=>$menus]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,subsubmenu $subsubmenu)
    {
        $data = $request->all();
        $subsubmenu->update($data);
        toastr::success('Updated Successfully!!');
        return redirect()->route('subsubmenu.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subsubmenu = subsubmenu::findOrFail($id);
        $this->authorize('admin-only');
        $subsubmenu->delete();
        toastr::success('Deleted Successfully!!');
        return redirect(route('subsubmenu.index'));

    }
    public function publish($id){
        $subsubmenu = subsubmenu::find($id);
        $subsubmenu->status='published';
        $subsubmenu->save();
        return redirect()->route('subsubmenu.index');
    }
}
