<?php

use Illuminate\Support\Facades\Route;

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

route::get("/",[\App\Http\Controllers\CriptomonedaController::class,'index']);
route::get("/crear",[\App\Http\Controllers\CriptomonedaController::class,'create']);
route::get("/editar/{id}",[\App\Http\Controllers\CriptomonedaController::class,'edit']);
route::delete("/delete/{id}",[\App\Http\Controllers\CriptomonedaController::class,'destroy'])->name('destroy');
route::post("/save",[\App\Http\Controllers\CriptomonedaController::class,'store']);


//Route::get('/', function () {
//    return view('index');
//});
