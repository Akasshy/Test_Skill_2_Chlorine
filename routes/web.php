<?php

use App\Http\Controllers\CategoriController;
// use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[UserController::class,'login']);
Route::post('/login',[UserController::class,'autentikasi']);
Route::middleware(['statuslogin'])->group(function(){
    Route::get('/logout',[UserController::class,'logout']);
    Route::get('/user',[UserController::class, 'user']);
    Route::get('/user',[UserController::class, 'show_user']);
    Route::post('/form-user',[UserController::class, 'create']);
    Route::get('/form-user',[UserController::class, 'add']);
    Route::get('/update/{id}',[UserController::class,'edit']);
    Route::post('/update/{id}',[UserController::class,'update']);
    Route::get('/destroy/{id}',[UserController::class,'delete']);


    Route::get('/dasboard',[CategoriController::class,'index']);

    Route::get('/category',[CategoriController::class, 'category']);
    Route::get('/create',[CategoriController::class,'add']);
    Route::post('/create',[CategoriController::class,'create']);
    Route::post('/search',[CategoriController::class,'search']);
    Route::get('/delete/{id}',[CategoriController::class,'delete']);
    Route::get('/edit/{id}',[CategoriController::class,'edit']);
    Route::post('/edit/{id}',[CategoriController::class,'update']);
});