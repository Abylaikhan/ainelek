<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AdvantageController;
use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\HomeController as AdminController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\StaffController;
use Illuminate\Support\Facades\Route;

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

// Authentication Routes...
Route::get('administrator/login', [AuthController::class, 'showLoginForm'])->name('administrator.login');
Route::post('administrator/login', [AuthController::class, 'login']);
Route::post('administrator/logout', [AuthController::class, 'logout'])->name('administrator.logout');

Route::prefix('/administrator')->name('admin.')->middleware('auth')->group(function () {
    Route::get('', [AdminController::class, 'index'])->name('index');

    Route::prefix('/account')->name('account.')->group(function () {
        Route::get('/', [AccountController::class, 'index'])->name('index');
        Route::put('/update', [AccountController::class, 'update'])->name('update');
    });

    Route::resource('sliders', SliderController::class);
    Route::resource('staff', StaffController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('pages', PageController::class);
    Route::resource('advantages', AdvantageController::class);
    Route::resource('galleries', GalleryController::class);
    Route::resource('blogs', BlogController::class);
    Route::post('ajax/reorder', [AjaxController::class, 'reorder'])->name('ajax.reorder');
    Route::post('ajax/delete-file', [AjaxController::class, 'deleteFile'])->name('ajax.delete-file');
    Route::post('features/search', [ServiceController::class, 'search'])->name('features.search');

});
