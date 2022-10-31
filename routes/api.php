<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login',[\App\Http\Controllers\API\LoginController::class,'login']);
Route::post('register',[\App\Http\Controllers\API\RegisterController::class,'register']);

Route::middleware('auth:api')->group(function(){
    Route::post('user/create',[\App\Http\Controllers\API\RegisterController::class,'create']);
    Route::post('user/update',[\App\Http\Controllers\API\UserController::class,'update']);
    Route::delete('user/delete/{id}',[\App\Http\Controllers\API\UserController::class,'delete']);
    Route::get('user/load/{id}',[\App\Http\Controllers\API\UserController::class,'load']);
    Route::get('user/index',[\App\Http\Controllers\API\UserController::class,'index']);

    Route::post("property/create", [\App\Http\Controllers\API\PropertyController::class, 'create']);
    Route::post("property/update", [\App\Http\Controllers\API\PropertyController::class, 'update']);
    Route::post("property/search", [\App\Http\Controllers\API\PropertyController::class, 'search']);
});
