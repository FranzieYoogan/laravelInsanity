<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});


Route::get('/queryTesting', function () {
    return view('queryTesting');
});

Route::get('/login', function () {
    return view('login');
});

Route::POST('/login', function () {
    return view('profile');
});

Route::get('/profile', function () {
    return view('login');
});

