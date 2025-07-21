<?php

namespace App\Http\Controllers;

use App\Models\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SystemController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('system.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'profile' => 'required',
            'favicon' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        

        System::create([
            System::NAME => $request->name,
            System::PROFILE => '',
            System::FAVICON => '',
        ]);

    }

}
