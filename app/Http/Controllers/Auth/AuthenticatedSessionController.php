<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */


    // Inside the store method of AuthenticatedSessionController
    public function store(LoginRequest $request): RedirectResponse
{
    try {
        $request->authenticate();

        $request->session()->regenerate();
        Toastr::success('Welcome,    ' . strtoupper(Auth::user()->name. ' !!!'));
        return redirect()->intended(route('dashboard', absolute: false));
    } catch (\Exception $e) {
        // Authentication failed, display generic error message using Toastr
        Toastr::error('Invalid email or password.', 'Login Failed');

        return Redirect::back();
    }
}

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
