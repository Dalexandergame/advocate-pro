<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MissionController;
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

Route::put('/ordre-de-mission/update/{id}', [MissionController::class,'update']);
Route::get('/ordre-de-mission', [MissionController::class,'show']);
Route::post('/ordre-de-mission', [MissionController::class,'store']);
Route::get('/ordre-de-mission/{id}/edit', [MissionController::class,'edit']);
Route::delete('/ordre-de-mission/delete/{id}', [MissionController::class,'delete']);
Route::delete('/ordre-de-mission/deleteAll', [MissionController::class,'deleteCheckedMissions']);

Route::get('/inventaire', function () {
   return view('inventaire');
});

Route::get('/tribunal', function () {
   return view('tribunalcourts');
});

Route::get('/lois-et-articles', [ArticleController::class,'show']);
Route::post('/lois-et-articles', [ArticleController::class,'store']);
Route::get('/lois-et-articles/view/{id}', [ArticleController::class,'view']);
Route::get('/lois-et-articles/download/{file}', [ArticleController::class,'download']);

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

Route::get('/payment', function () {
    return view('payment');
});

Route::get('/jurisprudence', function () {
    return view('jurisprudence');
});

Route::get('/messages', function () {
        return view('messages');
});

Route::get('/dossier-juridiques-vue', function () {
    return view('dossierjuridiquevue');
});

Route::resource('templates', TemplatesController::class)->except(['index']);

Route::get('dossierjuridiques', 'DossierjuridiqueController@index');
Route::get('dossierjuridiques/create', 'DossierjuridiqueController@create');
Route::post('dossierjuridiques', 'DossierjuridiqueController@store');
Route::get('dossierjuridiques/{id}/edit', 'DossierjuridiqueController@edit');
Route::put('dossierjuridiques/{id}', 'DossierjuridiqueController@update');