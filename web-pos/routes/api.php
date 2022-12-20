<?php
use App\Http\Controllers\ApiProductController;
use App\Http\Controllers\ApiUsersController;
use App\Http\Controllers\ApiAuthController;

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

Route::post('/login', [\App\Http\Controllers\ApiAuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\ApiAuthController::class, 'logout']);
});

Route::apiResources([
    '/product'=>ApiProductController::class,
    '/user'=>ApiUsersController::class
]);
