<?php

use App\Models\Mission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
//use App\Http\Controllers\TacheController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\StocksController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DemandsController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TribunalController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\TemplatesController;
use App\Http\Controllers\VignettesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ClientcompteController;
use App\Http\Controllers\ClientcontactController;
use App\Http\Controllers\JurisprudenceController;
use App\Http\Controllers\ProductsStockController;
use App\Http\Controllers\DossierjuridiqueController;



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
Route::post('/ordre-de-mission', [MissionController::class,'store']);
Route::get('/ordre-de-mission/edit/{id}', [MissionController::class,'edit']);
Route::delete('/ordre-de-mission/delete/{id}', [MissionController::class,'delete']);
Route::delete('/ordre-de-mission/deleteAll', [MissionController::class,'deleteCheckedMissions']);
Route::post('/ordre-de-mission/{mission}',[MissionController::class, 'status']);
Route::get('/ordre-de-mission/approved', [MissionController::class,'approved']);
Route::get('/ordre-de-mission/declined', [MissionController::class,'declined']);
Route::get('/ordre-de-mission/attente', [MissionController::class,'attente']);

//Route::get('/calendrier/search',  [TacheController::class,'search']);
//Route::get('/calendrier/view/{id}',  [TacheController::class,'view']);
//Route::get('/calendrier',  [TacheController::class,'indexCal']);
//Route::get('/calendrier',  [TacheController::class,'showcal']);

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
//Route::get('/taches', [TacheController::class,'show']);
//Route::post('/taches', [TacheController::class,'store']);
//Route::get('/taches-details/{id}', [TacheController::class,'viewtask']);
//Route::delete('/taches-details/delete/{id}', [TacheController::class,'destroy']);

Route::post('/comment/store', [CommentController::class,'store'])->name('comment.add');
Route::post('/reply/store', [CommentController::class, 'replyStore'])->name('reply.add');
Route::get('/comment/download/{file}', [CommentController::class,'download']);

// Route::get('/taches-details', function () {
//     return view('tachesdetails');
// });

Route::get('/dossier-juridiques', function () {
    return view('dossierjuridique');
});

Route::get('/dossier-juridiques', function () {
    return view('dossierjuridique');
});

Route::get('/payments', function () {
    $userMissions = Mission::where('user_id',auth()->user()->id)->count();
    $userLastMission = Mission::with('paymentMission')->where('user_id',auth()->user()->id)->latest('updated_at')->first();
    //dd($userLastMission);
    return view('payments.paymentIndex',compact('userMissions','userLastMission'));
})->name('payments.index');



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
Route::post('/documents/uploaddocument',[DocumentController::class,'store']);
Route::get('/documents',[DocumentController::class,'show']);
Route::get('/documents/download/{file}',[DocumentController::class,'download']);
Route::delete('/documents/{id}',[DocumentController::class,'destroy']);
Route::delete('/selected-docs',[DocumentController::class,'deleteCheckedStudents'])->name('doc.deleteSelected');
Route::get('/documents/documentview/{id}',[DocumentController::class,'view']);
Route::get('/documents/search',[DocumentController::class,'search']);

Route::get('/jurisprudence',[JurisprudenceController::class,'show']);
Route::post('/jurisprudence/upload',[JurisprudenceController::class,'store']);
Route::get('/jurisprudence/download/{file}',[JurisprudenceController::class,'download']); 
Route::get('/jurisprudence/jurisprudenceview/{id}',[JurisprudenceController::class,'view']);
Route::delete('/selected-jurisprudence',[JurisprudenceController::class,'deleteCheckedStudents'])->name('jurisprudence.deleteSelected');


Route::get('dossierjuridiques', [DossierjuridiqueController::class,'index']);
Route::get('dossierjuridiques/create', [DossierjuridiqueController::class,'create']);
Route::post('dossierjuridiques', [DossierjuridiqueController::class,'store']);
Route::get('dossierjuridiques/{id}/edit', [DossierjuridiqueController::class,'edit']);
Route::put('dossierjuridiques/{id}', [DossierjuridiqueController::class,'update']);
Route::delete('dossierjuridiques/{id}', [DossierjuridiqueController::class, 'destroy']);
Route::get('/dossierjuridiques/search',[DossierjuridiqueController::class, 'search']);
Route::get('/dossierjuridiques/{id}/vue', [DossierjuridiqueController::class, 'vue']);
Route::get('/dossier-juridiques-vue', function () {
    return view('dossierjuridiquevue');
});

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

Route::get('/payments/paymission', function () {
    $missions= Mission::where('status','=','Aprouver')->with('paymentMission')->get();
    return view('payments.paymission', compact('missions'));
})->name('paymission');
Route::get('/payments/paydossier', function () {
    return view('payments.paydossier');
})->name('paydossier');
Route::get('/payments/refund', function () {
    return view('payments.refund');
})->name('refund');
Route::get('/payments/paymission/view-payment-details/{id}', [PaymentController::class,'viewMission'])->name('paymentDetails');
Route::post('/payments/paymission/view-payment-details/choose-payment-method', [PaymentController::class,'choosePaymentMethod'])->name('Payments.choosePaymentMethod');
Route::get('/payments/paymission/{id}/card-checkout', [PaymentController::class,'cardCheckout'])->name('cardCheckout');
Route::post('/payments/paymission/{id}', [PaymentController::class,'pay'])->name('pay.post');
Route::get('/payments/paymission/view-payment-details/choose-payment-method/cheque/{id}', [PaymentController::class,'showMissionPayment'])->name('Payments.showMissionPayment');

