<?php


use App\Http\Controllers\Api\CEOController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Auth\AuthControllor;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('logroute')->group(function (){

    Route::post('register', [AuthControllor::class, 'register']);
    Route::post('login', [AuthControllor::class, 'login']);

    Route::middleware('auth:api')->group(function (){
        Route::apiResource('/user', UserController::class);
        Route::post('/allusers', [UserController::class, 'Alluser']);
        Route::post('logout/',[AuthControllor::class, 'logout']);
     //   Route::apiResource('/ceo',  CEOController::class );
        Route::apiResource('/post',  PostController::class)->only('store' , 'show', 'update', 'destroy');
        Route::post('/posts', [PostController::class, 'Posts']);
    });


});

