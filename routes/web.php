<?php

use App\Models\Project;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\statusController;
use App\Http\Controllers\ProjectController;

Route::get('/login', [AuthenticationController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthenticationController::class, 'login'])->name('login.submit');

Route::middleware('auth')->group(function () {
    Route::get('/setup', [HomeController::class, 'setup'])->name('setup');
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');
    Route::get('/change-password', [AuthenticationController::class, 'showChangePasswordForm'])->name('show-change-password');
    Route::post('/change-password', [AuthenticationController::class, 'changePassword'])->name('change-password');
    Route::get('/role-permission', [PermissionController::class, 'index'])->name('role.permission');

    Route::resource('user', UserController::class);
    Route::resource('project', ProjectController::class);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/status', [statusController::class, 'index'])->name('index');
    Route::get('/create', [statusController::class, 'create'])->name('create');
    Route::post('/status/store-status', [statusController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [statusController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [statusController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [statusController::class, 'delete'])->name('delete'); // confirmation page
    Route::delete('/status/{id}', [StatusController::class, 'destroy'])->name('destroy');   // delete action

});
//if declare outside middleware
//Route::resource('project',ProjectController::class)->middleware('auth');