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
    Route::group(['prefix' => 'user'], function () {
        Route::get('/compete-info', [UserController::class, 'completeProfileInfo'])->name('user.complete_profile');
        Route::post('/submit-info', [UserController::class, 'submitInformation'])->name('user.submit_information');
        Route::get('/email-verification', [UserController::class, 'showEmailVerification'])->name('user.email_verification');
        Route::post('/email-verification', [UserController::class, 'verifyEmailAddress'])->name('user.email_verify');
        Route::get('/profile', [UserController::class, 'showProfile'])->name('user.profile');

    });
    Route::group(['prefix' => 'requests'], function () {
        Route::get('/', [UserController::class, 'listRequests'])->name('user.requests');
    });
    ######## Manager  ########

    Route::group(['prefix' => 'card'], function () {
        Route::get('/', [UserController::class, 'listUserCreditCards'])->name('user.card.list');
        Route::post('/store', [UserController::class, 'storeCreditCard'])->name('user.card.store');
    });


    Route::group(['prefix' => 'robot'], function () {
        Route::get('/', [UserController::class, 'loadRobotStatistics'])->name('robot.index');
    });

    Route::group(['prefix' => 'accountant'], function () {
        Route::get('/', [UserController::class, 'loadAccountant'])->name('accountant.index');
    });

});
