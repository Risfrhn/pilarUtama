<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserController::class, 'showLandingPageUser'])->name('dashboardUser.view');


# auth 
## register
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
## login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
## logout
route::post('/logout', [AuthController::class, 'logout'])->name('logout');
## forgot password
Route::get('/forgot-password', [AuthController::class, 'forgotPassForm'])->name('password.request');

Route::post('/forgot-password', [AuthController::class, 'resetPassLink'])->name('password.email');

Route::get('/reset-password/{token}', [AuthController::class, 'newPassForm'])->name('password.reset');

Route::post('/reset-password', [AuthController::class, 'newPass'])->name('password.update');


# Admin
## landingPage
Route::get('/dashboardAdmin', [AdminController::class, 'showLandingPageAdmin'])->middleware('auth')->name('dashboardAdmin.view');

Route::put('/update', [AdminController::class, 'update'])->middleware('auth')->name('update');




