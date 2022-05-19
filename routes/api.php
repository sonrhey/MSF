<?php

use App\Http\Controllers\APIAuthController;
use App\Http\Controllers\APIRegisterController;
use App\Http\Controllers\MotorcycleTypeContoller;
use App\Http\Controllers\ProductAreaContoller;
use App\Http\Controllers\StoreRegistrationContoller;
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

Route::post('login/store', [APIAuthController::class, 'store']);
Route::post('register/store', [APIRegisterController::class, 'store']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('login/logout', [APIAuthController::class, 'logout']);
    Route::post('store-registration/store', [StoreRegistrationContoller::class, 'store']);
    Route::get('store-registration/get-my-stores', [StoreRegistrationContoller::class, 'get_my_stores']);
    Route::post('motorcycle-type/store', [MotorcycleTypeContoller::class, 'store']);
    Route::post('product-area/store', [ProductAreaContoller::class, 'store']);
});

Route::post('product-area/search-item', [ProductAreaContoller::class, 'search_item']);
