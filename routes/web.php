<?php

use App\Http\Controllers\AController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
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




Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('a-crud', [AController::class, 'index']);
Route::post('add-update', [AController::class, 'store']);
Route::post('edit-a', [AController::class, 'edit']);
Route::post('delete-a', [AController::class, 'destroy']);

