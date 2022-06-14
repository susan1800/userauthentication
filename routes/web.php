<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\VerificationController;
use App\Http\Controllers\User\LogoutController;
use App\Http\Controllers\FormFillupController;
use App\Http\Controllers\SubjectController;
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


require 'admin.php';

Route::get('/signin', function () {
    return view('login.signin');
})->name('signin');
Route::get('/signup', function () {
    return view('login.signup');
})->name('signup');
Route::get('/verifyotp', function () {
    return view('mail.verifyotp');
})->name('verifyotp');



Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/{email}/sendotp', [VerificationController::class, 'sendotp'])->name('sendotp');
Route::post('/checkotp', [VerificationController::class, 'checkotp'])->name('checkotp');

Route::get('/{email}/resendotp', [VerificationController::class, 'resendotp'])->name('resendotp');

Route::get('/userlogout', [LogoutController::class, 'userlogout'])->name('userlogout');
Route::get('/adminlogout', [LogoutController::class, 'adminlogout'])->name('adminlogout');



Route::middleware(['userlogin'])->group(function () {
    // Route:: view('/' , 'form.fillupform')->name('user');
    Route::get('/', [FormFillupController::class, 'index'])->name('user');
    Route::post('/getsubject', [SubjectController::class, 'getSubject'])->name('getsubject');
});



