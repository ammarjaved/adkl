<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FilterMapController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PrintServiceController;
use App\Http\Controllers\PurchaseOrder;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\VendorController;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\FilterMapper;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    Route::get('/get-purchase-order-by-vendor-d/{id}',[VendorController::class,'getPoByVendor']);
    Route::get('/get-serive-number-by-purchase-order/{id}',[PurchaseOrder::class,'getSnByPo']);
    Route::get('/get-geom-by-purchase-order/{id}',[MapController::class,'getMapByPo']);
    Route::get('/print-vendor-detail/{id}',[PrintServiceController::class,'index']);
    Route::resource('service-no',ServiceController::class);
    Route::get('/get-ba-by-vendor/{id}',[DashboardController::class,'getBA']);
    Route::get('/get-vendor-by-vendor/{vendor}/{ba}',[DashboardController::class,'getData']);
    Route::get('/get-all-service-no/{po_no}',[ServiceController::class,'getAll']);
    Route::get('/map-filter',[FilterMapController::class,'show']);
    Route::get('/get-purchase-order-by-vendor/{id}',[FilterMapController::class,'getPo']);
    Route::get('/get-sn-by-po/{sn}',[FilterMapController::class,'getSn']);
   
    // Route::get('/get-map-point-by-po-number/{po}',[MapController::class,'getByPo']);
});
 Route::get('/pdf-test',[PrintServiceController::class,'test']);
// Route::group(['prefix' => '/'], function () {
//     Route::get('', [RoutingController::class, 'index'])->name('root');
//     Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
//     Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
//     Route::get('{any}', [RoutingController::class, 'root'])->name('any');
// });
