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
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\SubmenuController;
use App\Http\Controllers\MenuSubsChildController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\MakalahController;
use App\Http\Controllers\MenuRole;


Route::get('/',                     [LandingController::class, 'showLandingPage'])->name('landing.page');

Route::get('turnitin',              [CekturnitinController::class, 'showTurnitinPage'])->name('turnitin.page');
Route::post('turnitin',             [CekturnitinController::class, 'checkTurnitin'])->name('turnitin.action');
Route::post('turnitin.validation',  [CekturnitinController::class, 'checkAvailability'])->name('turnitin.validation');

Route::get('login',                 [LoginController::class, 'showLoginPage'])->name('login.page');
Route::post('login',                [LoginController::class, 'loginAction'])->name('login.action');
Route::get('logout',                [LoginController::class, 'logoutAction'])->name('logout.action');

Route::get('redirect',              [DownloadController::class, 'download'])->name('download.redirect');
Route::get('download',              [DownloadController::class, 'filesDownlodad'])->name('download.page');
Route::post('download',             [DownloadController::class, 'downloading'])->name('downloading.action');
Route::post('submit-form',          [DownloadController::class, 'submitForm'])->name('submit.form');

Route::get('bossmakalah/makalah',   [MakalahController::class, 'showUploadForm'])->name('makalah.page')->middleware('auth');
Route::post('bossmakalah/makalah',  [MakalahController::class, 'upload'])->name('makalah.upload')->middleware('auth');
Route::get('bossmakalah/files',     [MakalahController::class, 'showFiles'])->name('files.page')->middleware('auth');
Route::post('verify/files',         [MakalahController::class, 'sendSuccessEmail'])->name('verify.files')->middleware('auth');
Route::post('notverified/files',    [MakalahController::class, 'sendFailEmail'])->name('notverified.files')->middleware('auth');
Route::post('bossmakalah/files',    [MakalahController::class, 'upload'])->name('makalah.upload')->middleware('auth');
Route::post('bossmakalah/makalah',    [MakalahController::class, 'store'])->name('makalah.action')->middleware('auth');

Route::post('payment/proses',       [PaymentController::class, 'processPayment'])->name('payment.proses');

Route::get('dashboard',             [PortalController::class, 'showPortalPage'])->name('dashboard.page')->middleware('auth');

Route::get('menu/list',             [MenuController::class, 'showMenusPage'])->name('menus.page')->middleware('auth');
Route::post('menu',                 [MenuController::class, 'menusAction'])->name('menus.action')->middleware('auth');
Route::delete('menu/{id}',          [MenuController::class, 'destroy'])->name('menu.destroy')->middleware('auth');
Route::put('menu/{id}',             [MenuController::class, 'update'])->name('menu.update')->middleware('auth');

Route::get('menu/submenu',          [SubmenuController::class, 'showSubmenu'])->name('submenus.page')->middleware('auth');
Route::post('submenu',              [SubmenuController::class, 'submenuAction'])->name('submenu.action')->middleware('auth');
Route::delete('submenu/{id}',       [SubmenuController::class, 'destroy'])->name('submenu.destroy')->middleware('auth');
Route::put('submenu/{id}',          [SubmenuController::class, 'submenuUpdate'])->name('submenu.update')->middleware('auth');

Route::get('menu/childsub',         [MenuSubsChildController::class, 'showChildSubmenu'])->name('childsub.page')->middleware('auth');
Route::post('submenu/child',        [MenuSubsChildController::class, 'childsubAction'])->name('childsub.action')->middleware('auth');
Route::delete('submenu/child/{id}', [MenuSubsChildController::class, 'destroy'])->name('childsub.destroy')->middleware('auth');
Route::put('submenu/child/{id}',    [MenuSubsChildController::class, 'childsubUpdate'])->name('childsub.update')->middleware('auth');

Route::get('menu/role',             [MenuRole::class, 'showRolePage'])->name('role.page')->middleware('auth');
Route::delete('role/{id}',          [MenuRole::class, 'destroy'])->name('role.destroy')->middleware('auth');
Route::get('menu/access/{id}',      [MenuRole::class, 'showAccessPage'])->name('access.page')->middleware('auth');
Route::post('menu/access',     [MenuRole::class, 'updateAccessChild'])->name('update.accesschild')->middleware('auth');


Route::get('account/setting',       [AccountController::class, 'showAcountPage'])->name('account.page')->middleware('auth');
Route::put('account/setting',       [AccountController::class, 'updateProfile'])->name('account.update')->middleware('auth');


Route::get('register',              [RegisterController::class, 'showRegisPage'])->name('regis.page');
Route::post('register.username',    [RegisterController::class, 'checkUsername'])->name('register.username');
Route::post('register.email',       [RegisterController::class, 'checkEmail'])->name('register.email');
Route::post('register',             [RegisterController::class, 'registerUser'])->name('register.action');

Route::get('/verify-email',         [VerificationController::class, 'verifyEmail'])->name('verification.verify');

