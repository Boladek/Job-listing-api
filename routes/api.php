<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusinessesController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\GuestsController;

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

Route::apiResource('/businesses', BusinessesController::class);

Route::apiResource('/jobs', JobsController::class);

Route::post('/business', [BusinessesController::class, 'store']);
Route::post('/business-login', [BusinessesController::class, 'login']);

Route::get('/guests', [GuestsController::class, 'index']);
Route::get('/guests/{guest}', [GuestsController::class, 'show']);

// Route::apiResource('/guests', GuestsController::class);
