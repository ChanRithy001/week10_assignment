<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', [\App\Http\Controllers\UserController::class, 'login']);
// Route::get('/login', [\App\Http\Controllers\UserController::class, 'login'])->name('users.login');
// Route::post('/login', [\App\Http\Controllers\UserController::class, 'doLogin'])->name('users.do_login');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'register'])->name('register');

Route::post('/login', [UserController::class, 'startLogin'])->name('startLogin');
Route::post('/register', [UserController::class, 'startRegister'])->name('startRegister');

Route::get('/category', [CategoryController::class, 'index'])->name('category');

// Route::get('/form_create_category', [CategoryController::class, 'create'])->name('create_category');
Route::get('/form_create_category', function () {
    return view('category.create');
})->name('form_create_category');

Route::post('/create_category', [CategoryController::class, 'create'])->name('create_category');
Route::delete('/delete_category{id}', [CategoryController::class, 'delete'])->name('delete_category');

