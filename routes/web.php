<?php

use App\Models\Mission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FraisController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\TacheController;
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
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ClientcompteController;
use App\Http\Controllers\ClientcontactController;
use App\Http\Controllers\JurisprudenceController;
use App\Http\Controllers\ProductsStockController;
use App\Http\Controllers\GovertemplatesController;
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

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/new-forget', function () {
    return view('auth/newForget');
});

Route::get('/new-register', function () {
    return view('users/newRegister');
});
Route::get('/', function () {
    return view('auth/login');
});


Route::resource('/users', UsersController::class)->middleware('auth');
Route::get('/users/delete/{id}', [UsersController::class, 'destroy'])->middleware('auth');
Route::resource('/roles', RolesController::class);
Route::get('/roles/delete/{id}', [RolesController::class, 'destroy'])->middleware('auth');
Route::resource('/permissions', PermissionController::class)->middleware('auth');
Route::get('/permissions/delete/{id}', [PermissionController::class, 'destroy'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/clients', function () {
    return view('clientview');
})->middleware('auth');

Route::get('/profile', [ProfilController::class, 'show'])->middleware('auth');
Route::put('/profile/update/{id}', [ProfilController::class, 'update'])->middleware('auth');
Route::put('/profile/updatepass/{id}', [ProfilController::class, 'updatepass'])->middleware('auth');

Route::get('/ordre-de-missions', [MissionController::class, 'index'])->middleware('auth');
Route::group(['prefix'=>'/ordre-de-mission','middleware' => 'auth'],function () {
    Route::put('/update/{id}', [MissionController::class, 'update']);
    Route::get('/', [MissionController::class, 'show']);
    Route::post('/', [MissionController::class, 'store']);
    Route::get('/edit/{id}', [MissionController::class, 'edit']);
    Route::delete('/delete/{id}', [MissionController::class, 'delete']);
    Route::delete('/deleteAll', [MissionController::class, 'deleteCheckedMissions']);
    Route::post('/{mission}', [MissionController::class, 'status']);
    Route::get('/approved', [MissionController::class, 'approved']);
    Route::get('/declined', [MissionController::class, 'declined']);
    Route::get('/attente', [MissionController::class, 'attente']);
});

Route::group(['prefix'=>'/calendrier','middleware' => 'auth'],function () {
    Route::get('/search',  [CalendrierController::class, 'search']);
    Route::get('/view/{id}',  [CalendrierController::class, 'view']);
    Route::get('/filteradmin',  [CalendrierController::class, 'filteradmin']);
    Route::get('/',  [CalendrierController::class, 'showcal']);
    Route::put('/audiances/recap', [CalendrierController::class, 'recap']);
});

Route::get('/inventaire', [InventoryController::class, 'index'])->middleware('auth');

Route::get('/tribunal', function () {
    return view('tribunalcourts');
})->middleware('auth');

Route::group(['prefix'=>'/lois-et-articles','middleware' => 'auth'],function () {
    Route::get('/', [ArticleController::class, 'show']);
    Route::get('/search', [ArticleController::class, 'search']);
    Route::post('/', [ArticleController::class, 'store']);
    Route::get('/view/{id}', [ArticleController::class, 'view']);
    Route::get('/download/{file}', [ArticleController::class, 'download']);
});

Route::get('/correspondence', function () {
    return view('correspondence');
})->middleware('auth');

Route::group(['prefix'=>'/taches','middleware' => 'auth'],function () {
    Route::post('/{etat}', [TacheController::class, 'etat']);
    Route::get('/', [TacheController::class, 'show']);
    Route::get('/rendez-vous', [TacheController::class, 'rendezvous']);
    Route::get('/audiances', [TacheController::class, 'audiances']);
    Route::put('/audiances/recap/{id}', [TacheController::class, 'recap']);
    Route::post('/', [TacheController::class, 'store']);
});


Route::get('/taches-details/{id}', [TacheController::class, 'viewtask'])->middleware('auth');
Route::get('/audiance-details/{id}', [TacheController::class, 'viewaudiance'])->middleware('auth');
Route::delete('/taches-details/delete/{id}', [TacheController::class, 'destroy'])->middleware('auth');
Route::get('/taches-details/edit/{id}', [TacheController::class, 'edit'])->middleware('auth');
Route::put('/taches-details/update/{id}', [TacheController::class, 'update'])->middleware('auth');

Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.add')->middleware('auth');
Route::post('/reply/store', [CommentController::class, 'replyStore'])->name('reply.add')->middleware('auth');
Route::get('/comment/download/{file}', [CommentController::class, 'download'])->middleware('auth');

// Route::get('/taches-details', function () {
//     return view('tachesdetails');
// });

Route::get('/dossier-juridiques', function () {
    return view('dossierjuridique');
})->middleware('auth');
Route::get('/payments', function () {
    $userMissions = Mission::where('user_id', auth()->user()->id)->count();
    $userLastMission = Mission::with('paymentMission')->where('user_id', auth()->user()->id)->latest('updated_at')->first();
    //dd($userLastMission);
    return view('payments.paymentIndex', compact('userMissions', 'userLastMission'));
})->name('payments.index')->middleware('auth');



Route::get('/messages', function () {
    return view('messages');
})->middleware('auth');


Route::get('add-product-to-stock', [ProductsStockController::class, 'index'])->name('productstock.index');
Route::post('add-product-to-stock', [ProductsStockController::class, 'choose'])->name('productstock.choose');

Route::resource('templates', TemplatesController::class)->except('index');
Route::resource('govertemplates', GovertemplatesController::class);

Route::resource('categories', CategoriesController::class);
Route::resource('categories.products', ProductsController::class)->shallow();
Route::post('demands/{demand}/approve', [DemandsController::class, 'handle'])->name('demands.handle');
Route::get('demands/approvedDemands', [DemandsController::class, 'approved'])->name('demands.approved');
Route::resource('demands', DemandsController::class);
Route::get('demands/create/add-demand-products', [DemandsController::class, 'AddDemandProducts'])->name('AddDemandProducts');
Route::post('demands/create', [DemandsController::class, 'StoreDemandProducts'])->name('StoreDemandProducts');
Route::resource('stocks', StocksController::class);
Route::resource('vignettes', VignettesController::class);

Route::get('/getCatProducts', [DropdownController::class, 'selectCategory']);
Route::get('/getProduct', [DropdownController::class, 'selectProduct']);

Route::get('/documents', function () {
    return view('documents');
})->middleware('auth');

Route::group(['prefix'=>'/documents','middleware' => 'auth'],function () {
    Route::post('/uploaddocument', [DocumentController::class, 'store']);
    Route::get('/', [DocumentController::class, 'show']);
    Route::get('/download/{file}', [DocumentController::class, 'download']);
    Route::delete('/{id}', [DocumentController::class, 'destroy']);
    Route::get('/documentview/{id}', [DocumentController::class, 'view']);
    Route::get('/search', [DocumentController::class, 'search']);
});
Route::delete('/selected-docs', [DocumentController::class, 'deleteCheckedStudents'])->name('doc.deleteSelected');

Route::group(['prefix'=>'/dossier-juridiques','middleware' => 'auth'],function () {
    Route::get('/', [DossierjuridiqueController::class, 'show']);
    Route::get('/mine', [DossierjuridiqueController::class, 'index']);
    Route::get('/vue/{id}', [DossierjuridiqueController::class, 'vue'])->name('dossier.vue');
    Route::post('/', [DossierjuridiqueController::class, 'store']);
    Route::post('/sous', [DossierjuridiqueController::class, 'sousstore']);
    Route::get('/edit/{id}', [DossierjuridiqueController::class, 'edit']);
    Route::put('/{id}', [DossierjuridiqueController::class, 'update']);
    Route::put('/jugement/{id}', [DossierjuridiqueController::class, 'updatejugement']);
    Route::get('/search', [DossierjuridiqueController::class, 'search']);
    Route::delete('/{id}', [DossierjuridiqueController::class, 'destroy']);
    Route::get('/alltaches/{number}', [DossierjuridiqueController::class, 'alltaches']);

    Route::get('/{id}/vue/add-cost-type', [DossierjuridiqueController::class, 'cost_type'])->name('adddossierCost');
    Route::post('/{id}/vue/add-cost-type/choose', [DossierjuridiqueController::class, 'choose_cost_type'])->name('dossierCost.choose');
    Route::get('/{id}/vue/add-cost-type/vignettes/create', [VignettesController::class, 'vignetteList'])->name('dossierCost.vignettes');
    Route::post('/{id}/vue/add-cost-type/vignettes', [FraisController::class, 'store_vignette_cost'])->name('dossierCost.vignettes.post');
    Route::get('/{id}/vue/add-cost-type/vignettes/details', [FraisController::class, 'show_added_vignette'])->name('dossierCost.vignettes.get');
    Route::get('/{id}/vue/add-cost-type/other/create', [FraisController::class, 'create_other_cost'])->name('dossierCost.other.create');
    Route::post('/{id}/vue/add-cost-type/other', [FraisController::class, 'store_other_cost'])->name('dossierCost.other.store');
    Route::get('/{id}/vue/add-cost-type/other/details', [FraisController::class, 'show_other_cost'])->name('dossierCost.other.details');

    Route::get('/{id}/vue/payments/create', [PaymentController::class, 'dossier_payment_create'])->name('dossierpayment.create');
    Route::post('/{id}/vue/payments/', [PaymentController::class, 'dossier_payment_store'])->name('dossierpayment.store');
    Route::get('/{id}/vue/payments/details', [PaymentController::class, 'dossier_payment_details'])->name('dossierpayment.details');
});

Route::group(['prefix'=>'/jurisprudence','middleware' => 'auth'],function () {
    Route::get('/', [JurisprudenceController::class, 'show']);
    Route::post('/upload', [JurisprudenceController::class, 'store']);
    Route::get('/download/{file}', [JurisprudenceController::class, 'download']);
    Route::get('/jurisprudenceview/{id}', [JurisprudenceController::class, 'view']);
});
Route::delete('/selected-jurisprudence', [JurisprudenceController::class, 'deleteCheckedStudents'])->name('jurisprudence.deleteSelected')->middleware('auth');


Route::resource('clientcomptes', ClientcompteController::class)->middleware('auth');
Route::resource('clientcontacts', ClientcontactController::class)->middleware('auth');
Route::resource('tribunals', TribunalController::class)->middleware('auth');


Route::get('/payments/paydossier', function () {
    return view('payments.paydossier');
})->name('paydossier')->middleware('auth');
Route::get('/payments/refund', function () {
    return view('payments.refund');
})->name('refund')->middleware('auth');

Route::group(['prefix'=>'/payments/paymission','middleware' => 'auth'],function () {
    Route::get('/', function () {
        $missions = Mission::where('status', '=', 'Aprouver')->orderBy('updated_at', 'desc')->with('paymentMission', 'cheque')->get();
        //dd($missions);
        return view('payments.paymission', compact('missions'));
    })->name('paymission');
    Route::get('/view-payment-details/{id}', [PaymentController::class, 'viewMission'])->name('paymentDetails');
    Route::post('/view-payment-details/choose-payment-method', [PaymentController::class, 'choosePaymentMethod'])->name('Payments.choosePaymentMethod');
    Route::get('/{id}/card-checkout', [PaymentController::class, 'cardCheckout'])->name('cardCheckout');
    Route::post('/{id}', [PaymentController::class, 'pay'])->name('pay.post');
    Route::get('/view-payment-details/choose-payment-method/cheque/{id}', [PaymentController::class, 'showMissionPayment'])->name('Payments.showMissionPayment');
});
