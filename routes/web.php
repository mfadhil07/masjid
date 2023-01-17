<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MasjidController;

//halaman user
Route::get('/', [UserController::class, 'home']);
Route::get('/maps', [UserController::class, 'maps']);
Route::get('info', [UserController::class, 'info']);
Route::get('/about', [UserController::class, 'about']);
Route::get('/tes', [UserController::class, 'tes']);
Route::get('/json', [UserController::class, 'json']);
Route::get('/detail_lokasi/{id}', [UserController::class, 'detail_lokasi']);

//login
Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'store']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/a_home', [AdminController::class, 'index'])->middleware('auth');
Route::get('/a_maps', [AdminController::class, 'a_maps'])->middleware('auth');
Route::get('/a_info', [AdminController::class, 'a_info'])->middleware('auth');
Route::get('/a_about', [AdminController::class, 'a_about'])->middleware('auth');
Route::get('/detail/{id}', [AdminController::class, 'detail']);

//Controller CRUD data
Route::resource('/masjid', MasjidController::class)->middleware('auth');


