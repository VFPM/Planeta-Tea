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
    Route::get('sistema/login', 'AuthController@login')->name('auth.login');
    Route::post('sistema/user/store', 'UserController@store')->name('user.store');

    // Main Info
    Route::get('sistema/main-info', 'MainInfoController@dataindex')->name('main-info.data');
    Route::post('sistema/main-info/store', 'MainInfoController@store')->name('main-info.store');
    Route::put('sistema/main-info/{id}/update', 'MainInfoController@update')->name('main-info.update');
    Route::delete('sistema/main-info/{id}/destroy', 'MainInfoController@destroy')->name('main-info.destroy');

    // Contact
    Route::get('sistema/contact', 'ContactController@dataindex')->name('contact.data');
    Route::post('sistema/contact/store', 'ContactController@store')->name('contact.store');
    Route::put('sistema/contact/{id}/update', 'ContactController@update')->name('contact.update');
    Route::delete('sistema/contact/{id}/destroy', 'ContactController@destroy')->name('contact.destroy');

    // Information
    Route::get('sistema/information', 'InformationController@dataindex')->name('information.data');
    Route::post('sistema/information/store', 'InformationController@store')->name('information.store');
    Route::put('sistema/information/{id}/update', 'InformationController@update')->name('information.update');
    Route::delete('sistema/information/{id}/destroy', 'InformationController@destroy')->name('information.destroy');

    // Events
    Route::get('sistema/event', 'EventController@dataindex')->name('event.data');
    Route::post('sistema/event/store', 'EventController@store')->name('event.store');
    Route::put('sistema/event/{id}/update', 'EventController@update')->name('event.update');
    Route::delete('sistema/event/{id}/destroy', 'EventController@destroy')->name('event.destroy');

    // Tests 
    Route::get('sistema/test', 'TestController@dataindex')->name('test.data');
    Route::post('sistema/test/store', 'TestController@store')->name('test.store');
    Route::put('sistema/test/{id}/update', 'TestController@update')->name('test.update');
    Route::delete('sistema/test/{id}/destroy', 'TestController@destroy')->name('test.destroy');

    // Users
    //Route::get('sistema/user', 'UserController@dataindex')->name('user.data');
    //Route::post('sistema/user/store', 'UserController@store')->name('user.store');
    //Route::put('sistema/user/{id}/update', 'UserController@update')->name('user.update');
    //Route::delete('sistema/user/{id}/destroy', 'UserController@destroy')->name('user.destroy');

    // Questions
    Route::get('sistema/question', 'QuestionController@dataindex')->name('question.data');
    Route::post('sistema/question/store', 'QuestionController@store')->name('question.store');
    Route::put('sistema/question/{id}/update', 'QuestionController@update')->name('question.update');
    Route::delete('sistema/question/{id}/destroy', 'QuestionController@destroy')->name('question.destroy');
});
