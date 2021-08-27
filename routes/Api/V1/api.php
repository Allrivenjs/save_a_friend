<?php


use App\Http\Controllers\Api\CEOController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Auth\AuthControllor;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::post('register', [AuthControllor::class, 'register']);

Route::middleware('logroute')->group(function (){


    Route::post('login', [AuthControllor::class, 'login']);

    Route::middleware('auth:api')->group(function (){
        Route::apiResource('/profile', ProfileController::class)->except('store');
      // Route::post('/allusers', [ProfileController::class, 'Alluser']);
        Route::post('logout/',[AuthControllor::class, 'logout']);
     //   Route::apiResource('/ceo',  CEOController::class );
     //   Route::apiResource('/post',  PostController::class)->only('store' , 'show', 'update', 'destroy');
       // Route::post('/posts', [PostController::class, 'Posts']);
    });


});

