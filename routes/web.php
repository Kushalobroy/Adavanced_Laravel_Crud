<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/create', [App\Http\Controllers\AdminController::class, 'create'])->name('create');
Route::get('/createProduct', [App\Http\Controllers\AdminController::class, 'createProduct'])->name('createProduct');
Route::post('/createCategory', [App\Http\Controllers\AdminController::class, 'createCategory'])->name('createCategory');
Route::post('/createProducts', [App\Http\Controllers\AdminController::class, 'createProducts'])->name('createProducts');
Route::get('/updateProduct/{id}', [App\Http\Controllers\AdminController::class, 'updateProduct'])->name('updateProduct');
Route::post('/updateProducts/{id}', [App\Http\Controllers\AdminController::class, 'updateProducts'])->name('updateProducts');
Route::get('/delete/{id}', [App\Http\Controllers\AdminController::class, 'delete'])->name('delete');
Route::get('/deleteCategory/{id}', [App\Http\Controllers\AdminController::class, 'deleteCategory'])->name('deleteCategory');