<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

#USER
Route::get('/', [UserController::class, 'showLandingPageUser'])->name('dashboardUser.view');
Route::get('/Dashboard/projects/negotiation/{status}', [UserController::class, 'showProjectNegoUser'])->name('projectsNegoUser.view');
Route::get('/Dashboard/projects/status/{status}', [UserController::class, 'showProjectUser'])->name('projectsUser.view');
Route::get('/Dashboard/projects/status/{status}/{id}', [UserController::class, 'showProjectDetailUser'])->name('projectsDetailUser.view');



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
## tambah projek
Route::post('/projects/store', [AdminController::class, 'storeProject'])->middleware('auth')->name('projects.store');
## list projek
Route::get('/projects/status/{status}', [AdminController::class, 'showProject'])->middleware('auth')->name('projects.view');
Route::get('/projects/negotiation/{status}', [AdminController::class, 'showProjectNego'])->middleware('auth')->name('projectsNego.view');
Route::put('/projects/negotiation/{status}/{id}/update',[AdminController::class, 'updateProjectNego'])->middleware('auth')->name('projectNego.update');
Route::delete('/projects/{project_id}', [AdminController::class, 'deleteProject'])->middleware('auth')->name('projects.delete');
Route::delete('/projects/{status}/{id}', [AdminController::class, 'deleteNegoProject'])->name('projectNego.destroy');
## detail projek
Route::get('/projects/status/{status}/{id}', [AdminController::class, 'showProjectDetail'])->middleware('auth')->name('projectsDetail.view');
Route::put('/projects/status/{status}/{id}/update',[AdminController::class, 'updateProject'])->middleware('auth')->name('projects.update');
Route::delete('/projects/{project_id}/image/{image_id}/{type}', [AdminController::class, 'deleteImage'])->middleware('auth')->name('projects.deleteImage');
Route::delete('/projects/{project_id}/video/{video_id}', [AdminController::class, 'deleteVideo'])->middleware('auth')->name('projects.deleteVideo');
## backup database dan file
Route::get('/dashboardAdmin/backup/all', [AdminController::class, 'downloadBackup'])->name('admin.backup.all');
// Route::get('/dashboardAdmin/backup/database', [AdminController::class, 'backupDatabase'])->name('backup.database');
// Route::get('/dashboardAdmin/backup/public', [AdminController::class, 'backupPublicFiles'])->name('backup.public');





