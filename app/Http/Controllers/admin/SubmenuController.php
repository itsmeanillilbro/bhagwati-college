<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Submenu;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $submenu = Submenu::with('menu')->orderByDesc('created_at')->paginate(10);
        return view('admin.submenu.index', ['submenu' => $submenu]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = Menu::all();
        $submenu = Submenu::all();
        return view('admin.submenu.create', compact('menus', 'submenu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $data=$request->all();
        $data['author'] = Auth::user()->name;

      $menu = Menu::find($data['menu_id']);
    $data['title'] = $menu->title;
        $submenu = new Submenu();
        $submenu->status='draft';
        if ($submenu->create($data)) {
            Toastr::success('Insertion Successfull!!');
            return redirect()->route('submenu.index');
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
    public function edit(Submenu $submenu )
    {
        $menus = Menu::all();
        return view('admin.submenu.edit', ['submenu' => $submenu, 'menus'=>$menus]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Submenu $submenu)
    {
        $data = $request->all();

        $submenu->update($data);
        toastr::success('Updated Successfully!!');
        return redirect()->route('submenu.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $submenu = Submenu::findOrFail($id);
        $this->authorize('admin-only');
        $submenu->delete();
        toastr::success('Deleted Successfully!!');
        return redirect(route('submenu.index'));

    }
    public function publish($id){
        $submenu = Submenu::find($id);
        $submenu->status='published';
        $submenu->save();
        return redirect()->route('submenu.index');
    }
}
