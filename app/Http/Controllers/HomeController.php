<?php

namespace App\Http\Controllers;

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
}
