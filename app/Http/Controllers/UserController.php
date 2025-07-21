<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Constants\PermissionConstant;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // This method is only for admin
        if (!Auth::user()->can(PermissionConstant::VIEW_USER)) {
            return back()->with('error', 'Permission Denied');
        }

        $search = $request->search;
        $page = $request->page ?? 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;

        $query = User::orderBy('id', 'desc');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where(User::FIRST_NAME, 'like', "%{$search}%")
                    ->orWhere(User::LAST_NAME, 'like', "%{$search}%");
            });
        }

        $total_users = $query->count();
        $total_pages = ceil($total_users / $limit);
        $users = $query->offset($offset)->limit($limit)->get();

        return view('user.index', compact('users', 'total_pages', 'page', 'search'));
    }

    /**
     * Show the Proflie form for user as employee only view
     */
    public function profile()
    {
        if (Auth::user()->hasRole('admin')) {
            return back()->with('error', 'Permission Denied');
        }else{
            return view('user.profile', compact('user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->hasRole('admin')) {
            return back()->with('error', 'Permission Denied');
        } else {
            return view('user.create');
        }
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

        $profileName = str_replace($request->schemeAndHttpHost() . '/assets/img/temporary', '', $request->profile_name);
        $temporary = public_path("/assets/img/temporary") . $profileName;
        $directory = public_path("/assets/img/profile") . $profileName;

        if (!File::exists(public_path("/assets/img/profile"))) {
            File::makeDirectory(public_path("/assets/img/profile"), 0755, true);
        }

        if (File::move($temporary, $directory)) {
            File::deleteDirectory(public_path("/assets/img/temporary"));
        }

        $user = User::create([
            User::FIRST_NAME => $request->first_name,
            User::LAST_NAME  => $request->last_name,
            User::EMAIL      => $request->email,
            User::GENDER     => $request->gender,
            User::PASSWORD   => $request->password,
            User::PROFILE    => $profileName,
        ]);

        $user->assignRole('employee');
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

        $profileName = str_replace($request->schemeAndHttpHost() . '/assets/img/temporary', '', $request->profile_name);
        $temporary = public_path("/assets/img/temporary") . $profileName;
        $directory = public_path("/assets/img/profile") . $profileName;

        if (!File::exists(public_path("/assets/img/profile"))) {
            File::makeDirectory(public_path("/assets/img/profile"), 0755, true);
        }

        if (File::move($temporary, $directory)) {
            File::deleteDirectory(public_path("/assets/img/temporary"));
        }

        $user = User::find($id);
        if ($user) {
            $user = User::where('id', $user->id)->update([
                User::FIRST_NAME => $request->first_name,
                User::LAST_NAME  => $request->last_name,
                User::EMAIL      => $request->email,
                User::GENDER     => $request->gender,
                User::PROFILE    => $profileName,
            ]);
        }
        return back()->with('success', 'User Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->remove_id);
        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'User Deleted.');
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }
}
