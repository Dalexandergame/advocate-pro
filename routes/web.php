<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StocksController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DemandsController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\TemplatesController;
use App\Http\Controllers\VignettesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsStockController;
use App\Http\Controllers\DossierjuridiqueController;
use App\Http\Controllers\DropdownController;
use App\Models\Product;


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

Route::get('/lois-et-articles', [ArticleController::class,'show']);
Route::post('/lois-et-articles', [ArticleController::class,'store']);
Route::get('/lois-et-articles/view/{id}', [ArticleController::class,'view']);
Route::get('/lois-et-articles/download/{file}', [ArticleController::class,'download']);

Route::get('/correspondence', function () {
    return view('correspondence');
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

Route::get('add-product-to-stock', [ProductsStockController::class, 'index'])->name('productstock.index');
Route::post('add-product-to-stock', [ProductsStockController::class, 'choose'])->name('productstock.choose');

Route::resource('templates', TemplatesController::class)->except('index');

Route::resource('categories', CategoriesController::class);
Route::resource('categories.products', ProductsController::class)->shallow();
Route::post('demands/{demand}/approve', [DemandsController::class, 'handle'])->name('demands.handle');
Route::get('demands/approvedDemands',[DemandsController::class, 'approved'])->name('demands.approved');
Route::resource('demands', DemandsController::class);
Route::get('demands/create/add-demand-products', [DemandsController::class, 'AddDemandProducts'])->name('AddDemandProducts');
Route::post('demands/create', [DemandsController::class, 'StoreDemandProducts'])->name('StoreDemandProducts');
Route::resource('stocks', StocksController::class);
Route::resource('vignettes', VignettesController::class);

Route::get('/getCatProducts', [DropdownController::class, 'selectCategory']);
Route::get('/getProduct', [DropdownController::class, 'selectProduct']);

Route::resource('templates', TemplatesController::class)->except(['index']);

Route::get('/documents', function () {
    return view('documents');
});
Route::post('/uploaddocument',[DocumentController::class,'store']);
Route::get('/documents',[DocumentController::class,'show']);

Route::get('dossierjuridiques', [DossierjuridiqueController::class,'index']);
Route::get('dossierjuridiques/create', [DossierjuridiqueController::class,'create']);
Route::post('dossierjuridiques', [DossierjuridiqueController::class,'store']);
Route::get('dossierjuridiques/{id}/edit', [DossierjuridiqueController::class,'edit']);
Route::put('dossierjuridiques/{id}', [DossierjuridiqueController::class,'update']);
