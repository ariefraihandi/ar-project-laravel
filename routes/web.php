<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\CekturnitinController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', [LandingController::class, 'showLandingPage'])->name('landing.page');
Route::get('login', [LandingController::class, 'showLoginPage'])->name('login.page');
Route::get('turnitin', [CekturnitinController::class, 'showTurnitinPage'])->name('turnitin.page');
Route::post('login', [LandingController::class, 'handleFormLogin'])->name('login.action');
Route::post('turnitin', [CekturnitinController::class, 'checkTurnitin'])->name('turnitin.action');
Route::post('turnitin.validation', [CekturnitinController::class, 'checkAvailability'])->name('turnitin.validation');
Route::post('payment/proses', [PaymentController::class, 'processPayment'])->name('payment.proses');
Route::get('dashboard', [PortalController::class, 'showPortalPage'])->name('dashboard.page');
Route::get('register', [RegisterController::class, 'showRegisPage'])->name('regis.page');
Route::get('login', [RegisterController::class, 'showLoginPage'])->name('login.page');
Route::post('register.username', [RegisterController::class, 'checkUsername'])->name('register.username');
Route::post('register.email', [RegisterController::class, 'checkEmail'])->name('register.email');
Route::post('register', [RegisterController::class, 'registerUser'])->name('register.action');
Route::post('/verify-email', [VerificationController::class, 'verifyEmail'])->name('verification.verify');

