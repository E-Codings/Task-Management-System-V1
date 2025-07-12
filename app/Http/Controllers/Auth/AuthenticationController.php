<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthenticationController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if ($validated->fails()) {
            return redirect()->route('login')->withErrors($validated)->withInput();
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('error', 'Invalid Credentials');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function showChangePasswordForm()
    {
        return view('auth.change_password');
    }
    public function changePassword(Request $request)
    {

        $validated = Validator::make($request->all(), [
            'password' => 'required|string|min:8',
            'confirm_new_password' => 'required|string|min:8',
            'new_password' => 'required|string|min:8',
        ]);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }
        if (!Auth::attempt([
            'email' => Auth::user()->email,
            'password' => $request->input('password')
        ])) {
            return redirect()->back()->withErrors(['password' => 'Your password is not correct']);
        }

        if ($request->confirm_new_password != $request->new_password) {
            return redirect()->back()->with('error', 'New Password and Confirm Password do not match');
        }

        User::where(User::ID, Auth::user()->id)
            ->update([
                User::PASSWORD => Hash::make($request->new_password),
            ]);

        return redirect()->back()->with('success', 'Your password has been changed');
    }
}