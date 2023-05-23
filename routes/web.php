<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PurchaseOrder;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\VendorController;


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

require __DIR__ . '/auth.php';

Route::group(['middleware' => 'auth'], function () {
    // Route::get('/', [VendorController::class, 'index']);
    Route::get('/',[DashboardController::class,'index']);
    Route::resource('vendor', VendorController::class);
    Route::resource('purchase-order',PurchaseOrder::class);
    Route::get('/get-map-point-by-sn-number/{id}',[MapController::class,'show']);
    Route::get('/get-geom-by-vendor-no/{id}',[MapController::class,'showByVendor']);
    Route::get('/get-geom',[MapController::class,'index']);
    Route::get('/get-purchase-order-by-vendor/{id}',[VendorController::class,'getPoByVendor']);
    Route::get('/get-serive-number-by-purchase-order/{id}',[PurchaseOrder::class,'getSnByPo']);
    Route::get('/get-geom-by-purchase-order/{id}',[MapController::class,'getMapByPo']);

});

// Route::group(['prefix' => '/'], function () {
//     Route::get('', [RoutingController::class, 'index'])->name('root');
//     Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
//     Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
//     Route::get('{any}', [RoutingController::class, 'root'])->name('any');
// });
