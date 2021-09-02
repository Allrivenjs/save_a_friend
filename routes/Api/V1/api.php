<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;


Route::post('register', [AuthController::class, 'register']);

Route::middleware('logroute')->group(function (){


    Route::post('login', [AuthController::class, 'authenticate']);

    Route::middleware('jwt.verify')->group(function (){
        Route::apiResource('/profile', ProfileController::class)->except('store');
        Route::get('/profiles', [ProfileController::class, 'getAllProfile']);
        Route::post('logout',[AuthController::class, 'logout']);
        Route::apiResource('/user',  AuthController::class);
    });


});
