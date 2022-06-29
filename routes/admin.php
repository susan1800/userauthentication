<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FormDataController;
use App\Http\Controllers\Admin\PaymentStatusController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\NotificationController;


use App\Http\Controllers;

Route::middleware(['adminlogin'])->group(function () {

    Route::group(['prefix'  =>  'admin'], function () {

        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::group(['prefix'  =>  'formdata'], function () {

             Route::get('/', [FormDataController::class, 'index'])->name('admin.formdata.index');
        });

        Route::group(['prefix'  =>  'paymentstatus'], function () {

            Route::get('/', [PaymentStatusController::class, 'index'])->name('admin.paymentstatus.index');
       });
    });

    Route::post('searchajaxform', [SearchController::class, 'formSearch'])->name('searchajaxform');
    Route::post('search', [SearchController::class, 'search'])->name('searchajax');
    Route::post('/changepaymentformstatus', [PaymentStatusController::class, 'changeFormStatus'])->name('changepaymentformstatus');
    Route::post('/changeapproveformstatus', [FormDataController::class, 'changeFormStatus'])->name('changeapproveformstatus');
    Route::post('/changeformpaymentstatus', [FormDataController::class, 'changeFormPaymentStatus'])->name('changeformpaymentstatus');


    Route::get('/notification', [NotificationController::class, 'index'])->name('notification');
    Route::get('/notificationcount', [NotificationController::class, 'getNotificationCount'])->name('notificationcount');
    Route::get('/notificationcountsetzero', [NotificationController::class, 'NotificationCountSetZero'])->name('notificationcountsetzero');

});

