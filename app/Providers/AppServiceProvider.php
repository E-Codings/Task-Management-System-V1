<?php

namespace App\Providers;

use App\Models\System;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try{
            $system = System::orderByDesC('id')->limit(1)->first();
            view()->share('System',$system);
        }catch(Exception $e){
            Log::error("Error database: ".$e->getMessage());
        }
    }
}
