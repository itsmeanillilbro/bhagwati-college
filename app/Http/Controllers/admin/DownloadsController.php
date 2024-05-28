<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Downloads;
use App\Models\Downloadstable;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DownloadsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $downloads = Downloads::with('downloadstable')->orderByDesc('created_at')->paginate(10);
        return view('admin.downloads.index', ['downloads' => $downloads]);
    }

    public function list(Request $request, $table_id)
    {
        $downloads = Downloads::where('table_id', $table_id)->with('downloadstable')->orderByDesc('created_at')->paginate(10);
        return view('admin.downloads.index', ['downloads' => $downloads, 'tableId' => $table_id]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create($tableId )
    {
        $downloadstable = Downloadstable::find($tableId);
        $downloads = Downloadstable::all();
        return view('admin.downloads.create', compact('downloads', 'tableId'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $downloadstable = Downloadstable::find($data['table_id']);
        $data['title'] = $downloadstable->title;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images/file/', $fileName);
            $data['file'] = $fileName;
        }
        $downloads = new Downloads();
        // $downloads->status='draft';
        if ($downloads->create($data)) {
            Toastr::success('Insertion Successfull!!');
            $url = route('downloads.list', ['table_id' => $data['table_id']]);
            return Redirect::to($url);
        }
        return redirect()->back();
    }

    public function update(Request $request, Downloads $download)
    {
        $data = $request->all();
        $downloadstable = Downloadstable::find(['table_id']);
        $data['title'] = $downloadstable->title;
        $download->update($data);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }




    public function destroy($id)
    {
        $downloads = Downloads::findOrFail($id);
        $this->authorize('admin-only');
        $table_id = $downloads->table_id;

        $imagePath = $downloads->file;
        $fullPath = public_path('storage/images/file/' . $imagePath);
        if (file_exists($fullPath)) {
            if (is_file($fullPath)) {
                unlink($fullPath);
            }
        }
        $downloads->delete();
        Toastr::success('Deleted Successfully!!');
        $url = route('downloads.list', ['table_id' => $table_id]);
        return Redirect::to($url);
    }

}
