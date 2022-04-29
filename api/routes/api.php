<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('App\Http\Controllers')->name('api.')->group(function () {
    // Auth
    Route::get('login', 'AuthController@login')->name('auth.login');
    Route::post('user/store', 'UserController@store')->name('user.store');

    // Main Info
    Route::get('main-info', 'MainInfoController@dataindex')->name('main-info.data');
    Route::post('main-info/store', 'MainInfoController@store')->name('main-info.store');
    Route::put('main-info/{id}/update', 'MainInfoController@update')->name('main-info.update');
    Route::delete('main-info/{id}/destroy', 'MainInfoController@destroy')->name('main-info.destroy');

    // Contact
    Route::get('contact', 'ContactController@dataindex')->name('contact.data');
    Route::post('contact/store', 'ContactController@store')->name('contact.store');
    Route::put('contact/{id}/update', 'ContactController@update')->name('contact.update');
    Route::delete('contact/{id}/destroy', 'ContactController@destroy')->name('contact.destroy');

    // Information
    Route::get('information', 'InformationController@dataindex')->name('information.data');
    Route::post('information/store', 'InformationController@store')->name('information.store');
    Route::put('information/{id}/update', 'InformationController@update')->name('information.update');
    Route::delete('information/{id}/destroy', 'InformationController@destroy')->name('information.destroy');

    // Events
    Route::get('event', 'EventController@dataindex')->name('event.data');
    Route::post('event/store', 'EventController@store')->name('event.store');
    Route::put('event/{id}/update', 'EventController@update')->name('event.update');
    Route::delete('event/{id}/destroy', 'EventController@destroy')->name('event.destroy');

    // Tests 
    Route::get('test', 'TestController@dataindex')->name('test.data');
    Route::post('test/store', 'TestController@store')->name('test.store');
    Route::put('test/{id}/update', 'TestController@update')->name('test.update');
    Route::delete('test/{id}/destroy', 'TestController@destroy')->name('test.destroy');

    // Users
    //Route::get('sistema/user', 'UserController@dataindex')->name('user.data');
    //Route::post('sistema/user/store', 'UserController@store')->name('user.store');
    //Route::put('sistema/user/{id}/update', 'UserController@update')->name('user.update');
    //Route::delete('sistema/user/{id}/destroy', 'UserController@destroy')->name('user.destroy');

    // Questions
    Route::get('test/{test}/question', 'App\Http\Controllers\QuestionController@index')->name('question.index');
    Route::get('test/{test}/question/data/{test}', 'App\Http\Controllers\QuestionController@dataindex')->name('question.data');
    Route::get('test/{test}/question/create', 'App\Http\Controllers\QuestionController@create')->name('question.create');
    Route::post('test/{test}/question/store', 'App\Http\Controllers\QuestionController@store')->name('question.store');
    Route::put('test/{test}/question/{id}/update', 'App\Http\Controllers\QuestionController@update')->name('question.update');
    Route::delete('test/{test}/question/{id}/destroy', 'App\Http\Controllers\QuestionController@destroy')->name('question.destroy');
});
