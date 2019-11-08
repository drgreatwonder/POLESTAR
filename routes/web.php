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
    return view('welcome');
});

Route::get('/converse', function() {

    return view('/converse');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/platforms', [

    'uses' => 'PlatFormController@index',
    'as' => 'platforms'
]);
// 'HomeController@index')->name('platforms');

Route::group(['middleware' => 'auth'], function() {

    Route::resource('medium', 'MediumController');

    Route::get('conversation/create', [

        'uses' => 'ConversationController@create',
        'as' => 'conversations.create'
    ]);



    Route::post('conversation/store', [

        'uses' => 'ConversationController@store',
        'as' => 'conversations.store'
    ]);


    Route::get('conversation/{slug}', [

        'uses' => 'ConversationController@show',
        'as' => 'conversation'
    ]);
});
