<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\HomeController;


// Route for the homepage (visible to everyone)
Route::get('/', function () {
    return view('home');
})->name('home');

// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Role-based Routes
Route::middleware(['auth'])->group(function () {
    // Routes for regular users (accessible only to users with 'user' role)
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard')->middleware('role:user');

    // Routes for admins (accessible only to users with 'admin' role)
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('role:admin');

    Route::get('/', [HomeController::class, 'index'])->name('home');

// Route for showing the password confirmation form
Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');

// Route for confirming the password
Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);
Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    // Profile route to show the user profile
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    
    // Route to update the user's profile
    Route::put('/profile', [UserController::class, 'update'])->name('profile.update');

});







});



