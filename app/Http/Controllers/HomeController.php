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
     *@return String, file uploaded
    */
    public function uploadFile(Request $request){
        $fileKey = array_key_first($request->allFiles());
        if (!$fileKey) {
            return response()->json(['error' => 'No file uploaded.'], 400);
        }
        // Validate dynamically using the file key
        $request->validate([
            $fileKey => 'required|file|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);
        $profile = $request->file($fileKey);
        $profileName = date('d-m-y-H-i-s').'-'.$profile->getClientOriginalName();
        $path = 'assets/img/temporary/';
        $profile->move($path, $profileName);
        return asset($path.$profileName) ;
    }
}
