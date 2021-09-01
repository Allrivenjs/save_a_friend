<?php


use App\Http\Controllers\Api\CEOController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Auth\AuthControllor;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('register', [UserController::class, 'register']);

Route::middleware('logroute')->group(function (){


    Route::post('login', [UserController::class, 'authenticate']);

    Route::middleware('jwt.verify')->group(function (){
        Route::apiResource('/profile', ProfileController::class)->except('store');
        Route::get('/profiles', [ProfileController::class, 'getAllProfile']);
        Route::post('logout',[UserController::class, 'logout']);
        Route::apiResource('/user',  UserController::class);
    });


});
