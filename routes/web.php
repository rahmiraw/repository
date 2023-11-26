<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('user', [UserController::class, 'index'])->name('user');
// Route::get('/user/create', [UserController::class, 'create'])->name('user.create');

Route::resource('user', UserController::class);
Route::get('/user/caridata', [UserController::class, 'cariData'])->name('user.caridata');