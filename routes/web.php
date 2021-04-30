<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/authentication', function () {
    return view('authentication');
});

Route::get('/userview', function () {
    return view('userview');
});

Route::get('/clientview', function () {
    return view('clientview');
});

Route::get('/profile', function () {
    return view('personalprofilview');
});

Route::get('/ordre', function () {
        return view('ordremission');
});

Route::get('/inventaire', function () {
   return view('inventaire');
});

Route::get('/tribunalcourts', function () {
   return view('tribunalcourts');
});

Route::get('/lois', function () {
        return view('loisarticle');
});
