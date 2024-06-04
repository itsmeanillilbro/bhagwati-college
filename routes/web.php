<?php

use App\Filament\Admin\Resources\BanneResource;
use App\Http\Controllers\admin\AcademicController;
use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\DownloadsController;
use App\Http\Controllers\admin\DownloadstableController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\ImagesController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\NoticeController;
use App\Http\Controllers\admin\SSRController;
use App\Http\Controllers\admin\SubmenuController;

use App\Http\Controllers\admin\SubsubmenuController;
use App\Http\Controllers\admin\TeamsController;
use App\Http\Controllers\admin\TimelineController;
use App\Http\Controllers\admin\TopbannerController;
use App\Http\Controllers\admin\usersController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\PopupController;

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\PageAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\TestimonialController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })
// ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile1', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile1', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile', [usersController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/login', [AdminController::class, 'index']);
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
    Route::get('/adminpanel', [AdminController::class, 'index']);
    Route::get('/panel', [AdminController::class, 'index']);
    // Route::get('/admin/profile', [AdminController::class, 'profile'])->name('adminprofile');
    // Route::get('/admin/about', [AdminController::class, 'about'])->name('adminabout');
    // Route::get('/admin/edit', [AdminController::class, 'edit'])->name('adminedit');
    // Route::get('/admin/publish', [AdminController::class, 'publish'])->name('adminpublish');
    // Route::get('/admin/news', [AdminController::class, 'news'])->name('adminnews');
    // Route::get('/admin/newspublish', [AdminController::class, 'newspublish'])->name('adminnewspublish');
    // Route::get('/admin/editnews', [AdminController::class, 'editnews'])->name('adminnewsedit');
    // Route::get('/admin/adduser', [AdminController::class, 'adduser'])->name('adminadduser');
    // Route::get('/admin/users', [AdminController::class, 'users'])->name('adminusers');

    Route::prefix('admin')->group(function () {
    Route::resource('news', NewsController::class)->only([
        'index','create','store','edit', 'update', 'destroy','show'
    ]);
    Route::post('/admin/news/publish/{news}', [NewsController::class, 'publish'])->name('news.publish');
});

Route::prefix('admin')->group(function () {
    Route::resource('users', usersController::class)->only([
        'index','create','store','edit', 'update', 'destroy',
    ]);

    // Route::post('/admn/users/roles', [usersController::class, 'updateUserRole'])->name('users.role');
    Route::post('/admin/users/roles/{userId}', [usersController::class, 'updateUserRole'])->name('users.role');
    Route::delete('/admin/users/delete/{id}', [usersController::class, 'destroy1'])->name('user.destroy');

});


    Route::prefix('admin')->group(function () {
        Route::resource('about', AboutController::class)->only([
          'index','create','store','edit', 'update', 'destroy','publish'
        ]);
        Route::post('/admin/about/publish/{about}', [AboutController::class, 'publish'])->name('about.publish');
});

Route::prefix('admin')->group(function () {
    Route::resource('testimonial', TestimonialController::class)->only([
      'index','create','store','edit', 'update', 'destroy','show',
    ]);
    Route::post('/admin/testimonial/publish/{testimonial}', [TestimonialController::class, 'publish'])->name('testimonial.publish');

  });

Route::prefix('admin')->group(function(){
    Route::resource('academic',AcademicController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy'
    ]);
    Route::post('/admin/academic/publish/{id}', [AcademicController::class, 'publish'])->name('academic.publish');
});
Route::prefix('admin')->group(function(){
    Route::resource('popup',PopupController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy'
    ]);
    Route::post('/admin/popup/publish/{id}', [PopupController::class, 'publish'])->name('popup.publish');
});

Route::prefix('admin')->group(function(){
    Route::resource('banner',BannerController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy'
    ]);
    Route::post('/admin/banner/publish/{id}', [BannerController::class, 'publish'])->name('banner.publish');
});

Route::prefix('admin')->group(function(){
    Route::resource('notice',NoticeController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy'
    ]);
    Route::post('/admin/notice/publish/{id}', [NoticeController::class, 'publish'])->name('notice.publish');

});

Route::prefix('admin')->group(function(){
    Route::resource('timeline',TimelineController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy'
    ]);
    Route::post('/admin/timeline/publish/{id}', [TimelineController::class, 'publish'])->name('timeline.publish');
});

Route::prefix('admin')->group(function(){
    Route::resource('gallery',GalleryController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy'
    ]);
    Route::post('/admin/gallery/publish/{id}', [GalleryController::class, 'publish'])->name('gallery.publish');
});

Route::prefix('admin')->group(function(){
    Route::resource('images',ImagesController::class)->only([
        'index','store','destroy'
    ]);
    Route::get('/images/{gallery_id}', [ImagesController::class,'list'])->name('images.list');
    Route::get('/images/{gallery_id}/create', [ImagesController::class, 'create'])->name('images.create');
});

Route::prefix('admin')->group(function(){
    Route::resource('ssr',SSRController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy'
    ]);
    Route::post('/admin/ssr/publish/{id}', [SSRController::class, 'publish'])->name('ssr.publish');
});
Route::prefix('admin')->group(function(){
    Route::resource('teams',TeamsController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy'
    ]);
    Route::post('/admin/teams/publish/{id}', [TeamsController::class, 'publish'])->name('teams.publish');

});
Route::prefix('admin')->group(function(){
    Route::resource('topbanner',TopbannerController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy'
    ]);
    Route::post('/admin/topbanner/publish/{id}', [TopbannerController::class, 'publish'])->name('topbanner.publish');
});

Route::prefix('admin')->group(function(){
    Route::resource('menu',MenuController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy'
    ]);
    Route::post('/admin/menu/publish/{id}', [MenuController::class, 'publish'])->name('menu.publish');
});

Route::prefix('admin')->group(function(){
    Route::resource('submenu',SubmenuController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy'
    ]);
    Route::post('/admin/submenu/publish/{id}', [SubmenuController::class, 'publish'])->name('submenu.publish');
});

Route::prefix('admin')->group(function(){
    Route::resource('subsubmenu',SubsubmenuController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy'
    ]);
    Route::post('/admin/subsubmenu/publish/{id}', [SubsubmenuController::class, 'publish'])->name('subsubmenu.publish');
    Route::get('/subsubmenu/{id}', [SubsubmenuController::class,'subsubmenuDescription'])->name('subsubmenu.description');

});

Route::prefix('admin')->group(function(){
    Route::resource('downloads',DownloadsController::class)->only([
        'index',  'store', 'destroy'
    ]);
    Route::get('/downloads/{table_id}', [DownloadsController::class,'list'])->name('downloads.list');

    Route::get('/downloads/{table_id}/create', [DownloadsController::class, 'create'])->name('downloads.create');

});

Route::prefix('admin')->group(function(){
    Route::resource('downloadstable',DownloadstableController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy'
    ]);
    Route::post('/admin/downloadstable/publish/{id}', [DownloadstableController::class, 'publish'])->name('downloadstable.publish');
     Route::get('/downloadstable/{table_id}/create1', [DownloadsController::class, 'create1'])->name('downloadstable.create1');
});


});

Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::middleware([PageAuth::class])->group(function(){
        Route::get('/menu/{id}', [HomeController::class,'menubody' ])->name('menu.body');
        Route::get('/submenu/{id}', [HomeController::class, 'submenubody'])->name('submenu.body');
        Route::get('/subsubmenu/{id}', [HomeController::class, 'subsubmenubody'])->name('subsubmenu.body');

    });


Route::get('/download', [HomeController::class, 'download'])->name('download');
Route::get('/file_download/{filename}', function ($filename) {
    $path = storage_path('app/public/images/file/' . $filename);
    if (!Storage::exists('public/images/file/' . $filename)) {
        abort(404);
    }
    return response()->download($path);
})->name('download1');
Route::get('/notice_download/{filename}', function ($filename) {
    $path = storage_path('app/public/images/notice/' . $filename);
    if (!Storage::exists('public/images/notice/' . $filename)) {
        abort(404);
    }
    return response()->download($path);
})->name('notice.download');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/academics', [HomeController::class, 'academics'])->name('academics');
Route::get('/academics/{id}', [HomeController::class,'showAcademics'])->name('academic.details');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/alumni', [HomeController::class, 'alumni'])->name('alumni');
Route::get('/dropdown', [HomeController::class, 'dropdown'])->name('dropdown');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/gallery/{gallery_id}/images', [HomeController::class,'showImages'])->name('gallery.images');

Route::get('/news', [HomeController::class, 'news'])->name('news');
Route::get('/notice', [HomeController::class, 'notice'])->name('notice');
Route::get('/download2/{filename}', function ($filename) {
    $path = storage_path('app/public/images/notice/' . $filename);
    if (!Storage::exists('public/images/notice/' . $filename)) {
        abort(404);
    }
    return response()->download($path);
})->name('download2');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/newsdetails/{id}', [HomeController::class, 'newsdetails'])->name('news_details');
// Route::get('/academicdetails', [HomeController::class, 'academicdetails'])->name('academicdetails');
Route::get('/teams', [HomeController::class, 'teams'])->name('teams');

Route::get('/auth', [HomeController::class, 'auth'])->name('auth');
Route::post('/verify', [HomeController::class, 'verify'])->name('verify');
Route::get('/ssrpage', [HomeController::class, 'SSRPage'])->name('ssr.page')->middleware('auth_token');

Route::get('/ssr_download/{filename}', function ($filename) {
    $path = storage_path('app/public/images/file/' . $filename);
    if (!Storage::exists('public/images/file/' . $filename)) {
        abort(404);
    }
    return response()->download($path);
})->name('ssr.download');
Route::get('/terms', [HomeController::class, 'terms'])->name('terms');
Route::get('/images', [HomeController::class, 'images'])->name('images');

// Route::get('/verify', [HomeController::class, 'verify'])->name('verify');


require __DIR__.'/auth.php';
