<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeControllers;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\TransaksiController;
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

Route::get('/', [HomeControllers::class, 'index'])->name('home');
Route::get('/transaksi', [HomeControllers::class, 'transaksi'])->middleware('auth')->name('transaksi');

Route::get('/dashboard', [HomeControllers::class, 'admin'])->middleware(['isAdmin', 'verified'])->name('dashboard');
Route::get('/mobil', [MobilController::class, 'index'])->middleware(['isAdmin', 'verified'])->name('mobil');
Route::get('/mobilcreate', [MobilController::class, 'create'])->middleware(['isAdmin', 'verified'])->name('mobil.create');
Route::post('/mobilstore',[MobilController::class, 'store'])->middleware(['isAdmin', 'verified'])->name('mobil.store');
Route::get('/mobiledit/{id}',[MobilController::class, 'edit'])->middleware(['isAdmin', 'verified'])->name('mobil.edit');
Route::post('/mobilupdate/{id}',[MobilController::class, 'update'])->middleware(['isAdmin', 'verified'])->name('mobil.update');
Route::post('/mobildelete/{id}',[MobilController::class, 'destroy'])->middleware(['isAdmin', 'verified'])->name('mobil.delete');
Route::get('/mobilshow/{id}',[MobilController::class, 'show'])->middleware(['isAdmin', 'verified'])->name('mobil.show');

Route::get('/tipe', [TipeController::class, 'index'])->middleware(['isAdmin', 'verified'])->name('tipe');
Route::get('/tipecreate', [TipeController::class, 'create'])->middleware(['isAdmin', 'verified'])->name('tipe.create');
Route::post('/tipestore', [TipeController::class, 'store'])->middleware(['isAdmin', 'verified'])->name('tipe.store');
Route::get('/tipeedit/{id}', [TipeController::class, 'edit'])->middleware(['isAdmin', 'verified'])->name('tipe.edit');
Route::post('/tipeupdate/{id}', [TipeController::class, 'update'])->middleware(['isAdmin', 'verified'])->name('tipe.update');

Route::get('/customer', [CustomerController::class, 'index'])->middleware(['isAdmin', 'verified'])->name('customer');
Route::get('/customeredit/{id}', [CustomerController::class, 'edit'])->middleware(['isAdmin', 'verified'])->name('customer.edit');
Route::post('/customerupdate/{id}', [CustomerController::class, 'update'])->middleware(['isAdmin', 'verified'])->name('customer.update');
Route::get('/customer/pembayaran/{id}', [HomeControllers::class, 'pembayaran'])->middleware(['isAdmin', 'verified'])->name('customer.pembayaran');
Route::post('/customer/pembayaranaksi/{id}', [HomeControllers::class, 'pembayaranaksi'])->middleware(['isAdmin', 'verified'])->name('customer.pembayaranaksi');

Route::get('/trans', [TransaksiController::class, 'index'])->middleware(['isAdmin', 'verified'])->name('trans');
Route::get('/transkonfirmasi/{id}', [TransaksiController::class, 'transkonfirmasi'])->middleware(['isAdmin', 'verified'])->name('trans.konfirmasi');
Route::get('/transdownloadbukti/{id}', [TransaksiController::class, 'transdownloadbukti'])->middleware(['isAdmin', 'verified'])->name('trans.download');
Route::post('/transterbuktibayar/{id}', [TransaksiController::class, 'transterbuktibayar'])->middleware(['isAdmin', 'verified'])->name('trans.terbuktibayar');
Route::post('/transbatal/{id}', [TransaksiController::class, 'transbatal'])->middleware(['isAdmin', 'verified'])->name('trans.batal');
Route::get('/transdone/{id}', [TransaksiController::class, 'transdone'])->middleware(['isAdmin', 'verified'])->name('trans.done');
Route::post('/transfinal/{id}', [TransaksiController::class, 'transfinal'])->middleware(['isAdmin', 'verified'])->name('trans.final');

Route::get('/booking/{id}', [HomeControllers::class, 'booking'])->middleware(['auth', 'verified'])->name('booking');
Route::post('/bookingaksi/{id}', [HomeControllers::class, 'bookingaksi'])->middleware(['auth', 'verified'])->name('bookingaksi');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
