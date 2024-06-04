<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Academic;
use App\Models\Banner;
use App\Models\Downloads;
use App\Models\Downloadstable;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\News;
use App\Models\Notice;
use App\Models\Popup;
use App\Models\SSR;
use App\Models\Submenu;

use App\Models\subsubmenu;
use App\Models\Teams;
use App\Models\Testimonial;
use App\Models\Timeline;
use App\Models\Topbanner;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Zerkxubas\EsewaLaravel\Facades\Esewa;

class HomeController extends Controller
{


    public function index()
    {
        $gallery = Gallery::where('status', 'published')->orderByDesc('created_at')->take(6)->get();

        $topbanner = Topbanner::where('status', 'published')->orderByDesc('created_at')->take(1)->get();
        $menu = Menu::where('status', 'published')->orderByDesc('created_at')->get();
        $submenu = Submenu::orderByDesc('created_at')->get();
        $subsubmenu = subsubmenu::orderByDesc('created_at')->get();
        $banner = Banner::where('status', 'published')->orderByDesc('created_at')->take(3)->get();
        $popup = Popup::where('status', 'published')->orderByDesc('created_at')->take(2)->get();
        $timeline = Timeline::where('status', 'published')->orderByDesc('created_at')->get();
        $testimonial = Testimonial::where('status', 'published')->orderByDesc('created_at')->take(3)->get();
        $academics = Academic::where('status', 'published')->orderByDesc('created_at')->take(6)->get();
        $notices = Notice::where('status', 'published')->orderByDesc('created_at')->take(6)->get();
        $news = News::where('status', 'published')->orderByDesc('created_at')->take(6)->get();
        return view(
            'frontend.index',
            compact(
                'news',
                'notices',
                'academics',
                'testimonial',
                'timeline',
                'popup',
                'banner',
                'menu',
                'submenu',
                'subsubmenu',
                'topbanner',
                'gallery'
            )
        );

    }


    public function download()
    {

        $downloadstable = Downloadstable::where('status', 'published')->orderByDesc('created_at')->get();
        $downloadsWithTables = [];

        foreach ($downloadstable as $table) {
            $downloads = Downloads::where('table_id', $table->id)->get();
            $downloadsWithTables[$table->id] = [
                'table' => $table,
                'downloads' => $downloads,
            ];
        }

        return view('frontend.download', compact('downloadsWithTables'));
    }

    public function academics()
    {
        $academics = Academic::where('status', 'published')->orderByDesc('created_at')->paginate(6);
        return view('frontend.academics', compact('academics'));
    }
    public function alumni()
    {
        return view('frontend.alumni');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function dropdown()
    {
        return view('frontend.dropdown');
    }

    public function gallery()
    {
        $gallery = Gallery::where('status', 'published')->orderByDesc('created_at')->get();
        return view('frontend.gallery', compact('gallery'));
    }
    public function showImages($gallery_id)
    {
        $gallery = Gallery::findOrFail($gallery_id);
        $images = $gallery->images()->get();
        return view('frontend.images', compact('gallery', 'images'));
    }
    public function privacy()
    {
        return view('frontend.privacy');
    }
    public function academicdetails()
    {
        return view('frontend.academicdetails');
    }

    public function showAcademics($id)
    {
        $academics = Academic::findOrFail($id);
        return view('frontend.academicdetails', compact('academics'));
    }

    public function images()
    {
        return view('frontend.images');
    }
    public function teams()
    {
        $teams = Teams::where('status', 'published')->orderByDesc('created_at')->get();
        return view('frontend.teams', compact('teams'));
    }
    public function terms()
    {
        return view('frontend.terms');
    }


    public function notice()
    {
        $notices = Notice::where('status', 'published')->orderByDesc('created_at')->paginate(6);

        return view('frontend.notice', compact('notices'));
    }

    public function about(About $about)
    {
        $entries = About::where('status', 'published')->get();
        return view('frontend.about', compact('entries'));
    }

    public function menubody($id)
    {
        $menubody = Menu::findOrFail($id);
        if ($menubody->password === 'yes') {
            $token = request()->query('auth_token');
            $sessionToken = session('auth_token');
            if ($token !== $sessionToken) {

                session()->forget('auth_token');
                return redirect()->route('auth');
            }
        }

        if (filter_var($menubody->link, FILTER_VALIDATE_URL)) {
            return redirect()->away($menubody->link);
        } else {
            return view('frontend.menubody', compact('menubody'));
        }
    }

    public function submenubody($id)
    {
        $submenubody = Submenu::findOrFail($id);
        if ($submenubody->password === 'yes') {
            $token = request()->query('auth_token');
            $sessionToken = session('auth_token');
            if ($token !== $sessionToken) {

                session()->forget('auth_token');
                return redirect()->route('auth');
            }
        }
        if (filter_var($submenubody->link, FILTER_VALIDATE_URL)) {
            return redirect()->away($submenubody->link);
        } else {
            return view('frontend.submenubody', compact('submenubody'));
        }
    }

    public function subsubmenubody($id)
    {
        $subsubmenubody = Subsubmenu::findOrFail($id);
        if ($subsubmenubody->password === 'yes') {
            $token = request()->query('auth_token');
            $sessionToken = session('auth_token');
            if ($token !== $sessionToken) {

                session()->forget('auth_token');
                return redirect()->route('auth');
            }
        }
        if (filter_var($subsubmenubody->link, FILTER_VALIDATE_URL)) {
            return redirect()->away($subsubmenubody->link);
        } else {
            return view('frontend.subsubmenubody', compact('subsubmenubody'));
        }
    }

    public function verify(Request $request)
    {
        $correctPassword = 'yoo';

        if ($request->password === $correctPassword) {
            session()->put('authenticated', true);
            $intendedUrl = session()->get('auth_intended_url', url('/'));
            session()->forget('auth_intended_url');
            return redirect($intendedUrl);
        } else {
            Toastr::error("Wrong Password");
            return redirect()->route('auth');
        }
    }


    public function auth()
    {
        return view('frontend.ssrauth');
    }

    public function news()
    {

        $news = News::orderBy('created_at', 'desc')->paginate(6);
        return view('frontend.news', compact('news'));
    }

    public function newsdetails($id)
    {

        $news = News::all();
        $news = News::findOrFail($id);
        return view('frontend.newsdetails', compact('news'));
    }

    private function getCommonData()
    {
        return [
            'topbanner' => Topbanner::where('status', 'published')->orderByDesc('created_at')->take(1)->get(),
            'menu' => Menu::where('status', 'published')->orderByDesc('created_at')->get(),
            'submenu' => Submenu::orderByDesc('created_at')->get(),
            'subsubmenu' => subsubmenu::orderByDesc('created_at')->get(),
        ];
    }

}

