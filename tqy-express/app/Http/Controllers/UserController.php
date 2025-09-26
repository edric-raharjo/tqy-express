<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // GET /admin/users
    public function index()
    {
        $users = Users::all();
        return view('admin.users.index', compact('users'));
    }

    // GET /admin/users/create
    public function create()
    {
        return view('admin.users.create');
    }

    // POST /admin/users
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username'   => 'required|string|unique:users,username',
            'password'   => 'required|string|min:6', // only at creation
            'full_name'  => 'required|string',
            'role'       => 'required|in:admin,kurir,staff',
            'phone'      => 'nullable|string',
            'email'      => 'required|email|unique:users,email',
        ]);

        $validated['password'] = bcrypt($validated['password']); // hash password

        Users::create($validated);

        return redirect()->route('admin.users.index')->with('success', 'Users created successfully.');
    }

    // GET /admin/users/{id}
    public function show($id)
    {
        $user = Users::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    // GET /admin/users/{id}/edit
    public function edit($id)
    {
        $user = Users::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // PUT/PATCH /admin/users/{id}
    public function update(Request $request, $id)
    {
        $user = Users::findOrFail($id);

        $validated = $request->validate([
            'username'   => 'required|string|unique:users,username,' . $user->user_id . ',user_id',
            // password is intentionally excluded
            'full_name'  => 'required|string',
            'role'       => 'required|in:admin,kurir,staff',
            'phone'      => 'nullable|string',
            'email'      => 'required|email|unique:users,email,' . $user->user_id . ',user_id',
        ]);

        $user->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'Users updated successfully.');
    }

    // DELETE /admin/users/{id}
    public function destroy($id)
    {
        $user = Users::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Users deleted successfully.');
    }
}
