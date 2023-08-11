<?php

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
    return to_route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('/users', [App\Http\Controllers\UsersController::class]);
Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users');
Route::get('/add-users', [App\Http\Controllers\UsersController::class, 'create'])->name('add-users');

Route::get('/asset-management', [App\Http\Controllers\AssetManagementController::class, 'index'])->name('aset');
