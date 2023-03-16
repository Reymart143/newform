<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;

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
Route::post('/create',[UserController::class, 'create']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::get('province-list/provinces/{region}', [UserController::class, 'province']);
Route::get('municipalities-list/municipality/{province}', [UserController::class, 'municipality']);

//admin route
Route::middleware(['isAdmin'])->group(function () {
    Route::get('/users',[UserController::class, 'index'])->name('users.index');
    Route::post('users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('users/edit/{id}/', [UserController::class, 'edit']);
    Route::post('users/update', [UserController::class, 'update'])->name('users.update');
    Route::get('users/destroy/{id}/', [UserController::class, 'destroy']);
    Route::get('users/removeall', [UserController::class, 'removeall'])->name('users.removeall');
});


 