<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DemandsController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StocksController;
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

Route::get('/inventaire', [InventoryController::class, 'index']);

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

Route::get('/ajouter-cat-produit', function () {
    return view('ajouter-cat-produit');
});

Route::resource('templates', TemplatesController::class)->except('index');

Route::resource('categories',CategoriesController::class);
Route::resource('categories.products',ProductsController::class)->shallow();
Route::get('demands/handle',[DemandsController::class, 'handle'])->name('demands.handle');
Route::resource('demands',DemandsController::class);
Route::get('demands/create/add-demand-products',[DemandsController::class, 'AddDemandProducts'])->name('AddDemandProducts');
Route::post('demands/create',[DemandsController::class, 'StoreDemandProducts'])->name('StoreDemandProducts');
Route::resource('stocks',StocksController::class);


