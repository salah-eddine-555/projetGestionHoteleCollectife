<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index']);


Route::get('/login', function () {
    return view('authentication.login');
});

Route::get('/register', function () {
    return view('authentication.register');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/hotel/{id}', [SiteController::class, 'show']);
Route::get('/manager/hotels', function(){
    return redirect()->route('hotels.index');
});


/* Route::post('/hotels/create', [HotelController::class, 'store']);
 */Route::resource('hotels', HotelController::class);
