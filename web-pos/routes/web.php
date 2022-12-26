<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\SatkerController;
use App\Http\Controllers\TagihanController;
use App\Http\Middleware\UserLevel;
use Illuminate\Support\Facades\Auth;
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
    return view('pages.home');
})->middleware('auth');

Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');

//account
Route::get('account', [AccountController::class, 'index'])->name('edit')->middleware('auth');
Route::get('account/create', [AccountController::class, 'create'])->name('create')->middleware('auth');
Route::put('account/update', [AccountController::class, 'update'])->name('update')->middleware('auth');
Route::delete('account/destroy', [AccountController::class, 'destroy'])->name('destroy')->middleware('auth');
Route::post('account/action', [AccountController::class, 'action']);
// Route::get('cities/get_by_country', 'CitiesController@get_by_country')->name('admin.cities.get_by_country');
// Route::resource('account', AccountController::class)->middleware('userlevel');

Route::get('account/change-password', [ChangePasswordController::class, 'index']);
Route::post('account/change-password', [ChangePasswordController::class, 'store'])->name('change.password');

// Route::post('users', [UserController::class, 'store'])->name('users.add');
//barang
// Route::get('produks', [ProdukController::class, 'index'])->name('index')->middleware('userlevel');
// Route::resource('/produk', ProdukController::class)->middleware('userlevel');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index')->middleware('kasiradminlevel');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create')->middleware('kasiradminlevel');
Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store')->middleware('kasiradminlevel');
Route::put('/produk/update/{produk}', [ProdukController::class, 'update'])->name('produk.update')->middleware('kasiradminlevel');
Route::delete('/produk/destroy/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy')->middleware('kasiradminlevel');

// Route::get('dataBarang/add', [ProdukController::class, 'store'])->name('store')->middleware('userlevel');
//user
// Route::get('dataUser', [UserController::class, 'index'])->name('index')->middleware('userlevel');
// Route::resource('users', UserController::class)->middleware('userlevel');
Route::get('users', [UserController::class, 'index'])->name('users')->middleware('adminlevel');
Route::get('users/{user}/show', [UserController::class, 'show'])->name('users.show')->middleware('adminlevel');
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('adminlevel');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware('adminlevel');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store')->middleware('adminlevel');
Route::delete('/users/{user}/destroy', [UserController::class, 'destroy'])->name('users.destroy')->middleware('adminlevel');
Route::put('/users/{user}', [UserController::class, 'updateUS'])->name('users.update')->middleware('adminlevel');
Route::post('/users/action', [UserController::class, 'action']);


//Transaksi
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index')->middleware('auth');
Route::get('/cetak/transaksi', [TransaksiController::class, 'printpage'])->name('transaksi.print')->middleware('auth');
// Route::get('/transaksi/cetakdatatransaksi', [TransaksiController::class, 'print.transaksi'])->name('transaksi.print')->middleware('userlevel');
Route::get('/transaksi/cetakdetailtransaksi/{transaksi}', [TransaksiController::class, 'printpagedetail'])->name('transaksi.detail.print')->middleware('auth');
Route::post('/printaction', [TransaksiController::class, 'printaction']);
Route::get('/transaksi/{transaksi}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit')->middleware('kasiradminlevel');
Route::delete('/transaksi/{transaksi}/destroy', [TransaksiController::class, 'destroy'])->name('transaksi.destroy')->middleware('kasiradminlevel');

//Satker
Route::post('/satker/store', [SatkerController::class, 'store'])->name('satker.store')->middleware('userlevel');
Route::delete('/satker/{satker}/destroy', [SatkerController::class, 'destroy'])->name('satker.destroy')->middleware('userlevel');

//perusahaan
Route::post('/perusahaan/store', [PerusahaanController::class, 'store'])->name('perusahaan.store')->middleware('userlevel');
Route::get('/perusahaan/{perusahaan}/detail', [PerusahaanController::class, 'show'])->name('perusahaan.detail')->middleware('userlevel');
Route::delete('/perusahaan/{perusahaan}/destroy', [PerusahaanController::class, 'destroy'])->name('perusahaan.destroy')->middleware('userlevel');

// Tagihan
Route::get('/tagihan', [TagihanController::class, 'index'])->name('tagihan.detail')->middleware('kasiradminlevel');

/*
php artisan optimize
php artisan route:cache
php artisan view:clear
*/
