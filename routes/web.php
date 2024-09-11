<?php

use Illuminate\Support\Facades\Route;
use App\Models\Admin;

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\ForgotPasswordController as AdminForgotPasswordController;
use App\Http\Controllers\Admin\ResetPasswordController as AdminResetPasswordController;
use App\Http\Controllers\ZoneFacilityController;
use App\Http\Controllers\Admin\ResponseController;






// Password Reset Routes
Route::get('admin/password/reset', [AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
Route::post('admin/password/email', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
Route::get('admin/password/reset/{token}', [AdminResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
Route::post('admin/password/reset', [AdminResetPasswordController::class, 'reset'])->name('admin.password.update');



// Public routes
Route::get('/', function () {
    return view('user.authentication');
});

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('register', [RegisterController::class, 'register'])->name('register');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('/home', [HomeController::class, 'showForm'])->name('home')->middleware('auth');


Route::post('/zone/facilities/store', [ZoneFacilityController::class, 'store'])->name('zone.facilities.store');



// User forgot/reset password routes
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// Admin routes
Route::prefix('admin')->group(function () {

    // Redirect '/admin' to '/admin/login'
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });

    // Admin login and authentication routes
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');



    // Admin dashboard route - protected by auth middleware
   // Admin dashboard route - protected by auth:admin middleware
Route::middleware('auth:admin')->group(function () {

    // Admin Dashboard Route
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Response Management Routes
    Route::get('/responses', [ResponseController::class, 'index'])->name('admin.responses');
    Route::get('/responses/{user}', [ResponseController::class, 'showResponse'])->name('admin.responses.show');
    Route::delete('admin/responses/{user}/delete-facilities', [ResponseController::class, 'deleteFacilities'])->name('admin.responses.deleteFacilities');

    // User Management Routes
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::post('/users/approve/{user}', [UserController::class, 'approve'])->name('admin.users.approve');
    Route::post('/users/reject/{user}', [UserController::class, 'reject'])->name('admin.users.reject');
    Route::delete('/users/delete/{user}', [UserController::class, 'delete'])->name('admin.users.delete');
});
});


