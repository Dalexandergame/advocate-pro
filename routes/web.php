<?php

use App\Http\Controllers\TemplatesController;
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

Route::get('/utilisateurs', function () {
    return view('userview');
});

Route::get('/clients', function () {
    return view('clientview');
});

Route::get('/profile', function () {
    return view('personalprofilview');
});

Route::get('/ordre-de-mission', function () {
        return view('ordremission');
});

Route::get('/inventaire', function () {
   return view('inventaire');
});

Route::get('/tribunal', function () {
   return view('tribunalcourts');
});

Route::get('/lois-et-articles', function () {
        return view('loisarticle');
});

Route::get('/correspondence', function () {
    return view('correspondence');
});

Route::get('/documents', function () {
    return view('documents');
});

Route::get('/taches', function () {
    return view('taches');
});

Route::get('/taches-details', function () {
    return view('tachesdetails');
});

Route::get('/dossier-juridiques', function () {
    return view('dossierjuridique');
});

Route::get('/jurisprudence', function () {
    return view('jurisprudence');
});

Route::get('/payment', function () {
    return view('payment');
});

Route::get('/correspondence', [TemplatesController::class , 'create']);

Route::post('/correspondence', [TemplatesController::class , 'store']);
