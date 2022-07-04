<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('', [UserController::class, 'login'])->name('user.login');
Route::get('/login', [UserController::class, 'login']);
Route::post('/doLogin', [UserController::class, 'doLogin'])->name('user.login.do');
Route::get('/register', [UserController::class, 'register'])->name('user.register');
Route::post('/doRegister', [UserController::class, 'doregister'])->name('user.register.do');
Route::get('/verify-mobile/{uuid}', [UserController::class, 'showMobileVerification'])->name('user.verify.mobile');
Route::post('/verify-mobile/{uuid}', [UserController::class, 'verifyMobileNumber'])->name('user.verify.mobile.do');
Route::get('/verify-email/{uuid}', [UserController::class, 'doregister'])->name('user.verify.email');
Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');

Route::group(['middleware' => 'user'], function () {

    Route::get('dashboard', [UserController::class, 'loadDashboard'])->name('user.dashboard');

    ######## Manager  ########
//    Route::group(['prefix' => 'manager'], function () {
//        Route::get('', [AdminController::class, 'listManagers'])->name('manager.index');
//        Route::get('list', [AdminController::class, 'listManagers'])->name('manager.list');
//        Route::get('new', [AdminController::class, 'newManager'])->name('manager.new');
//        Route::post('new/store', [AdminController::class, 'storeManager'])->name('manager.store');
//        Route::get('edit/{id}', [AdminController::class, 'editManager'])->name('manager.edit');
//        Route::post('edit/store/{id}', [AdminController::class, 'updateManager'])->name('manager.update');
//        Route::get('delete/{id}', [AdminController::class, 'managerDelete'])->name('manager.delete');;
//
//    });
    ######## Manager  ########

});
