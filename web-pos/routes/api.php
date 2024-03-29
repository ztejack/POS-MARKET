<?php
use App\Http\Controllers\ApiProductController;
use App\Http\Controllers\ApiUsersController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiTransaksiController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->group(function () {
    Route::post('/login', [\App\Http\Controllers\ApiAuthController::class, 'login']);
});

Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\ApiAuthController::class, 'logout']);
    // Route::get('/user',function (Request $request) {return $request->user();});
    // Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    //     return $request->user();
    // });
    Route::get('product', [ApiProductController::class, 'index'])->name('products.index');
    Route::post('product/search', [ApiProductController::class, 'search'])->name('products.search');
    Route::post('users/search', [ApiUsersController::class, 'search'])->name('users.search');
    Route::get('users', [ApiUsersController::class, 'index'])->name('user.index');
    Route::get('transaksi/id', [ApiTransaksiController::class, 'id'])->name('transaksi.id');
    Route::post('product/search/kode', [ApiProductController::class, 'searchkode'])->name('products.searchkode');
    Route::post('users/search/id', [ApiUsersController::class, 'searchid'])->name('users.searchid');


    // Route::post('product', [ApiProductController::class, 'store'])->name('products.store');
    // Route::put('product/{product}', [ApiProductController::class, 'update'])->name('products.update');
    // Route::delete('product/{product}', [ApiProductController::class, 'destroy'])->name('products.destroy');
    // Route::apiResources([

    //     '/usersall'=>ApiUsersController::class,
    //     // '/product'=>ApiProductController::class,]);
});


// Route::get('transaksi/id',[ApiTransaksiController::class, 'index'])->name('transaksi.id');



