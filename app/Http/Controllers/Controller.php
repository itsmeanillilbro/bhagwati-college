<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    use AuthorizesRequests;

    // use AuthorizesRequests;

    // protected function authorizeUserDeletion($user)
    // {
    //     $this->authorize('delete', $user);
    //     $user->delete();
    // }
}
