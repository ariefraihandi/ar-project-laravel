<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\CekturnitinController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [LandingController::class, 'showLandingPage'])->name('landing.page');
Route::get('login', [LandingController::class, 'showLoginPage'])->name('login.page');
Route::post('login', [LandingController::class, 'handleFormLogin'])->name('login.action');
Route::get('turnitin', [CekturnitinController::class, 'showTurnitinPage'])->name('turnitin.page');
Route::post('turnitin', [CekturnitinController::class, 'checkTurnitin'])->name('turnitin.action');
Route::post('turnitin.validation', [CekturnitinController::class, 'checkAvailability'])->name('turnitin.validation');
// Route::get('/payment/{kode_barang}', 'PaymentController@showPaymentForm')->name('payment.form');
Route::post('payment/proses', [PaymentController::class, 'processPayment'])->name('payment.proses');
// Route::middleware('ensureCekbayar')->group(function () {
// });