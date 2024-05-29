<?php

namespace App\Providers;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\subsubmenu;
use App\Models\Topbanner;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         $this->loadCommonData();
        Paginator::useBootstrapFour();

        View::composer('*', function ($view) {
            $username = null;
            if (auth()->check()) {
                $username = auth()->user()->name;
            }
            $view->with('username', $username);
        });

        Gate::define('admin-only', function (User $user) {
            return $user->isAdmin();
        });

    }


private function loadCommonData()
{
    view()->composer('frontend.*', function ($view) {
        $view->with('topbanner', Topbanner::where('status', 'published')->orderByDesc('created_at')->take(1)->get());
        $view->with('menu', Menu::where('status', 'published')->orderByDesc('created_at')->paginate(10));
        $view->with('submenu', Submenu::where('status', 'published')->orderByDesc('created_at')->paginate(10));

    });
}
}
