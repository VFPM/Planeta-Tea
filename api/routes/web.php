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

Route::get('/', function () {
    return view('welcome');
});

    // Main Info
    Route::get('sistema/main-info', 'App\Http\Controllers\MainInfoController@dataindex')->name('materias.data');
    Route::post('sistema/main-info/store', 'App\Http\Controllers\MainInfoController@store')->name('materias.store');
    Route::put('sistema/main-info/{id}/update', 'App\Http\Controllers\MainInfoController@update')->name('materias.update');
    Route::delete('sistema/main-info/{id}/destroy', 'App\Http\Controllers\MainInfoController@destroy')->name('materias.destroy');