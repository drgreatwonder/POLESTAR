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

Route::get('/welcome', function () {
    return view('welcome');
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

    Route::get('/home', 'HomeController@index')->name('home');

// 'HomeController@index')->name('platforms');


Route::group(['middleware' => 'auth'], function () {

    Route::resource('medium', 'MediumController');


    Route::get('conversation/create/new', [

        'uses' => 'ConversationController@create',
        'as' => 'conversations.create'
    ]);




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

    Route::get('/conversation/watch/{id}', [

        'uses' => 'WatchersController@watch',
        'as' => 'conversation.watch'
    ]);

    Route::get('/conversation/unwatch/{id}', [

        'uses' => 'WatchersController@unwatch',
        'as' => 'conversation.unwatch'
    ]);

    Route::get('/responses/best/reponse{id}', [

        'uses' => 'ResponsesController@best_answer',
        'as' => 'response.best.answer'
    ]);

});
