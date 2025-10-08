<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\teacherController;
use App\Http\Controllers\mapelController;

Route::get('/', [StudentController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/profil', [ProfilController::class, 'index']);
Route::get('/kontak', [ContactController::class, 'kontak']);
Route::get('/student', [StudentController::class, 'index']);
Route::get('/guardian', [GuardianController::class, 'index']);
Route::get('/classroom', [ClassroomController::class, 'index']);
Route::get('/teacher', [teacherController::class, 'index']);
Route::get('/mapel', [mapelController::class, 'index']);


