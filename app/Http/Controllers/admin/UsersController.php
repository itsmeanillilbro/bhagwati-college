<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UpdateUserRolesRequest;
use App\Models\User;
use App\Models\Users;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderByRaw('created_at')->paginate(10);
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.users.create');

    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $data = $request->all();
    // $request->validate([
    //     'email' => 'required|string|email|unique:users,email',
    //     'password' => 'nullable|string|min:8|confirmed',
    // ]);
    $existingUser = User::where('email', $data['email'])->first();
    if ($existingUser) {
        Toastr::error('Email Already Exists');
        return redirect()->route('users.create');
    }

    $user = new User();

    if ($user->create($data)) {
        Toastr::success('User Created Successfully!');
        return redirect()->route('users.index');
    } else {
        Toastr::error('Failed to create user');
        return redirect()->route('users.create');
    }
}


// public function update(Request $request,User $user)
// {
//     $data=$request->all();

//     if ($request->user()->isDirty('email')) {
//         $request->user()->email_verified_at = null;
//     }

//     $user->update($data);

//     Toastr::success('User Updated Successfully!');
//         return redirect()->back();
// }

public function update(ProfileUpdateRequest $request): RedirectResponse
{
    $user = $request->user();

    $validatedData = $request->validated();



    if (!Hash::check($validatedData['currentpassword'], $user->password)) {
        Toastr::error(' Password is incorrect');
        return back();
    }

    $user->fill($validatedData);
    if (!empty($validatedData['password'])) {
        $user->password = Hash::make($validatedData['password']);
    }

    if ($request->user()->isDirty('email')) {
        $request->user()->email_verified_at = null;
    }

    if ($user->save()) {
        Toastr::success('User Updated Successfully!');
        return Redirect::route('profile.edit');
    } else {
        Toastr::error('Failed to Update User');
        return back()->withErrors($user->getErrors());
    }
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
        $users = User::findOrFail($id);
        if ($users->role === 'admin' && User::where('role', 'admin')->count() === 1) {
            toastr::error('Cannot Delete Last Admin!', 'At least one admin user is required.');
            return redirect()->route('users.index');
        }
        $users->delete();
        toastr::success('Deleted Successfully!!');
        return redirect(route('users.index'));
    }



    public function destroy1($id)
    {
        $user = User::findOrFail(auth()->user()->id);
        if ($user->role === 'admin' && User::where('role', 'admin')->count() === 1) {
            toastr::error('Cannot Delete Last Admin!', 'At least one admin user is required.');
            return redirect()->route('users.index');
        }
        $user->delete();
        toastr::success('Deleted Successfully!!');
        return redirect(route('users.index'));

    }


 /**
     * Update user roles.
     *
     * @param UpdateUserRolesRequest $request
     * @param int $userId
     * @return \Illuminate\Http\RedirectResponse
     */

     public function updateUserRole(UpdateUserRolesRequest $request, int $userId)
    {
        $user = User::findOrFail($userId);

        // Validate request data (using dedicated request class)
        $validated = $request->validated();
        $newRole = $validated['new_role'];

        if ($user->role === $newRole) {
            Toastr::warning('No Change Detected', 'Role is already set to ' . $newRole);
            return back();
        }

        // Prevent demotion of the currently logged-in admin if it's the only admin (security measure)
        $adminCount = User::where('role', 'admin')->count();
        if ($adminCount === 1 && auth()->user()->id === $userId && $newRole === 'user') {
            Toastr::error('Permission Denied!', 'Cannot demote the last remaining admin.');
            return back();
        }

        try {
            // Update role in database using a transaction for consistency
            DB::transaction(function () use ($user, $newRole) {
                $user->update(['role' => $newRole]);
            });

            Toastr::success('Role Updated Successfully!', 'Role changed to ' . $newRole);
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            report($e); // Report exception for logging or debugging
            Toastr::error('Failed to Update Role', 'An error occurred!');
            return back();
        }
    }
}
