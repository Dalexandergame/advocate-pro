<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DemandsController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StocksController;
use App\Http\Controllers\TemplatesController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\CommentController;
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
Route::get('/ordre-de-mission/edit/{id}', [MissionController::class,'edit']);
Route::delete('/ordre-de-mission/delete/{id}', [MissionController::class,'delete']);
Route::delete('/ordre-de-mission/deleteAll', [MissionController::class,'deleteCheckedMissions']);
Route::post('/ordre-de-mission/{mission}',[MissionController::class, 'status']);
Route::get('/ordre-de-mission/approved', [MissionController::class,'approved']);
Route::get('/ordre-de-mission/declined', [MissionController::class,'declined']);
Route::get('/ordre-de-mission/attente', [MissionController::class,'attente']);


Route::get('/calendrier/search',  [TacheController::class,'search']);
Route::get('/calendrier/view/{id}',  [TacheController::class,'view']);
//Route::get('/calendrier',  [TacheController::class,'indexCal']);
Route::get('/calendrier',  [TacheController::class,'showcal']);

Route::get('/inventaire', [InventoryController::class, 'index']);

Route::get('/tribunal', function () {
   return view('tribunalcourts');
});

Route::get('/lois-et-articles', [ArticleController::class,'show']);
Route::get('/lois-et-articles/search', [ArticleController::class,'search']);
Route::post('/lois-et-articles', [ArticleController::class,'store']);
Route::get('/lois-et-articles/view/{id}', [ArticleController::class,'view']);
Route::get('/lois-et-articles/download/{file}', [ArticleController::class,'download']);

Route::get('/correspondence', function () {
    return view('correspondence');
});


//Route::get('/taches', [TacheController::class,'index']);
Route::get('/taches', [TacheController::class,'show']);
Route::post('/taches', [TacheController::class,'store']);
Route::get('/taches-details/{id}', [TacheController::class,'viewtask']);
Route::delete('/taches-details/delete/{id}', [TacheController::class,'destroy']);

Route::post('/comment/store', [CommentController::class,'store'])->name('comment.add');
Route::post('/reply/store', [CommentController::class, 'replyStore'])->name('reply.add');
Route::get('/comment/download/{file}', [CommentController::class,'download']);

// Route::get('/taches-details', function () {
//     return view('tachesdetails');
// });

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

Route::resource('templates', TemplatesController::class)->except('index');

Route::resource('categories',CategoriesController::class);
Route::resource('categories.products',ProductsController::class)->shallow();
Route::post('demands/{demand}',[DemandsController::class, 'handle'])->name('demands.handle');
Route::get('demands/approvedDemands',[DemandsController::class, 'approved'])->name('demands.approved');
Route::resource('demands',DemandsController::class);
Route::get('demands/create/add-demand-products',[DemandsController::class, 'AddDemandProducts'])->name('AddDemandProducts');
Route::post('demands/create',[DemandsController::class, 'StoreDemandProducts'])->name('StoreDemandProducts');
Route::get('products/{product}/stocks/create',[StocksController::class, 'create'])->name('products.stocks.create');
Route::post('products/{product}/stocks',[StocksController::class, 'store'])->name('products.stocks.store');
Route::get('/stocks',[StocksController::class, 'index'])->name('stocks.index');

Route::resource('templates', TemplatesController::class)->except(['index']);

Route::get('/documents', function () {
    return view('documents');
});
Route::post('/documents/uploaddocument',[DocumentController::class,'store']);
Route::get('/documents',[DocumentController::class,'show']);
Route::get('/documents/download/{file}',[DocumentController::class,'download']);
Route::delete('/documents/{id}',[DocumentController::class,'destroy']);
Route::delete('/selected-docs',[DocumentController::class,'deleteCheckedStudents'])->name('doc.deleteSelected');
Route::get('/documents/documentview/{id}',[DocumentController::class,'view']);
Route::get('/documents/search',[DocumentController::class,'search']);

Route::get('dossierjuridiques', 'DossierjuridiqueController@index');
Route::get('dossierjuridiques/create', 'DossierjuridiqueController@create');
Route::post('dossierjuridiques', 'DossierjuridiqueController@store');
Route::get('dossierjuridiques/{id}/edit', 'DossierjuridiqueController@edit');
Route::put('dossierjuridiques/{id}', 'DossierjuridiqueController@update');
