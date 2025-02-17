<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/', function () {
   return response()->json("Data Call it");
});

// Route::get('/list', "Controller@list");

Route::get('/list', [ApiController::class, 'list']);
Route::get('/userlist', [ApiController::class, 'Userlist'])->middleware('auth:sanctum');
Route::get('/deleteItem/{id}', [ApiController::class, 'deleteItem']);
Route::post('/register', [ApiController::class, 'register']);
Route::post('/login', [ApiController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json($request->user());
});

Route::middleware('auth:sanctum')->get('/category', [CategoryController::class,'index']);
Route::middleware('auth:sanctum')->get('category/edit/{id}', [CategoryController::class,'edit']);
Route::middleware('auth:sanctum')->put('category/update/{id}', [CategoryController::class,'update']);
Route::middleware('auth:sanctum')->post('/category', [CategoryController::class,'store']);