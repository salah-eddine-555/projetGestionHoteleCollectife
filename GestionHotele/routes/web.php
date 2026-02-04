<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index']);


Route::get('/login', function () {
    return view('authentication.login');
});

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/hotel/{id}', [SiteController::class, 'show']);




