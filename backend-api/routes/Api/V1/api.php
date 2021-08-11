<?php

use App\Http\Controllers\Api\AuthControllor;
use App\Http\Controllers\Api\CEOController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthControllor::class, 'Register']);
Route::post('/login', [AuthControllor::class, 'Login']);
Route::prefix('data')->group(function (){

    Route::get('/categories', function (){
        return response()->json([
            'Categories' =>\App\Models\Category::pluck('name', 'id'),
            'messages' => 'Retrieved  Successfully'
        ],200);
    });
    Route::get('/tags', function (){
        return response()->json([
            'Tags' =>\App\Models\Tag::all(),
            'messages' => 'Retrieved  Successfully'
        ],200);
    });
    Route::get('/type_post', function (){
        return response()->json([
            'Type_Post' => \App\Models\Type_post::all(),
            'messages' => 'Retrieved  Successfully'
        ],200);
    });


});



Route::apiResource('/ceo',  CEOController::class )->middleware('auth:api');

Route::apiResource('/posts',  PostController::class)->only('index', 'store')->middleware('auth:api');

