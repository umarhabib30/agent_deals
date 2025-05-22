<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller
{
    public function login()
    {
        $data = [
            'title' => 'Admin Login',
            'active' => 'login',
        ];
        return view('admin.auth.login', $data);
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        $auth = Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]);
        if ($auth) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->with('error','Invalid credentials');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Logged out successfully');
    }
}
