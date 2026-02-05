<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\AuthorCollection;

Route::get('/', [SiteController::class, 'ClientHomepage']);
Route::get('/hotels/details/{id}', [HotelController::class, 'show']);

Route::get('/admin/dashboard', [SiteController::class, 'AdminDashboard']);
Route::get('/admin/hotels', [SiteController::class, 'AdminHotels']);


//Route pour le validation des hotels a partire de admin
Route::patch('/hotels/{hotel}/validate', [HotelController::class, 'validateHotel'])
    ->name('hotels.validate');

Route::get('/manager/dashboard', [SiteController::class, 'MangerDashboard']);
Route::get('/manager/hotels', [SiteController::class, 'MangerHotles']);
Route::get('/manager/chambres', [SiteController::class, 'MangerChambres']);
Route::get('/manager/miscs', [SiteController::class, 'MangerMiscs']);


Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);



Route::get('/hotel/{id}', [SiteController::class, 'show']);
Route::delete('/logout',[SessionsController::class,'destroy']);
Route::get('/login',[SessionsController::class,'create']);
Route::post('/login',[SessionsController::class,'store']);

Route::resource('hotels', HotelController::class);
