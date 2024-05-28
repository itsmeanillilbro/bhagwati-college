<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use App\Models\Menu;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = Menu::orderByDesc('created_at')->paginate(10);
        return view('admin.menu.index', ['menu' => $menu]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.menu.create');
        // return  redirect(route('menu.index'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $data=$request->all();
        $data['author'] = Auth::user()->name;
        $menu = new Menu();
        // $menu->status='draft';
        if ($menu->create($data)) {
            Toastr::success('Insertion Successfull!!');
            return redirect()->route('menu.index');
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
    public function edit(Menu $menu)
    {

        return view('admin.menu.edit', ['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $data = $request->all();
        $menu->update($data);
        toastr::success('Updated Successfully!!');
        return redirect()->route('menu.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $this->authorize('admin-only');
        $menu->delete();
        toastr::success('Deleted Successfully!!');
        return redirect(route('menu.index'));

    }
    public function publish($id){
        $menu = Menu::find($id);
        $menu->status='published';
        $menu->save();
        return redirect()->route('menu.index');
    }
}
