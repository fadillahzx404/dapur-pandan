<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class UsersAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

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

        if ($request->hasFile('photo_profile')) {
            // Do something with the file
            $data['photo_profile'] = $request->file('photo_profile')->store('/images/photo_profile', 'public');
        }
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect()
            ->route('users-admin.index')
            ->with('Success', 'New User has been add');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user, $id)
    {
        $data = $request->all();

        if ($request->hasFile('profile_photo_path')) {
            // Do something with the file
            $data['profile_photo_path'] = $request->file('profile_photo_path')->store('/images/photo_profile', 'public');
        }

        $item = User::findOrFail($id);

        if ($data['password'] !== null) {
            $data['password'] = Hash::make($input['password']);
        } else {
            $data['password'] = $item->password;
        }

        $item->update($data);

        return redirect()
            ->route('users-admin.index')
            ->with('Success', 'Users telah di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $id)
    {
        $item = User::findOrFail($id);

        $item->delete();

        return redirect()
            ->route('users-admin.index')
            ->with('Success', 'User has been delete !!');
    }
}
