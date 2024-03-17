<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryJasaController;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

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






// Auth
Route::middleware(['guest'])->group(function(){
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'loginStore'])->name('login.store');
 
});

Route::middleware(['auth', 'admin'])->prefix('dashboard')->group(function(){
    Route::get('', DashboardController::class)->name('dashboard');
    Route::resource('produk', ProductController::class);
    Route::resource('jasa', JasaController::class);
    Route::get('gallery/jasa',[GalleryJasaController::class, 'index'])->name('gallery.index');
    Route::post('gallery/jasa',[GalleryJasaController::class, 'galleryStore'])->name('gallery.store');
    Route::resource('transaksi', TransactionController::class);
    Route::post('transaksi/{id}', [TransactionController::class, 'changeStatus'])->name('transaction.change-status');

    // * Auth
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});