<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ContactController;
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
Route::group(['middleware' => 'api', 'prefix' => 'users'],function (){



    Route::group(['middleware' => 'auth:api'], function (){

    });
});

Route::middleware(['api'])->group(function (){

    Route::post('/register',[AuthController::class,'register']);
    Route::post('/login',[AuthController::class,'login']);

    Route::post('/contact',[ContactController::class,'create']);

    Route::middleware('auth:api')->group(function (){
        Route::get('/profile',[UserController::class,'profile']);
        Route::get('logout',[AuthController::class,'logout']);
    });

});





