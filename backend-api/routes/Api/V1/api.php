<?php

use App\Http\Controllers\Api\AuthControllor;
use App\Http\Controllers\Api\CEOController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthControllor::class, 'register']);
Route::post('login', [AuthControllor::class, 'login']);



Route::middleware('auth:api')->prefix('data')->group(function (){


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

Route::middleware('auth:api')->group(function (){
    Route::post('logout/',[AuthControllor::class, 'logout']);
 //   Route::apiResource('/ceo',  CEOController::class );
    Route::apiResource('/post',  PostController::class);
    Route::post('/posts', [PostController::class, 'Posts']);
});


