<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ApiController;
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

Route::get("login",[LinkController::class,"login"])->name("login");
Route::get("register", function(){
    return view("modul.login.register");
});
Route::post("addlogin",[ApiController::class,"login"])->name("addlogin");
Route::post("addregister",[ApiController::class,"register"])->name("addregister");

Route::group(['middleware'=>'session'],function(){
    Route::get('/',[LinkController::class,"dashboard"]);
    Route::get('/{menu}',[LinkController::class, "menu"]);
    Route::post("addimages",[ApiController::class,"add_images"])->name("addimages");
    Route::post("datatable",[ApiController::class,"datatable"])->name("datatable");
    Route::post("logout",[ApiController::class,"logout"])->name("logout");
});


