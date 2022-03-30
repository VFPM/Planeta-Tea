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
    Route::get('sistema/main-info', 'App\Http\Controllers\MainInfoController@dataindex')->name('main-info.data');
    Route::post('sistema/main-info/store', 'App\Http\Controllers\MainInfoController@store')->name('main-info.store');
    Route::put('sistema/main-info/{id}/update', 'App\Http\Controllers\MainInfoController@update')->name('main-info.update');
    Route::delete('sistema/main-info/{id}/destroy', 'App\Http\Controllers\MainInfoController@destroy')->name('main-info.destroy');

    // Contact
    Route::get('sistema/contact', 'App\Http\Controllers\ContactController@dataindex')->name('contact.data');
    Route::post('sistema/contact/store', 'App\Http\Controllers\ContactController@store')->name('contact.store');
    Route::put('sistema/contact/{id}/update', 'App\Http\Controllers\ContactController@update')->name('contact.update');
    Route::delete('sistema/contact/{id}/destroy', 'App\Http\Controllers\ContactController@destroy')->name('contact.destroy');

    // Information
    //Route::get('sistema/main-info', 'App\Http\Controllers\MainInfoController@dataindex')->name('main-info.data');
    //Route::post('sistema/main-info/store', 'App\Http\Controllers\MainInfoController@store')->name('main-info.store');
    //Route::put('sistema/main-info/{id}/update', 'App\Http\Controllers\MainInfoController@update')->name('main-info.update');
    //Route::delete('sistema/main-info/{id}/destroy', 'App\Http\Controllers\MainInfoController@destroy')->name('main-info.destroy');