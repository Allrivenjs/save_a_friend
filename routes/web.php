<?php

use App\Http\Controllers\View\RutaPrimariaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CEOController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Auth\AuthControllor;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

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

Route::post('register', [AuthControllor::class, 'register']);

Route::middleware('logroute')->group(function (){


    Route::post('login', [AuthControllor::class, 'login']);

    Route::middleware('auth:api')->group(function (){
        Route::apiResource('/profile', ProfileController::class)->except('store');
        Route::get('/profiles', [ProfileController::class, 'getAllProfile']);
        Route::post('logout',[AuthControllor::class, 'logout']);
        Route::apiResource('/user',  UserController::class);
    });


});
