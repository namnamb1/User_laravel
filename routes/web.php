<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
}); 

Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);

Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create']);
Route::post('/users/create', [App\Http\Controllers\UserController::class, 'store']);

Route::get('/users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
Route::post('/users/edit/{id}', [App\Http\Controllers\UserController::class, 'update']);
Route::get('/users/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy']);

Route::get('/users/show/{id}', [App\Http\Controllers\UserController::class, 'show']);
Route::get('/users/search', [App\Http\Controllers\UserController::class, 'search']);