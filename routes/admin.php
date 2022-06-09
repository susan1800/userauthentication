<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FormDataController;
use App\Http\Controllers\Admin\PaymentStatusController;
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
});

