<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Downloads;
use App\Models\Downloadstable;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DownloadstableController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $downloadstable = Downloadstable::orderByDesc('created_at')->paginate(10);
        return view('admin.downloadstable.index', ['downloadstable' => $downloadstable]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.downloadstable.create');
        // return  redirect(route('downloadstable.index'));
    }

    // public function create1($tableId)
    // {
    //     $downloadstable = Downloadstable::find($tableId);
    //     $downloads = Downloadstable::all();
    //     return view('admin.downloads.create', compact('downloads', 'tableId'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $data=$request->all();
        $data['author'] = Auth::user()->name;
        $downloadstable = new Downloadstable();
        // $downloadstable->status='draft';
        if ($downloadstable->create($data)) {
            Toastr::success('Insertion Successfull!!');
            return redirect()->route('downloadstable.index');
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
    public function edit(Downloadstable $downloadstable)
    {

        return view('admin.downloadstable.edit', ['downloadstable' => $downloadstable]);
    }
    // public function edit(Downloadstable $downloadstable)
    // {
    //     $downloadstable = $downloadstable->with('downloads')->first();
    //     return view('admin.downloadstable.edit', ['downloadstable' => $downloadstable]);
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Downloadstable $downloadstable)
    {
        $data = $request->all();
        $downloadstable->update($data);

        $downloads = Downloads::where('table_id', $downloadstable->id)->get();
        foreach ($downloads as $download) {
            $download->update(['title' => $downloadstable->title]);
        }
        toastr::success('Updated Successfully!!');
        return redirect()->route('downloadstable.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $downloadstable = Downloadstable::findOrFail($id);
        $this->authorize('admin-only');
        $downloads = Downloads::where('table_id', $downloadstable->id)->get();
        foreach ($downloads as $download) {
            $filePath = public_path('storage/images/file/' . $download->file);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $download->delete();
        }
        $downloadstable->delete();

        Toastr::success('Deleted Successfully!!');
        return redirect(route('downloadstable.index'));
    }

    public function publish($id){
        $downloadstable = Downloadstable::find($id);
        $downloadstable->status='published';
        $downloadstable->save();
        return redirect()->route('downloadstable.index');
    }
}
