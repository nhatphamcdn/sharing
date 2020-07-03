<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Api\Auth\LoginController;
use Api\Auth\RegisterController;
use Api\Auth\LogoutController;

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

Route::post('/login', LoginController::class);
Route::post('/register', RegisterController::class);

Route::middleware('auth:sanctum')->group(function() {
    Route::post('/logout', LogoutController::class);
    //
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
