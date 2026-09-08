<?php

use App\Http\Controllers\Backend\AboutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;


Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/about',[AboutController::class,'index']);
Route::post('/about',[AboutController::class,'store']);
Route::put('/about',[AboutController::class,'update']);
Route::delete('/about', [AboutController::class, 'destroy']);