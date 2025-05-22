<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Users',
            'active' => 'users',
            'users' => User::latest()->get(),
        ];

        return view('admin.users.index', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit User',
            'active' => 'users',
            'user' => User::findOrFail($id),
        ];

        return view('admin.users.edit', $data);
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $data = $request->all();
        if ($request->is_phone_verified) {
            $data['is_phone_verified'] = 1;
        } else {
            $data['is_phone_verified'] = 0;
        }

        if ($request->is_emirate_verified) {
            $data['is_emirate_verified'] = 1;
        } else {
            $data['is_emirate_verified'] = 0;
        }

        $user->update($data);
        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    }

    public function updatePassword(Request $request)
    {
        try {
            $request->validate([
                'password' => 'required|confirmed|min:6',
            ]);

            $user = User::find($request->id);
            $user->update(['password' => Hash::make($request->password)]);

            return redirect()->back()->with('success', 'Password updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully');
    }
}
