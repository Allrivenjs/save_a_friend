<?php

use App\Http\Controllers\Api\AuthControllor;
use App\Http\Controllers\Api\CEOController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthControllor::class, 'Register']);
Route::post('/login', [AuthControllor::class, 'Login']);

Route::apiResource('/ceo',  CEOController::class )->middleware('auth:api');
