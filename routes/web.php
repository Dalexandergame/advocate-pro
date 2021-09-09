<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ClientcompteController;
use App\Http\Controllers\ClientcontactController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\DemandsController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DossierjuridiqueController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\GovertemplatesController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\JurisprudenceController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductsStockController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\StocksController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\TemplatesController;
use App\Http\Controllers\TribunalController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VignettesController;
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

Route::get('/new-login', function () {
    return view('auth/newLogin');
});

Route::get('/new-forget', function () {
    return view('auth/newForget');
});

Route::get('/new-register', function () {
    return view('users/newRegister');
});
Route::get('/', function () {
    return view('auth/newLogin');
});


Route::resource('/users', UsersController::class);
Route::get('/users/delete/{id}',[UsersController::class,'destroy']);
Route::resource('/roles', RolesController::class);
Route::get('/roles/delete/{id}',[RolesController::class,'destroy']);
Route::resource('/permissions', PermissionController::class);
Route::get('/permissions/delete/{id}',[PermissionController::class,'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/clients', function () {
    return view('clientview');
});

Route::get('/profile',[ProfilController::class,'show']);
Route::put('/profile/update/{id}',[ProfilController::class,'update']);
Route::put('/profile/updatepass/{id}',[ProfilController::class,'updatepass']);

Route::put('/ordre-de-mission/update/{id}', [MissionController::class,'update']);
Route::get('/ordre-de-mission', [MissionController::class,'show']);
Route::get('/ordre-de-missions', [MissionController::class,'index']);
Route::post('/ordre-de-mission', [MissionController::class,'store']);
Route::get('/ordre-de-mission/edit/{id}', [MissionController::class,'edit']);
Route::delete('/ordre-de-mission/delete/{id}', [MissionController::class,'delete']);
Route::delete('/ordre-de-mission/deleteAll', [MissionController::class,'deleteCheckedMissions']);
Route::post('/ordre-de-mission/{mission}',[MissionController::class, 'status']);
Route::get('/ordre-de-mission/approved', [MissionController::class,'approved']);
Route::get('/ordre-de-mission/declined', [MissionController::class,'declined']);
Route::get('/ordre-de-mission/attente', [MissionController::class,'attente']);


Route::get('/calendrier/search',  [CalendrierController::class,'search']);
Route::get('/calendrier/view/{id}',  [CalendrierController::class,'view']);
Route::get('/calendrier/filteradmin',  [CalendrierController::class,'filteradmin']);
Route::get('/calendrier',  [CalendrierController::class,'showcal']);
Route::put('/calendrier/audiances/recap', [CalendrierController::class,'recap']);


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


Route::post('/taches/{etat}', [TacheController::class,'etat']);
Route::get('/taches', [TacheController::class,'show']);
Route::get('/taches/rendez-vous', [TacheController::class,'rendezvous']);
Route::get('/taches/audiances', [TacheController::class,'audiances']);
Route::put('/taches/audiances/recap/{id}', [TacheController::class,'recap']);
Route::post('/taches', [TacheController::class,'store']);
Route::get('/taches-details/{id}', [TacheController::class,'viewtask']);
Route::get('/audiance-details/{id}', [TacheController::class,'viewaudiance']);
Route::delete('/taches-details/delete/{id}', [TacheController::class,'destroy']);
Route::get('/taches-details/edit/{id}', [TacheController::class,'edit']);
Route::put('/taches-details/update/{id}', [TacheController::class,'update']);

Route::post('/comment/store', [CommentController::class,'store'])->name('comment.add');
Route::post('/reply/store', [CommentController::class, 'replyStore'])->name('reply.add');
Route::get('/comment/download/{file}', [CommentController::class,'download']);

Route::get('/payment', function () {
    return view('payment');
});



Route::get('/messages', function () {
        return view('messages');
});


Route::get('add-product-to-stock', [ProductsStockController::class, 'index'])->name('productstock.index');
Route::post('add-product-to-stock', [ProductsStockController::class, 'choose'])->name('productstock.choose');

Route::resource('templates', TemplatesController::class)->except('index');
Route::resource('govertemplates', GovertemplatesController::class);

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
Route::post('/documents/uploaddocument',[DocumentController::class,'store']);
Route::get('/documents',[DocumentController::class,'show']);
Route::get('/documents/download/{file}',[DocumentController::class,'download']);
Route::delete('/documents/{id}',[DocumentController::class,'destroy']);
Route::delete('/selected-docs',[DocumentController::class,'deleteCheckedStudents'])->name('doc.deleteSelected');
Route::get('/documents/documentview/{id}',[DocumentController::class,'view']);
Route::get('/documents/search',[DocumentController::class,'search']);

Route::get('dossier-juridiques', [DossierjuridiqueController::class,'show']);
Route::get('dossier-juridiques/mine', [DossierjuridiqueController::class,'index']);
Route::get('dossier-juridiques/vue/{id}', [DossierjuridiqueController::class,'vue']);
Route::post('dossier-juridiques', [DossierjuridiqueController::class,'store']);
Route::post('dossier-juridiques/sous', [DossierjuridiqueController::class,'sousstore']);
Route::get('dossier-juridiques/edit/{id}', [DossierjuridiqueController::class,'edit']);
Route::put('dossier-juridiques/{id}', [DossierjuridiqueController::class,'update']);
Route::put('dossier-juridiques/jugement/{id}', [DossierjuridiqueController::class,'updatejugement']);
Route::get('/dossier-juridiques/search',[DossierjuridiqueController::class, 'search']);
Route::delete('dossier-juridiques/{id}', [DossierjuridiqueController::class, 'destroy']);
Route::get('/dossier-juridiques/alltaches/{number}', [DossierjuridiqueController::class, 'alltaches']);

Route::get('/jurisprudence',[JurisprudenceController::class,'show']);
Route::post('/jurisprudence/upload',[JurisprudenceController::class,'store']);
Route::get('/jurisprudence/download/{file}',[JurisprudenceController::class,'download']); 
Route::get('/jurisprudence/jurisprudenceview/{id}',[JurisprudenceController::class,'view']);
Route::delete('/selected-jurisprudence',[JurisprudenceController::class,'deleteCheckedStudents'])->name('jurisprudence.deleteSelected');

Route::get('/clientcomptes', [ClientcompteController::class, 'index']);
Route::get('/clientcomptes/create', [ClientcompteController::class, 'create']);
Route::post('/clientcomptes', [ClientcompteController::class, 'store']);
Route::get('/clientcomptes/{id}/edit', [ClientcompteController::class, 'edit']);
Route::put('/clientcomptes/{id}', [ClientcompteController::class, 'update']);
Route::delete('/clientcomptes/{id}', [ClientcompteController::class, 'destroy']);

Route::get('/clientcontacts', [ClientcontactController::class, 'index']);
Route::get('/clientcontacts/create', [ClientcontactController::class, 'create']);
Route::post('/clientcontacts', [ClientcontactController::class, 'store']);
Route::get('/clientcontacts/{id}/edit', [ClientcontactController::class, 'edit']);
Route::put('/clientcontacts/{id}', [ClientcontactController::class, 'update']);
Route::delete('/clientcontacts/{id}', [ClientcontactController::class, 'destroy']);


Route::get('/tribunals', [TribunalController::class, 'index']);
Route::get('/tribunals/create', [TribunalController::class, 'create']);
Route::post('/tribunals', [TribunalController::class, 'store']);
Route::get('/tribunals/{id}/edit', [TribunalController::class, 'edit']);
Route::put('/tribunals/{id}', [TribunalController::class, 'update']);
Route::delete('/tribunals/{id}', [TribunalController::class, 'destroy']);