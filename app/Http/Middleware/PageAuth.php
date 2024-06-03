<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\Subsubmenu;

class PageAuth
{
    public function handle(Request $request, Closure $next)
    {

        $id = $request->route('id');
        $menu = Menu::find($id);
        $submenu = Submenu::find($id);
        $subsubmenu = Subsubmenu::find($id);
        if (
            ($menu && $menu->password === 'yes') ||
            ($submenu && $submenu->password === 'yes') ||
            ($subsubmenu && $subsubmenu->password === 'yes')
        ) {
            // Check if the authentication token is present and valid
            if (!Session::has('auth_token') || $request->query('auth_token') !== session('auth_token')) {
                // If not, redirect to the authentication page
                session()->forget('auth_token');
                session()->put('url.intended', $request->fullUrl());
                return redirect()->route('auth');
            }
        }

        return $next($request);
    }
}
