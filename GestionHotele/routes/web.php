<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('client.home');
});

Route::get('/login', function () {
    return view('authentication.login');
});

Route::get('/register', function () {
    return view('authentication.register');
});

