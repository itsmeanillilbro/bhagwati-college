<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Auth;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::orderByDesc('created_at')->paginate(10);
        return view('admin.news.news', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.publish');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->all();
        $data['author'] = Auth::user()->name;
        if($request->hasFile('news_img')){
        $image = $request->file('news_img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $image->storeAs('public/images/news/', $imageName);
        $data['news_img'] = $imageName;
        }

        $news = new News();
        $news->status='draft';

        if ($news->create($data)) {
            Toastr::success('News inserted successfully','Inserted');
            return redirect()->route('news.index');
        } else {
            Toastr::error('Error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $data = $request->all();

        if ($request->hasFile('news_img')) {
            $image = $request->file('news_img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/news/', $imageName);
            $data['news_img'] = $imageName;
        }

        $news->update($data);
        toastr::success('Updated Successfully');
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)

    {
        $news=News::findOrFail($id);
        $this->authorize('admin-only');
        $imagePath = $news->news_img;
        $fullPath = public_path('storage/images/news/'.$imagePath);
        if (file_exists($fullPath)) {
            if (is_file($fullPath)) {
                unlink($fullPath);
            }
        }
        $news   ->delete();
        toastr::success('Deleted Successfully');
        return redirect(route('news.index'));
    }

    public function publish(News $news)
    {
        $news->status = 'published';
        $news->save();

        return redirect()->route('news.index');
    }
}
