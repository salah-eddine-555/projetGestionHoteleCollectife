<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index']);
Route::get('/hotels/details/{id}', [HotelController::class, 'show']);
Route::get('/admin/dashboard', [HotelController::class, 'index']);


Route::get('/login', function () {
    return view('authentication.login');
});

Route::get('/register', function () {
    return view('authentication.register');
});

// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// });

Route::get('/hotel/{id}', [SiteController::class, 'show']);




