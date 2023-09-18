<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Auth\LoginController;

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
// Route::middleware('ensureCekbayar')->group(function () {
// });