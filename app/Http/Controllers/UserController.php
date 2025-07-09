<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
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

        // dd($validator->errors(),);
        $user = User::create([
            User::FIRST_NAME => $request->first_name,
            User::LAST_NAME  => $request->last_name,
            User::EMAIL      => $request->email,
            User::GENDER     => $request->gender,
            User::PASSWORD   => $request->password,
            User::PROFILE    => $request->profile_name,
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
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            "first_name" => ['required', 'min:1', 'max:20'],
            "last_name" =>  ['required', 'min:1', 'max:20'],
            "gender" =>  ['required', 'min:4'],
            "email" =>  'required|regex:/(.+)@(.+)\.(.+)/i',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $message = implode(", ", $errors->all());
            return back()->with("error", $message);
        }

        $user = User::find($id);
        dd($user);
        if ($user) {
            $user = User::where('id', $user->id)->update([
                User::FIRST_NAME => $request->first_name,
                User::LAST_NAME  => $request->last_name,
                User::EMAIL      => $request->email,
                User::GENDER     => $request->gender,
                User::PROFILE    => $request->profile_name,
            ]);
        }
        return back()->with('success', 'User Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'User Deleted.');
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }
}
