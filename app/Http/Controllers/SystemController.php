<?php

namespace App\Http\Controllers;

use App\Models\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SystemController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $system = System::first();
        return view('system.create', compact('system'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'profile_name' => 'required',
            'favicon_name' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if(Str::contains($request->profile_name, '/assets/img/system/')){
            $baseUrl = $request->schemeAndHttpHost() . '/assets/img/system/';
        }
        else{
            $baseUrl = $request->schemeAndHttpHost() . '/assets/img/temporary/';
        }
        $baseUrlFavicon = $request->schemeAndHttpHost() . '/assets/img/temporary/';


        $profileName = str_replace($baseUrl, '', $request->profile_name);
        $faviconName = str_replace($baseUrlFavicon, '', $request->favicon_name);
        $temporaryPath = public_path('assets/img/temporary/');
        $systemPath = public_path('assets/img/system/');
        $temporaryProfile = $temporaryPath . ltrim($profileName, '/');
        $temporaryFavicon = $temporaryPath . ltrim($faviconName, '/');
        $destinationProfile = $systemPath . ltrim($profileName, '/');

        if (!File::exists($systemPath)) {
            File::makeDirectory($systemPath, 0755, true);
        }
        $this->removeAndUploadFavicon($temporaryFavicon);

        // Move profile image from temporary to system
        if (File::exists($temporaryProfile)) {
            File::move($temporaryProfile, $destinationProfile);
        }

        if (File::isDirectory($temporaryPath)) {
            File::deleteDirectory($temporaryPath);
        }

        System::updateOrCreate(
            [System::NAME => $request->name],
            [
                System::PROFILE => $profileName,
                System::FAVICON => $faviconName,
            ]
        );
        return redirect()->back()->with('success', 'System updated successfully.');
    }
    private function removeAndUploadFavicon($temporaryPath)
    {
        // Ensure target directory exists
        $targetDirectory = public_path('assets/img/favicon');

        $faviconPath = $targetDirectory . '/favicon.ico';
        if (File::exists($faviconPath)) {
            File::delete($faviconPath);
        }
        if (File::exists($temporaryPath)) {
            File::move($temporaryPath, $faviconPath);
        }
    }

}
