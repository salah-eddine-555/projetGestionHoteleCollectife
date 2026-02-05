<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\AuthorCollection;

Route::get('/', [SiteController::class, 'index']);




Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/hotel/{id}', [SiteController::class, 'show']);
Route::delete('/logout',[SessionsController::class,'destroy']);
Route::get('/login',[SessionsController::class,'create']);
Route::post('/login',[SessionsController::class,'store']);




