<?php


use App\Http\Controllers\ApiControllers\DBController;
use App\Http\Controllers\ApiControllers\UploadImagesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiControllers\ApiServceController;
use App\Http\Controllers\ApiControllers\ChangePasswordController;
use App\Http\Controllers\ApiControllers\GenratePdfController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function(){

});


Route::post("/database/GetResults",[DBController::class,'GetResults']);
Route::post("/database/insert",[DBController::class,'insert']);
Route::post("/database/update",[DBController::class,'update']);
Route::post("/upload-images",[UploadImagesController::class,'insert']);

Route::post('/login',[App\Http\Controllers\ApiControllers\LoginController::class,"login"]);
Route::get('/get-all-service-no/{po_no}',[ApiServceController::class,'getAll']);
Route::get('/genrate-purchase-no-pdf/{po_no}',[GenratePdfController::class,'index']);

Route::post('/change-password',[ChangePasswordController::class,'newPassword']);