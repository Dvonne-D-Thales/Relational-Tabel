<?php

use App\Http\Controllers\admin\MapelAdminController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\admin\StudentAdminController;
use App\Http\Controllers\admin\GuardianAdminController;
use App\Http\Controllers\admin\TeacherAdminController;
use App\Http\Controllers\admin\ClassroomAdminController;

Route::get('/', [StudentController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/profil', [ProfilController::class, 'index']);
Route::get('/kontak', [ContactController::class, 'kontak']);
Route::get('/student', [StudentController::class, 'index']);
Route::get('/guardian', [GuardianController::class, 'index']);
Route::get('/classroom', [ClassroomController::class, 'index']);
Route::get('/teacher', [TeacherController::class, 'index']);
Route::get('/mapel', [MapelController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [LoginController::class, 'store'])
    ->middleware('guest');

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');


Route::get('/admin', action: fn() => view('admin.dashboard'));

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('students', StudentAdminController::class);
    Route::resource('guardians', GuardianAdminController::class);
    Route::resource('teachers', TeacherAdminController::class);
    Route::resource('classrooms', ClassroomAdminController::class);
    Route::resource('mapel', MapelAdminController::class);
});

