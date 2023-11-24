<?php

use App\Http\Controllers\api\AdController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CityController;
use App\Http\Controllers\api\settingcontroller;
use App\Http\Controllers\api\DistrictController;
use App\Http\Controllers\api\MassageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller( AuthController::class)->group(function(){
    Route::post('/rejuster', 'reguster');
    Route::post('/login', 'login');

});
Route::get('/settings', settingcontroller::class);
Route::get('/city', CityController::class);
Route::get('/district', DistrictController::class);
Route::post('/massage', MassageController::class);


Route::prefix('/ads')->controller(AdController::class)->group(
    function (){
        Route::get('/','index');
        Route::get('/latest', 'latest');
        Route::get('/search', 'search');



        Route::middleware('auth:sanctum')->group(function () {
            Route::post('/create', 'create');
            // Route::post('update/{adId}', 'update');
            // Route::get('delete/{adId}', 'delete');
            // Route::get('myads', 'myads');
        });




    }
);





