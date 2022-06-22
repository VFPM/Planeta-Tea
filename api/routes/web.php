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

    //VerifyUser
    Route::get('sistema/verifyuser', 'App\Http\Controllers\VerifyUserController@index')->name('verifyUser.index');
    
    //Route::get('/','App\Http\Controllers\Front\HomeController@index')->name('login');
    //Route::get('register','App\Http\Controllers\Front\HomeController@register')->name('register');

    Route::group(['middleware' => ['auth:web','auth','user.validation']], function () {
        
        // Main Info
        Route::get('sistema/main-info', 'App\Http\Controllers\MainInfoController@index')->name('main-info.index');
        Route::get('sistema/main-info/data', 'App\Http\Controllers\MainInfoController@dataindex')->name('main-info.data');
        
        //Route::get('sistema/main-info/create', 'App\Http\Controllers\MainInfoController@create')->name('main-info.create');
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

        // Events <- BORRAR
        Route::get('sistema/event', 'App\Http\Controllers\EventController@index')->name('event.index');
        Route::get('sistema/event/data', 'App\Http\Controllers\EventController@dataindex')->name('event.data');
        Route::get('sistema/event/create', 'App\Http\Controllers\EventController@create')->name('event.create');
        Route::post('sistema/event/store', 'App\Http\Controllers\EventController@store')->name('event.store');
        Route::get('sistema/event/{id}/edit', 'App\Http\Controllers\EventController@edit')->name('event.edit');
        Route::patch('sistema/event/{id}/update', 'App\Http\Controllers\EventController@update')->name('event.update');
        Route::delete('sistema/event/{id}/destroy', 'App\Http\Controllers\EventController@destroy')->name('event.destroy');

        // News
        Route::get('sistema/news', 'App\Http\Controllers\NewsController@index')->name('news.index');
        Route::get('sistema/news/data', 'App\Http\Controllers\NewsController@dataindex')->name('news.data');
        Route::get('sistema/news/create', 'App\Http\Controllers\NewsController@create')->name('news.create');
        Route::post('sistema/news/store', 'App\Http\Controllers\NewsController@store')->name('news.store');
        Route::get('sistema/news/{id}/edit', 'App\Http\Controllers\NewsController@edit')->name('news.edit');
        Route::patch('sistema/news/{id}/update', 'App\Http\Controllers\NewsController@update')->name('news.update');
        Route::delete('sistema/news/{id}/destroy', 'App\Http\Controllers\NewsController@destroy')->name('news.destroy');

        //Mode
        Route::get('sistema/mode', 'App\Http\Controllers\ModeController@index')->name('mode.index');
        Route::patch('sistema/mode/{id}/update', 'App\Http\Controllers\ModeController@update')->name('mode.update');
        Route::post('sistema/mode/store', 'App\Http\Controllers\ModeController@store')->name('mode.store');

        //Plataform
        Route::get('sistema/plataform', 'App\Http\Controllers\PlatformController@index')->name('plataform.index');
        Route::patch('sistema/plataform/{id}/update', 'App\Http\Controllers\PlatformController@update')->name('plataform.update');
        Route::post('sistema/plataform/store', 'App\Http\Controllers\PlatformController@store')->name('plataform.store');

        //Type Noticia
        Route::get('sistema/news-type', 'App\Http\Controllers\NewsTypeController@index')->name('newstype.index');
        Route::patch('sistema/news-type/{id}/update', 'App\Http\Controllers\NewsTypeController@update')->name('newstype.update');
        Route::post('sistema/news-type/store', 'App\Http\Controllers\NewsTypeController@store')->name('newstype.store');



        // Tests 
        Route::get('sistema/test', 'App\Http\Controllers\TestController@index')->name('test.index');
        Route::get('sistema/test/create', 'App\Http\Controllers\TestController@create')->name('test.create');
        Route::get('sistema/test/data', 'App\Http\Controllers\TestController@dataindex')->name('test.data');
        Route::get('sistema/test/dataMovil', 'App\Http\Controllers\TestController@dataindexMovil')->name('test.dataMovil');
        Route::post('sistema/test/store', 'App\Http\Controllers\TestController@store')->name('test.store');
        Route::put('sistema/test/{id}/update', 'App\Http\Controllers\TestController@update')->name('test.update');
        Route::get('sistema/test/{id}/edit', 'App\Http\Controllers\TestController@edit')->name('test.edit');
        Route::delete('sistema/test/{id}/destroy', 'App\Http\Controllers\TestController@destroy')->name('test.destroy');
        Route::get('sistema/test/{id}/active', 'App\Http\Controllers\TestController@testActive')->name('test.active');


        // Test Contact
        Route::get('sistema/testcontact', 'App\Http\Controllers\TestContactController@index')->name('testcontact.index');
        Route::delete('sistema/testcontact/{id}/destroy', 'App\Http\Controllers\TestContactController@destroy')->name('testcontact.destroy');


        // Users
        //Route::get('sistema/user', 'App\Http\Controllers\UserController@dataindex')->name('user.data');
        //Route::post('sistema/user/store', 'App\Http\Controllers\UserController@store')->name('user.store');
        //Route::put('sistema/user/{id}/update', 'App\Http\Controllers\UserController@update')->name('user.update');
        //Route::delete('sistema/user/{id}/destroy', 'App\Http\Controllers\UserController@destroy')->name('user.destroy');

        // Questions
        Route::get('sistema/test/{test}/questions', 'App\Http\Controllers\QuestionController@index')->name('question.index');
        Route::get('sistema/test/{test}/questions/data', 'App\Http\Controllers\QuestionController@dataindex')->name('question.data');
        Route::get('sistema/test/{test}/questions/create', 'App\Http\Controllers\QuestionController@create')->name('question.create');
        Route::post('sistema/test/questions/store', 'App\Http\Controllers\QuestionController@store')->name('question.store');
        Route::get('sistema/test/questions/{question}/edit', 'App\Http\Controllers\QuestionController@edit')->name('question.edit');
        Route::put('sistema/test/questions/{question}/update', 'App\Http\Controllers\QuestionController@update')->name('question.update');
        Route::delete('sistema/test/questions/{question}/destroy', 'App\Http\Controllers\QuestionController@destroy')->name('question.destroy');
        // Route::delete('sistema/test/{test}/question/{id}/destroy', 'App\Http\Controllers\QuestionController@destroy')->name('question.destroy');

        //Responses
        Route::get('sistema/test/response', 'App\Http\Controllers\ResponseController@index')->name('response.index');


        // Form Contact - Obtener lista de todos los registros del formulario
        Route::get('sistema/form-contact/data', 'App\Http\Controllers\FormContactController@dataindex')->name('form-contact.data');

        // Donate
        Route::get('sistema/donate', 'App\Http\Controllers\DonateController@index')->name('donate.index');
        Route::get('sistema/donate/data', 'App\Http\Controllers\DonateController@dataindex')->name('donate.data');
        Route::post('sistema/donate/store', 'App\Http\Controllers\DonateController@store')->name('donate.store');

        Route::get('sistema/responses',  'App\Http\Controllers\AnswerController@index')->name('responses.index');
        Route::get('sistema/responses/data', 'App\Http\Controllers\AnswerController@data')->name('responses.data');
        Route::get('sistema/responses-answers/data/{id}', 'App\Http\Controllers\AnswerController@dataAnswers')->name('responses-answers.data');

        // Admin
        Route::get('sistema/admin', 'App\Http\Controllers\AdminController@index')->name('admin.index');
        Route::get('sistema/admin/data', 'App\Http\Controllers\AdminController@dataindex')->name('admin.data');
        Route::patch('sistema/admin/activar/{id}', 'App\Http\Controllers\AdminController@activarUsuario')->name('admin.activar');
        Route::patch('sistema/admin/desactivar/{id}', 'App\Http\Controllers\AdminController@desactivarUsuario')->name('admin.desactivar');

        

    });
