<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransaksiController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function() {
    Route::get('register', [RegisterController::class, 'register'])->name('register.create');
    Route::post('register/create', [RegisterController::class, 'store'])->name('register.store');
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('logout', LogoutController::class)->name('logout');
    Route::get('paket', [PaketController::class, 'index'])->name('paket.index');
    Route::get('paket/create', [PaketController::class, 'create'])->name('paket.create');
    Route::post('paket/create', [PaketController::class, 'store'])->name('paket.store');
    Route::get('paket/{paket:slug}/edit', [PaketController::class, 'edit'])->name('paket.edit');
    Route::put('paket/{paket:slug}/', [PaketController::class, 'update'])->name('paket.update');
    Route::get('paket/{paket:slug}/delete', [PaketController::class, 'destroy'])->name('paket.destroy');

    Route::get('outlet', [OutletController::class, 'index'])->name('outlet.index');
    Route::get('outlet/create', [OutletController::class, 'create'])->name('outlet.create');
    Route::post('outlet/create', [OutletController::class, 'store'])->name('outlet.store');
    Route::get('outlet/{outlet:slug}/edit', [OutletController::class, 'edit'])->name('outlet.edit');
    Route::put('outlet/{outlet:slug}', [OutletController::class, 'update'])->name('outlet.update');
    Route::get('outlet/{outlet:slug}/delete', [OutletController::class, 'destroy'])->name('outlet.destroy');

    Route::get('customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('customer/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('customer/create', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('customer/{customer:slug}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('customer/{customer:slug}', [CustomerController::class, 'update'])->name('customer.update');
    Route::get('customer{customer:slug}/delete', [CustomerController::class, 'destroy'])->name('customer.destroy');

    Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('transaksi/create', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('transaksi/history', [TransaksiController::class, 'history'])->name('transaksi.history');
    Route::get('transaksi/{status}/source', [TransaksiController::class, 'source'])->name('transaksi.source');
    Route::get('transaksi/{transaksi:slug}/print', [TransaksiController::class, 'print'])->name('transaksi.print');
});

Route::get('dashboard', DashboardController::class)->name('dashboard');
