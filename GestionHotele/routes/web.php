<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\ChambreController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\MiscsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\StripeController;

use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\AuthorCollection;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\GerantMiddleware;

//protection des routes par le middleware AuthMiddlweare 


Route::middleware('admin')->group(function() {
    Route::get('/admin/dashboard', [SiteController::class, 'AdminDashboard'])
        ->middleware('can:admin-dashboard');
    Route::get('/admin/hotels', [SiteController::class, 'AdminHotels']);
    Route::get('/admin/miscs', [SiteController::class, 'AdminMiscs']);
    Route::get("/admin/create-miscs", [MiscsController::class, 'create']);

    Route::post("/admin/create-miscs", [MiscsController::class, 'store']);
    Route::delete("/admin/miscs/{misc}", [MiscsController::class, 'destroy'])
        ->name('miscs.destroy');

    Route::get("/admin/edit-miscs/{misc}", [MiscsController::class, 'edit'])
        ->name('miscs.edit');
    Route::put("/admin/miscs/edit-miscs/{misc}", [MiscsController::class, 'update'])
    ->name('miscs.update');    

    Route::patch('/hotels/{hotel}/validate', [HotelController::class, 'validateHotel'])
    ->name('hotels.validate');
    Route::patch('/users/{user}/validate', [SessionsController::class, 'validate'])
    ->name('users.validate');

    Route::resource('hotels', HotelController::class);
    Route::resource('tags', TagController::class);
    Route::resource('properties', PropertyController::class);
    Route::resource('hotels', HotelController::class);
    Route::resource('role',RoleController::class);


});

Route::middleware('gerant')->group(function() {

    Route::get('/manager/dashboard', [SiteController::class, 'MangerDashboard'])->name("manager.dashboard");
    Route::resource('hotels', HotelController::class);
    Route::get('/manager/hotels', [SiteController::class, 'MangerHotles']);
    Route::get('/manager/chambres', [SiteController::class, 'MangerChambres']);
    Route::get('/manager/miscs', [SiteController::class, 'MangerMiscs']);
});

Route::get('/', [SiteController::class, 'ClientHomepage']);
Route::get('/hotels/details/{id}', [HotelController::class, 'show']);


Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/hotel/{id}', [SiteController::class, 'show']);
Route::delete('/logout', [SessionsController::class, 'destroy']);
Route::get('/login', [SessionsController::class, 'create']);
Route::post('/login', [SessionsController::class, 'store']);


//routes for editing user profile 
Route::get('/profile', [SessionsController::class,'edit']);
Route::put('/profile', [SessionsController::class,'update']);



Route::get('manager.wait', function () {
    return view('manager/wait');
});

Route::get('client.banne', function () {
    return view('client/banne');
});
Route::get('chambres/test', [ChambreController::class, 'test']);
Route::get('/chambres', [ChambreController::class, 'index']);

//test pour le reservation 
Route::post('reservation/filter', [ReservationController::class, 'filter'])->name('reservation.filter');



//routage de payment 
Route::post('/checkout/{chambre}', [StripeController::class, 'checkout'])->name('checkout');
Route::get('/checkout/success', [StripeController::class, 'success'])->name('checkout.success');
Route::get('checkout/cancel', [StripeController::class, 'cancel'])->name('checkout.cancel');


Route::resource('chambres',ChambreController::class);
Route::patch('/users/{user}/validate',[SessionsController::class,'validate'])
->name('users.validate');
