<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LokasiController;

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

// \San\Crud\Crud::routes(); 


Route::get('/asset-management', [App\Http\Controllers\AssetManagementController::class, 'index'])->name('aset');

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('users', UsersController::class);

    Route::resource('departments', DepartmentController::class);

    Route::resource('lokasis', LokasiController::class);

    // Route::middleware('role:Admin')->group(function () {
    //     Route::resource('users', UserController::class);
    //     Route::resource('roles', RoleController::class);
    //     Route::resource('categories', CategoryController::class);

    //     Route::prefix('dropdown')->controller(DropdownController::class)->as('dropdown.')->group(function () {
    //         Route::get('roles', 'getRoles')->name('roles');
    //         Route::get('farmers', 'getFarmers')->name('farmers');
    //     });
    // });
});
