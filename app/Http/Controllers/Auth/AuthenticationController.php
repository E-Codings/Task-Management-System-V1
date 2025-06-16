<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $validated = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if($validated->fails()){
            return redirect()->route('login')->withErrors($validated)->withInput();
        }

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->route('home');
        }
        else{
            return redirect()->route('login')->with('error','Invalid Credentials');
        }
    }

    public function logout(){}
}
