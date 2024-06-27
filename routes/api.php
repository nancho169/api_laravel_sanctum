<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post("register",[AuthController::class,"register"]);
Route::post("login",[AuthController::class,"login"]);
/*Route::get('', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/
