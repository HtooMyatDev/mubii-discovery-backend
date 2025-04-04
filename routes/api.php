<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix'=>'auth'], function(){
    Route::post('login', [AuthController::class, 'login'])->name('api#login');
    Route::post('register',[AuthController::class,'register'])->name('api#register');
});
