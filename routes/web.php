<?php

use App\Http\Controllers\View\RutaPrimariaController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', [RutaPrimariaController::class, 'index']);
Route::get('/login', [RutaPrimariaController::class, 'index']);
Route::get('/profile', [RutaPrimariaController::class, 'index']);
Route::get('/register', [RutaPrimariaController::class, 'index']);
