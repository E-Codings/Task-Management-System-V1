<?php

use App\Models\Project;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Models\User;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TaskController;

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
    Route::resource('status', StatusController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('task', TaskController::class);
    Route::controller(TaskController::class)->group(function () {
        Route::delete('/task/delete', 'destroy')->name('task.delete');
    });
    Route::post('/upload-file', [HomeController::class, 'uploadFile'])->name('uploadFile');
    Route::controller(UserController::class)->group(function () {
        Route::delete('/user/delete', 'destroy')->name('user.delete');
    });
    Route::controller(StatusController::class)->group(function(){
        Route::delete('/status/delet','destory')->name('status.delete'); 
    });
});