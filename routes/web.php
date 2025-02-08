<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DataRetrievalController;
use App\Http\Controllers\GraphController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
});

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// User Profile Route
Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');

// Content CRUD Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('contents', ContentController::class);


    Route::middleware(['auth'])->group(function () {
        Route::resource('contents', ContentController::class);
    });
    
Route::get('/retrieve-data', [DataRetrievalController::class, 'retrieve'])->name('retrieve.data');
Route::get('/graph', [GraphController::class, 'index'])->name('graph');

});


