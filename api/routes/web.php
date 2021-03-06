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

    Auth::routes();
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    //Route::get('/','App\Http\Controllers\Front\HomeController@index')->name('login');
    //Route::get('register','App\Http\Controllers\Front\HomeController@register')->name('register');

    // Main Info
    Route::get('sistema/main-info', 'App\Http\Controllers\MainInfoController@index')->name('main-info.index');
    Route::get('sistema/main-info/data', 'App\Http\Controllers\MainInfoController@dataindex')->name('main-info.data');
    Route::get('sistema/main-info/create', 'App\Http\Controllers\MainInfoController@create')->name('main-info.create');
    Route::post('sistema/main-info/store', 'App\Http\Controllers\MainInfoController@store')->name('main-info.store');
    Route::get('sistema/main-info/{id}/edit', 'App\Http\Controllers\MainInfoController@edit')->name('main-info.edit');
    Route::put('sistema/main-info/{id}/update', 'App\Http\Controllers\MainInfoController@update')->name('main-info.update');
    Route::delete('sistema/main-info/{id}/destroy', 'App\Http\Controllers\MainInfoController@destroy')->name('main-info.destroy');

    // Contact
    Route::get('sistema/contact', 'App\Http\Controllers\ContactController@index')->name('contact.index');
    Route::get('sistema/contact/data', 'App\Http\Controllers\ContactController@dataindex')->name('contact.data');
    Route::get('sistema/contact/create', 'App\Http\Controllers\ContactController@create')->name('contact.create');
    Route::post('sistema/contact/store', 'App\Http\Controllers\ContactController@store')->name('contact.store');
    Route::put('sistema/contact/{id}/update', 'App\Http\Controllers\ContactController@update')->name('contact.update');
    Route::delete('sistema/contact/{id}/destroy', 'App\Http\Controllers\ContactController@destroy')->name('contact.destroy');

    // Information
    Route::get('sistema/information', 'App\Http\Controllers\InformationController@index')->name('information.index');
    Route::get('sistema/information/data', 'App\Http\Controllers\InformationController@dataindex')->name('information.data');
    Route::get('sistema/information/create', 'App\Http\Controllers\InformationController@create')->name('information.create');
    Route::post('sistema/information/store', 'App\Http\Controllers\InformationController@store')->name('information.store');
    Route::get('sistema/information/{id}/edit', 'App\Http\Controllers\InformationController@edit')->name('information.edit');
    Route::patch('sistema/information/{id}/update', 'App\Http\Controllers\InformationController@update')->name('information.update');
    Route::delete('sistema/information/{id}/destroy', 'App\Http\Controllers\InformationController@destroy')->name('information.destroy');

    // Events
    Route::get('sistema/event', 'App\Http\Controllers\NewsController@index')->name('news.index');
    Route::get('sistema/event/data', 'App\Http\Controllers\NewsController@dataindex')->name('news.data');
    Route::get('sistema/event/create', 'App\Http\Controllers\NewsController@create')->name('news.create');
    Route::post('sistema/event/store', 'App\Http\Controllers\NewsController@store')->name('news.store');
    Route::get('sistema/event/{id}/edit', 'App\Http\Controllers\NewsController@edit')->name('news.edit');
    Route::patch('sistema/event/{id}/update', 'App\Http\Controllers\NewsController@update')->name('news.update');
    Route::delete('sistema/event/{id}/destroy', 'App\Http\Controllers\NewsController@destroy')->name('news.destroy');

    // Tests 
    Route::get('sistema/test', 'App\Http\Controllers\TestController@index')->name('test.index');
    Route::get('sistema/test/create', 'App\Http\Controllers\TestController@create')->name('test.create');
    Route::get('sistema/test/data', 'App\Http\Controllers\TestController@dataindex')->name('test.data');
    Route::get('sistema/test/dataMovil', 'App\Http\Controllers\TestController@dataindexMovil')->name('test.dataMovil');
    Route::post('sistema/test/store', 'App\Http\Controllers\TestController@store')->name('test.store');
    Route::put('sistema/test/{id}/update', 'App\Http\Controllers\TestController@update')->name('test.update');
    Route::get('sistema/test/{id}/edit', 'App\Http\Controllers\TestController@edit')->name('test.edit');
    Route::delete('sistema/test/{id}/destroy', 'App\Http\Controllers\TestController@destroy')->name('test.destroy');

    // Users
    //Route::get('sistema/user', 'App\Http\Controllers\UserController@dataindex')->name('user.data');
    //Route::post('sistema/user/store', 'App\Http\Controllers\UserController@store')->name('user.store');
    //Route::put('sistema/user/{id}/update', 'App\Http\Controllers\UserController@update')->name('user.update');
    //Route::delete('sistema/user/{id}/destroy', 'App\Http\Controllers\UserController@destroy')->name('user.destroy');

    // Questions
    Route::get('sistema/test/{test}/question', 'App\Http\Controllers\QuestionController@index')->name('question.index');
    Route::get('sistema/test/{test}/question/data/{test}', 'App\Http\Controllers\QuestionController@dataindex')->name('question.data');
    Route::get('sistema/test/{test}/question/create', 'App\Http\Controllers\QuestionController@create')->name('question.create');
    Route::post('sistema/test/{test}/question/store', 'App\Http\Controllers\QuestionController@store')->name('question.store');
    Route::put('sistema/test/{test}/question/{id}/update', 'App\Http\Controllers\QuestionController@update')->name('question.update');
    Route::delete('sistema/test/{test}/question/{id}/destroy', 'App\Http\Controllers\QuestionController@destroy')->name('question.destroy');