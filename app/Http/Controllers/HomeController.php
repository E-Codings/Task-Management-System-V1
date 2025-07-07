<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function setup(){
        Artisan::call('migrate');
        return redirect()->back()->with('success','New table migrated successfully');
    }

    /**
     *upload file that request from ajax
     *@param $request, request file when submit
     * @return STring, file uploaded
    */
    public function uploadFile(Request $request){
        $validate = $request->validate([
            'profile' => 'required|file|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);
        $profile = $request->file('profile');
        $profileName = date('d-m-y-H-i-s').'-'.$profile->getClientOriginalName();
        $path = 'assets/img/profile';
        $profile->move($path, $profileName);
        // dd($profileName);
        return response()->json($profileName);
    }
    
}
