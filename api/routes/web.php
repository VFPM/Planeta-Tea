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
    Route::get('sistema/information', 'App\Http\Controllers\InformationController@dataindex')->name('information.data');
    Route::post('sistema/information/store', 'App\Http\Controllers\InformationController@store')->name('information.store');
    Route::put('sistema/information/{id}/update', 'App\Http\Controllers\InformationController@update')->name('information.update');
    Route::delete('sistema/information/{id}/destroy', 'App\Http\Controllers\InformationController@destroy')->name('information.destroy');

    // Events
    Route::get('sistema/event', 'App\Http\Controllers\EventController@dataindex')->name('event.data');
    Route::post('sistema/event/store', 'App\Http\Controllers\EventController@store')->name('event.store');
    Route::put('sistema/event/{id}/update', 'App\Http\Controllers\EventController@update')->name('event.update');
    Route::delete('sistema/event/{id}/destroy', 'App\Http\Controllers\EventController@destroy')->name('event.destroy');

    // Tests 
    Route::get('sistema/test', 'App\Http\Controllers\TestController@dataindex')->name('test.data');
    Route::post('sistema/test/store', 'App\Http\Controllers\TestController@store')->name('test.store');
    Route::put('sistema/test/{id}/update', 'App\Http\Controllers\TestController@update')->name('test.update');
    Route::delete('sistema/test/{id}/destroy', 'App\Http\Controllers\TestController@destroy')->name('test.destroy');

    // Users
    Route::get('sistema/user', 'App\Http\Controllers\UserController@dataindex')->name('user.data');
    Route::post('sistema/user/store', 'App\Http\Controllers\UserController@store')->name('user.store');
    Route::put('sistema/user/{id}/update', 'App\Http\Controllers\UserController@update')->name('user.update');
    Route::delete('sistema/user/{id}/destroy', 'App\Http\Controllers\UserController@destroy')->name('user.destroy');

    // Questions
    Route::get('sistema/question', 'App\Http\Controllers\QuestionController@dataindex')->name('question.data');
    Route::post('sistema/question/store', 'App\Http\Controllers\QuestionController@store')->name('question.store');
    Route::put('sistema/question/{id}/update', 'App\Http\Controllers\QuestionController@update')->name('question.update');
    Route::delete('sistema/question/{id}/destroy', 'App\Http\Controllers\QuestionController@destroy')->name('question.destroy');