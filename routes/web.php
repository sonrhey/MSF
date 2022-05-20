<?php

use App\Http\Controllers\APIAuthController;
use App\Http\Controllers\APIRegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MotorcycleTypeContoller;
use App\Http\Controllers\ProductAreaContoller;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\StoreRegistrationContoller;
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
	return redirect('login');
});

Route::resource('login', APIAuthController::class);
Route::resource('register', APIRegisterController::class);

Route::resource('dashboard', DashboardController::class);
Route::resource('store-registration', StoreRegistrationContoller::class);
Route::resource('product-area', ProductAreaContoller::class);
Route::resource('motorcycle-type', MotorcycleTypeContoller::class);

Route::get('sales', [SalesController::class, 'index']);
