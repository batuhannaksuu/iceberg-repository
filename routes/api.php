<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use \App\Http\Controllers\OfficeController;
use App\Http\Controllers\AppointmentController;
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

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::middleware(['api'])->group(function (){

    Route::post('/register',[AuthController::class,'register']);
    Route::post('/login',[AuthController::class,'login']);

    Route::post('/contact',[ContactController::class,'create']);
    Route::get('/offices',[OfficeController::class,'getOffice']);

    Route::middleware('auth:api')->group(function (){
        Route::get('/logout',[AuthController::class,'logout']);
        Route::get('/lists/{orderBy?}',[AppointmentController::class,'lists']);
        Route::get('/listbydate/{startDate}/{endDate}',[AppointmentController::class,'listByDate']);
        Route::post('/update/{id}',[AppointmentController::class,'updateAppointment']);
        Route::get('/delete/{id}',[AppointmentController::class,'deleteAppointment']);
    });



});





