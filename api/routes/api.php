<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|

    |-----------------------|
    |       ENDPOINTS       |
    |-----------------------|

    // ---------- HOME ---------- // 
    Modelo: Home
    Verbo: GET
    URL: https://frosty-bassi.143-198-181-247.plesk.page/api/home 
    {"id":1,
    "body":"asd",
    "values":"asd","services":"asd","deleted_at":null,"created_at":null,"updated_at":null}


    // ---------- CONTACTO ---------- // 
    Modelo: Contacto
    Verbo: GET
    URL: https://frosty-bassi.143-198-181-247.plesk.page/api/contact

    Objeto (Formato json)
   {"id":1,
    "phone":"12345678",
    "email":"correo@hotmail.com",
    "address":"Dom",
    "facebook":"facebook.com",
    "twitter":"twitter.com",
    "instagram":"instagram.com",
    "deleted_at":null,
    "created_at":"2022-05-04T15:16:15.000000Z",
    "updated_at":"2022-05-04T15:16:15.000000Z"}

    Header: 

    // ---------- INFORMACIÓN ---------- // 
    Modelo: Información
    Verbo: GET
    URL: https://frosty-bassi.143-198-181-247.plesk.page/api/information
    
    Objeto (Formato json)
    {
    "id": 1,
    "title": "My Title",
    "pdf": "information/uuid1.pdf",
    "deleted_at": null,
    "created_at": "2022-05-04T15:17:49.000000Z",
    "updated_at": "2022-05-04T15:17:49.000000Z"
    },
    {
        "id": 2,
        "title": "Another Title",
        "pdf": "information/uuid2.pdf",
        "deleted_at": null,
        "created_at": "2022-05-04T15:42:04.000000Z",
        "updated_at": "2022-05-04T15:42:04.000000Z"
    }

    Header: 

    // ---------- INFORMACIÓN ---------- // 

*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('App\Http\Controllers')->name('api.')->group(function () {
    // Auth
    Route::get('login', 'AuthController@login')->name('auth.login');
    Route::post('user/store', 'UserController@store')->name('user.store');

    // Home
    Route::get('home', 'MainInfoController@mobileDataIndex')->name('home.data');

    // Contact
    Route::get('contact', 'ContactController@mobileDataIndex')->name('contact.data');

    // Information
    Route::get('information', 'InformationController@mobileDataIndex')->name('information.data');

    // Events
    Route::get('event', 'EventController@dataindex')->name('event.data');
    Route::post('event/store', 'EventController@store')->name('event.store');
    Route::put('event/{id}/update', 'EventController@update')->name('event.update');
    Route::delete('event/{id}/destroy', 'EventController@destroy')->name('event.destroy');

    // Tests 
    // Route::get('test', 'TestController@dataindex')->name('test.data');
    // Route::post('test/store', 'TestController@store')->name('test.store');
    // Route::put('test/{id}/update', 'TestController@update')->name('test.update');
    // Route::delete('test/{id}/destroy', 'TestController@destroy')->name('test.destroy');

    // Users
    //Route::get('sistema/user', 'UserController@dataindex')->name('user.data');
    //Route::post('sistema/user/store', 'UserController@store')->name('user.store');
    //Route::put('sistema/user/{id}/update', 'UserController@update')->name('user.update');
    //Route::delete('sistema/user/{id}/destroy', 'UserController@destroy')->name('user.destroy');

    // Questions
    // Route::get('test/{test}/question', 'App\Http\Controllers\QuestionController@index')->name('question.index');
    // Route::get('test/{test}/question/data/{test}', 'App\Http\Controllers\QuestionController@dataindex')->name('question.data');
    // Route::get('test/{test}/question/create', 'App\Http\Controllers\QuestionController@create')->name('question.create');
    // Route::post('test/{test}/question/store', 'App\Http\Controllers\QuestionController@store')->name('question.store');
    // Route::put('test/{test}/question/{id}/update', 'App\Http\Controllers\QuestionController@update')->name('question.update');
    // Route::delete('test/{test}/question/{id}/destroy', 'App\Http\Controllers\QuestionController@destroy')->name('question.destroy');
});
