<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\PaymentController;
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
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('page/{slug}', [HomeController::class, 'page'])->name('page');
Route::get('faq', [HomeController::class, 'faq'])->name('faq');
Route::get('contacts', [HomeController::class, 'contacts'])->name('contacts');
Route::get('blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('blogs/{slug}', [BlogController::class, 'show'])->name('blog.show');

require __DIR__.'/admin.php';
