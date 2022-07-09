<?php

use App\Http\Controllers\AdminController;
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
    ######## User  ########


});
