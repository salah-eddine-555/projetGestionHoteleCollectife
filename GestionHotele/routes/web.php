<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\AuthorCollection;

Route::get('/', [SiteController::class, 'index']);
Route::get('/hotels/details/{id}', [HotelController::class, 'show']);
Route::get('/managgiter/hotels', [SiteController::class, 'MangerHotles']);
Route::get('/admin/dashboard', [SiteController::class, 'AdminDashboard']);




Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);


// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// });

Route::get('/hotel/{id}', [SiteController::class, 'show']);
Route::get('/manager/hotels', function(){
    return redirect()->route('hotels.index');
});
Route::delete('/logout',[SessionsController::class,'destroy']);
Route::get('/login',[SessionsController::class,'create']);
Route::post('/login',[SessionsController::class,'store']);


/* Route::post('/hotels/create', [HotelController::class, 'store']);
 */Route::resource('hotels', HotelController::class);

 Route::resource('tags',TagController::class);

 Route::resource('properties',PropertyController::class);