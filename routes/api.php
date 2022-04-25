<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

 

// Products
Route::get('/products',[ProductsController::class,'index']);
Route::get('/products/{id}',[ProductsController::class,'show']);
Route::post('/products',[ProductsController::class,'save']);
Route::put('/products',[ProductsController::class,'update']);
Route::delete('/products/{id}',[ProductsController::class,'delete']);

// Users
Route::resource('/users',UserController::class);