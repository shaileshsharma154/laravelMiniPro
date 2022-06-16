<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DummyAPIController;
use App\Http\Controllers\CustomerController;

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

Route::get("/getAPI", [DummyAPIController::Class, "myFirstAPI"]);
Route::get("/getCustAPI",[CustomerController::Class, "ViewAPIData"]);

Route::POST("/addAPIData", [CustomerController::class, "addAPIData"]);
Route::post("/updateAPIData", [CustomerController::class, "updateAPIData"]);
Route::delete('/deleteData/{id}',[CustomerController::class,"deleteAPIData"]);
//Route::get('/search/{search}',[CustomerController::class, 'searchAPIData']);
Route::get('/search/{search}',[CustomerController::class, 'searchAPIData1']);
