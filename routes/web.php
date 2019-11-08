<?php

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
    return view('home');
});

Route::get('conversation/{slug}', [

    'uses' => 'ConversationController@show',
    'as' => 'conversation'
]);

Route::get('medium/{slug}', [

    'uses' => 'PlatFormController@medium',
    'as' => 'medium'
]);


Auth::routes();

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

// 'HomeController@index')->name('platforms');


Route::group(['middleware' => 'auth'], function () {

    Route::resource('medium', 'MediumController');


    Route::get('conversation/create', [

        'uses' => 'ConversationController@create',
        'as' => 'conversations.create'
    ]);


    Route::get('/converse', function () {

        return view('/converse');
    });



    Route::get('/platforms', [

        'uses' => 'PlatFormController@index',
        'as' => 'platforms'
    ]);



    Route::post('conversation/store', [

        'uses' => 'ConversationController@store',
        'as' => 'conversations.store'
    ]);

    Route::post('/conversation/response/{id}', [

        'uses' => 'ConversationController@response',
        'as' => 'conversation.response'
    ]);


    Route::get('/response/like/{id}', [

        'uses' => 'ResponsesController@like',
        'as' => 'response.like'
    ]);


    Route::get('/response/unlike/{id}', [

        'uses' => 'ResponsesController@unlike',
        'as' => 'response.unlike'
    ]);

});
