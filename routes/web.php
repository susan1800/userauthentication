<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\VerificationController;
use App\Http\Controllers\User\LogoutController;
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


Route::get('/userlogout', [LogoutController::class, 'userlogout'])->name('userlogout');
Route::get('/adminlogout', [LogoutController::class, 'adminlogout'])->name('adminlogout');



Route::middleware(['userlogin'])->group(function () {
    Route:: view('/home' , 'welcome')->name('user');
});

Route::middleware(['adminlogin'])->group(function () {
    Route:: view('/' , 'adminpage')->name('admin');
});
    
