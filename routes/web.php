<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\BusinessesController;

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

Route::resource('/jobs', JobsController::class);
Route::resource('/businesses', BusinessesController::class);

Route::get('/businesses/login', function () {
    return view('businesses.login');
});
