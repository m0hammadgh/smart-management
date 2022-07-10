<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\SubscriptionPlanController;
use App\Http\Controllers\TicketCategoryController;
use App\Models\TicketCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('', [AdminController::class, 'login']);
Route::get('/login', [AdminController::class, 'login']);
Route::post('/doLogin', [AdminController::class, 'doLogin'])->name('login.do');


Route::group(['middleware' => 'admin'], function () {

    Route::get('dashboard', [AdminController::class, 'loadDashboard'])->name('dashboard');


    ######## Admin  ########
    Route::group(['prefix' => 'admin'], function () {
        Route::get('', [AdminController::class, 'listAdmin'])->name('admin.index');
        Route::get('/new', [AdminController::class, 'newAdmin'])->name('admin.new');
        Route::post('/store', [AdminController::class, 'storeAdmin'])->name('admin.store');
        Route::get('/edit/{id}', [AdminController::class, 'editAdmin'])->name('admin.edit');
        Route::post('/update/{id}', [AdminController::class, 'updateAdmin'])->name('admin.update');
        Route::get('/delete/{id}', [AdminController::class, 'deleteAdmin'])->name('admin.delete');

    });
    ######## Admin  ########

    ######## User  ########
    Route::group(['prefix' => 'user'], function () {
        Route::get('', [AdminController::class, 'listUser'])->name('user.index');
        Route::get('/new', [AdminController::class, 'newUser'])->name('user.new');
        Route::post('/store', [AdminController::class, 'storeUser'])->name('user.store');
        Route::get('/edit/{id}', [AdminController::class, 'editUser'])->name('user.edit');
        Route::post('/update/{id}', [AdminController::class, 'updateUser'])->name('user.update');
        Route::get('/delete/{id}', [AdminController::class, 'deleteUser'])->name('user.delete');

    });
    ######## User  ########

    ######## Document  ########
    Route::group(['prefix' => 'document'], function () {
        Route::get('', [AdminController::class, 'listDocumentVerification'])->name('document.list');
        Route::get('/accept/{id}', [AdminController::class, 'acceptDocument'])->name('document.accept');
        Route::get('/reject/{id}', [AdminController::class, 'rejectDocument'])->name('document.reject');

    });
    ######## Document  ########


    ######## Bank  ########
    Route::group(['prefix' => 'bank'], function () {
        Route::get('', [BankController::class, 'listBanks'])->name('bank.list');
        Route::get('/new', [BankController::class, 'addBank'])->name('bank.add');
        Route::post('/store', [BankController::class, 'storeBank'])->name('bank.store');
        Route::get('/edit/{id}', [BankController::class, 'editBank'])->name('bank.edit');
        Route::post('/update/{id}', [BankController::class, 'updateBank'])->name('bank.update');
        Route::get('/delete/{id}', [BankController::class, 'delete'])->name('bank.delete');
    });
    ######## Bank  ########

    ######## Bank Accounts  ########
    Route::group(['prefix' => 'bank-account'], function () {
        Route::get('', [BankAccountController::class, 'listBankAccountsVerificationRequest'])->name('bankAccounts.list');
        Route::get('/accept/{id}', [BankAccountController::class, 'acceptBankAccount'])->name('bankAccounts.accept');
        Route::post('/reject/{id}', [BankAccountController::class, 'rejectBankAccount'])->name('bankAccounts.reject');
    });
    ######## Bank  ########


    ######## Subscription Plan  ########
    Route::group(['prefix' => 'subscription'], function () {
        Route::get('', [SubscriptionPlanController::class, 'listPlans'])->name('subscription.list');
        Route::get('/new', [SubscriptionPlanController::class, 'addPlan'])->name('subscription.add');
        Route::post('/store', [SubscriptionPlanController::class, 'storeSubscription'])->name('subscription.store');
        Route::get('/edit/{id}', [SubscriptionPlanController::class, 'editPlan'])->name('subscription.edit');
        Route::post('/update/{id}', [SubscriptionPlanController::class, 'updateSubscription'])->name('subscription.update');
        Route::get('/delete/{id}', [SubscriptionPlanController::class, 'delete'])->name('subscription.delete');
    });
    ######## Subscription Plan  ########

    ######## Ticket Category  ########
    Route::group(['prefix' => 'ticket-cat'], function () {
        Route::get('', [TicketCategoryController::class, 'listItems'])->name('ticketCategory.list');
        Route::get('/new', [TicketCategoryController::class, 'addTicketCat'])->name('ticketCategory.add');
        Route::post('/store', [TicketCategoryController::class, 'storeTicketCat'])->name('ticketCategory.store');
        Route::get('/edit/{id}', [TicketCategoryController::class, 'edit'])->name('ticketCategory.edit');
        Route::post('/update/{id}', [TicketCategoryController::class, 'update'])->name('ticketCategory.update');
        Route::get('/delete/{id}', [TicketCategoryController::class, 'delete'])->name('ticketCategory.delete');
    });
    ######## Subscription Plan  ########
});
