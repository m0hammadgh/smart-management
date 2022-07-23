<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppSettingController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CurrencyCompareController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\FactorController;
use App\Http\Controllers\SubscriptionPlanController;
use App\Http\Controllers\TicketCategoryController;
use App\Http\Controllers\TradeHistoryController;
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
        Route::get('/profit', [AdminController::class, 'setUsersProfit'])->name('user.profit');
        Route::post('/profit', [AdminController::class, 'storeUserProfit'])->name('user.profit.store');

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

    ######## Currency  ########
    Route::group(['prefix' => 'currency'], function () {
        Route::get('', [CurrencyController::class, 'list'])->name('currency.list');
        Route::get('/new', [CurrencyController::class, 'add'])->name('currency.add');
        Route::post('/store', [CurrencyController::class, 'store'])->name('currency.store');
        Route::get('/edit/{id}', [CurrencyController::class, 'edit'])->name('currency.edit');
        Route::post('/update/{id}', [CurrencyController::class, 'update'])->name('currency.update');
        Route::get('/delete/{id}', [CurrencyController::class, 'delete'])->name('currency.delete');
    });
    ######## Currency  ########

    ######## Exchange  ########
    Route::group(['prefix' => 'exchange'], function () {
        Route::get('', [ExchangeController::class, 'list'])->name('exchange.list');
        Route::get('/new', [ExchangeController::class, 'add'])->name('exchange.add');
        Route::post('/store', [ExchangeController::class, 'store'])->name('exchange.store');
        Route::get('/edit/{id}', [ExchangeController::class, 'edit'])->name('exchange.edit');
        Route::post('/update/{id}', [ExchangeController::class, 'update'])->name('exchange.update');
        Route::get('/delete/{id}', [ExchangeController::class, 'delete'])->name('exchange.delete');
    });
    ######## Exchange  ########


    ######## TradHistory  ########
    Route::group(['prefix' => 'trade-history'], function () {
        Route::get('', [TradeHistoryController::class, 'list'])->name('tradeHistory.list');
        Route::get('/new', [TradeHistoryController::class, 'add'])->name('tradeHistory.add');
        Route::post('/store', [TradeHistoryController::class, 'store'])->name('tradeHistory.store');
        Route::get('/edit/{id}', [TradeHistoryController::class, 'edit'])->name('tradeHistory.edit');
        Route::post('/update/{id}', [TradeHistoryController::class, 'update'])->name('tradeHistory.update');
        Route::get('/delete/{id}', [TradeHistoryController::class, 'delete'])->name('tradeHistory.delete');
    });
    ######## TradHistory  ########


    ######## Factor  ########
    Route::group(['prefix' => 'factor'], function () {
        Route::get('', [FactorController::class, 'list'])->name('factor.list');
        Route::post('/accept/{id}', [TradeHistoryController::class, 'update'])->name('factor.accept');
        Route::get('/reject/{id}', [TradeHistoryController::class, 'delete'])->name('factor.reject');
    });
    ######## Factor  ########


    ######## Compare  ########
    Route::group(['prefix' => 'compare'], function () {
        Route::get('', [CurrencyCompareController::class, 'list'])->name('compare.list');
        Route::get('/new', [CurrencyCompareController::class, 'add'])->name('compare.add');
        Route::post('/store', [CurrencyCompareController::class, 'store'])->name('compare.store');
        Route::get('/edit/{id}', [CurrencyCompareController::class, 'edit'])->name('compare.edit');
        Route::post('/update/{id}', [CurrencyCompareController::class, 'update'])->name('compare.update');
        Route::get('/delete/{id}', [CurrencyCompareController::class, 'delete'])->name('compare.delete');
    });
    ######## Compare  ########


    ######## Bank Accounts  ########
    Route::group(['prefix' => 'bank-account'], function () {
        Route::get('', [BankAccountController::class, 'listBankAccountsVerificationRequest'])->name('bankAccounts.list');
        Route::get('/accept/{id}', [BankAccountController::class, 'acceptBankAccount'])->name('bankAccounts.accept');
        Route::post('/reject/{id}', [BankAccountController::class, 'rejectBankAccount'])->name('bankAccounts.reject');
    });
    ######## Bank Accounts  ########


    ######## Subscription Plan  ########
    Route::group(['prefix' => 'subscription'], function () {
        Route::get('', [SubscriptionPlanController::class, 'listPlans'])->name('subscription.admin.list');
        Route::get('/new', [SubscriptionPlanController::class, 'addPlan'])->name('subscription.admin.add');
        Route::post('/store', [SubscriptionPlanController::class, 'storeSubscription'])->name('subscription.admin.store');
        Route::get('/edit/{id}', [SubscriptionPlanController::class, 'editPlan'])->name('subscription.admin.edit');
        Route::post('/update/{id}', [SubscriptionPlanController::class, 'updateSubscription'])->name('subscription.admin.update');
        Route::get('/delete/{id}', [SubscriptionPlanController::class, 'delete'])->name('subscription.admin.delete');
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
    ######## Ticket Category  ########


    ######## Settings  ########
    Route::group(['prefix' => 'settings'], function () {
        Route::get('', [AppSettingController::class, 'showContentSetting'])->name('settings.content');
        Route::post('/new', [AppSettingController::class, 'showContentSettingUpdate'])->name('settings.content.update');

    });
    ######## Settings  ########
});
