<?php

use App\Http\Controllers\Backend\AboutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Backend\ContactController as BackendContact;
use App\Http\Controllers\AboutController as FrontAboutController;

Route::post('/login', [LoginController::class, 'login']);
Route::post('/contact',[ContactController::class,'store']);
Route::get('/about', [FrontAboutController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
   Route::get('dashboard/about',[AboutController::class,'index']);
   Route::get('dashboard/contacts', [BackendContact::class, 'index']);
   Route::post('/about',[AboutController::class,'store']);
   Route::put('/about',[AboutController::class,'update']);
   Route::delete('/about', [AboutController::class, 'destroy']);
   Route::delete('/contacts/{id}', [BackendContact::class, 'destroy']);
   Route::post('/logout', [LoginController::class, 'logout']);
});