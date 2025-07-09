<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "first_name" => ['required', 'min:1', 'max:20'],
            "last_name" =>  ['required', 'min:1', 'max:20'],
            "gender" =>  ['required', 'min:4'],
            "email" =>  'required|regex:/(.+)@(.+)\.(.+)/i',
            "password" => ["required", "min:8", Password::min(8)],
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $message = implode(", ", $errors->all());
            return back()->with("error", $message);
        };

        $profileName = str_replace($request->schemeAndHttpHost().'/assets/img/temporary/','', $request->profile_name);
        $temporary = public_path("/assets/img/temporary") . '/' . $profileName;
        $directory = public_path("/assets/img/profile") . '/' . $profileName;

        if(!File::exists(public_path("/assets/img/profile"))){
            File::makeDirectory(public_path("/assets/img/profile"), 0755, true);
        }

        if(File::move($temporary, $directory)){
            File::deleteDirectory(public_path("/assets/img/temporary"));
        }

        // dd($validator->errors(),);
        $user = User::create([
            User::FIRST_NAME => $request->first_name,
            User::LAST_NAME  => $request->last_name,
            User::EMAIL      => $request->email,
            User::GENDER     => $request->gender,
            User::PROFILE    => $profileName,
            User::PASSWORD   => $request->password,
        ]);

        $user->assignRole('admin');
        return back()->with('success', 'User Create Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
