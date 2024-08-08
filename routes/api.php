<?php

use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\CategoriController;
use App\Http\Controllers\CategoryApiController;
use Illuminate\Http\Request;
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




Route::post('/login',[AuthApiController::class,'login']);
Route::middleware(['jwt'])->group(function(){
    Route::get('/logout',[AuthApiController::class,'logout']);
    Route::post('/create',[CategoryApiController::class,'create']);
    Route::get('/search',[CategoryApiController::class,'get']);
    Route::get('/delete/{id}',[CategoryApiController::class,'delete']);
    Route::get('/edit/{id}',[CategoryApiController::class,'edit']);
    Route::post('/edit/{id}',[CategoryApiController::class,'update']);
});
