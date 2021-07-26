<?php

use App\Http\Controllers\API\v1\LoginController as LoginControllerAlias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//users


    Route::prefix('/user')->group(function (){
        Route::post('login', [LoginControllerAlias::class, 'Login']);
    });

