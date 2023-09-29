<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\CekturnitinController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubmenuController;
use App\Http\Controllers\MenuSubsChildController;


Route::get('/',                     [LandingController::class, 'showLandingPage'])->name('landing.page');

Route::get('turnitin',              [CekturnitinController::class, 'showTurnitinPage'])->name('turnitin.page');
Route::post('turnitin',             [CekturnitinController::class, 'checkTurnitin'])->name('turnitin.action');
Route::post('turnitin.validation',  [CekturnitinController::class, 'checkAvailability'])->name('turnitin.validation');

Route::get('login',                 [LoginController::class, 'showLoginPage'])->name('login.page');
Route::post('login',                [LoginController::class, 'loginAction'])->name('login.action');
Route::get('logout',                [LoginController::class, 'logoutAction'])->name('logout.action');


Route::post('payment/proses',       [PaymentController::class, 'processPayment'])->name('payment.proses');

Route::get('dashboard',             [PortalController::class, 'showPortalPage'])->name('dashboard.page')->middleware('auth');

Route::get('menu',                  [MenuController::class, 'showMenusPage'])->name('menus.page')->middleware('auth');
Route::post('menu',                 [MenuController::class, 'menusAction'])->name('menus.action')->middleware('auth');

Route::get('submenu',               [SubmenuController::class, 'showSubmenu'])->name('submenus.page')->middleware('auth');
Route::post('submenu',              [SubmenuController::class, 'submenuAction'])->name('submenu.action')->middleware('auth');

Route::get('submenu/child',         [MenuSubsChildController::class, 'showChildSubmenu'])->name('childsub.page')->middleware('auth');
Route::post('submenu/child',        [MenuSubsChildController::class, 'childsubAction'])->name('childsub.action')->middleware('auth');

Route::get('register',              [RegisterController::class, 'showRegisPage'])->name('regis.page');
Route::post('register.username',    [RegisterController::class, 'checkUsername'])->name('register.username');
Route::post('register.email',       [RegisterController::class, 'checkEmail'])->name('register.email');
Route::post('register',             [RegisterController::class, 'registerUser'])->name('register.action');

Route::get('/verify-email',         [VerificationController::class, 'verifyEmail'])->name('verification.verify');

