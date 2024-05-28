<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Academic;
use App\Models\Banner;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\News;
use App\Models\Notice;
use App\Models\Popup;
use App\Models\Submenu;
use App\Models\subsubmenu;
use App\Models\Teams;
use App\Models\Testimonial;
use App\Models\Timeline;
use App\Models\Topbanner;
use App\Models\User;
use App\Models\Users;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index()
    {

        $username = Auth::user()->name;
        $userscount = User::count();
        $topbannerCount = Topbanner::count();
        $popupcount = Popup::count();
        $menucount = Menu::count();
        $submenucount = Submenu::count();
        $subsubmenucount = subsubmenu::count();
        $bannercount = Banner::count();
        $noticecount = Notice::count();
        $newscount = News::count();
        $timelinecount = Timeline::count();
        $academiccount = Academic::count();
        $gallerycount = Gallery::count();
        $testimonialcount = Testimonial::count();
        $teamscount = Teams::count();
        return view(
            'admin.dashboard',
            compact(
                'topbannerCount',
                'popupcount',
                'menucount',
                'submenucount',
                'subsubmenucount',
                'bannercount',
                'noticecount',
                'newscount',
                'timelinecount',
                'academiccount',
                'gallerycount',
                'testimonialcount',
                'teamscount',
                'userscount',
                'username'
            )
        );
    }


}


