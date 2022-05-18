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
    "body":"<p>La información de mi pantalla Home.&nbsp;</p>",
    "values":"  <ul>
                <li>Valor 1</li>
                <li>Valor 2</li>
                <li>Valor 3</li>
                </ul>",
    "services":"<ul>
                <li>Servicio 1</li>
                <li>Servicio 2</li>
                <li>Servicio 3</li>
                </ul>",
    "deleted_at":null,
    "created_at":"2022-05-05 21:14:47",
    "updated_at":"2022-05-05 21:14:47"}


    // ---------- CONTACTO ---------- // 
    Modelo: Contacto
    Verbo: GET
    URL: https://frosty-bassi.143-198-181-247.plesk.page/api/contact

    Objeto (Formato json)
   {"id":1,
    "phone":"12345678",
    "email":"correo@hotmail.com",
    "address":"Domicilio #123",
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

    // News
    Route::get('news', 'NewsController@mobileDataIndex')->name('news.data');

    // Tests
    Route::get('tests', 'TestController@mobileDataIndex')->name('tests.data');

    // Test Contact 
    Route::post('test-contact/store', 'TestContactController@store')->name('test-contact.store');

    // Test Answer
    Route::post('test-answer/store', 'TestAnswerController@store')->name('test-answer.store');
});
