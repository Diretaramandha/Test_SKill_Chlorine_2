<?php

use App\Http\Controllers\CategoriesApiController;
use App\Http\Controllers\UserApiController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login',[UserApiController::class, 'login']);
Route::middleware('api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/logout',[UserApiController::class, 'logout']);
Route::post('/create',[CategoriesApiController::class,'create']);

Route::post('/search',[CategoriesApiController::class,'search']);

Route::get('/delete/{id}',[CategoriesApiController::class,'delete']);

Route::get('/edit/{id}',[CategoriesApiController::class,'edit']);
Route::post('/edit/{id}',[CategoriesApiController::class,'update']);