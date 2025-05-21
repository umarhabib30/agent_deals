<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Profile',
            'active' => 'profile',
            'user' => Auth::user(),
        ];

        return view('dashboard.profile.index', $data);
    }

    public function updateAccount(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        if ($request->hasFile('profile_image')) {
            $path = ImageHelper::saveImage($request->profile_image, 'profiles');
            $user->update([
                'full_name' => $request->full_name,
                'profile_image' => $path,
            ]);
        } else {
            $user->update([
                'full_name' => $request->full_name,
            ]);
        }

        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }

    public function updatePassword(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $check = Hash::check($request->current_password, $user->password);

        if ($check) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->back()->with('success', 'Password updated successfully');
        } else {
            return redirect()->back()->with('error', 'Current password does not match');
        }

    }
}
