<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Main route
Route::get('/', function () { return view('index'); });

//Stores Route
Route::get('stores', function () { return view('stores'); });
Route::get('/store/{id?}', 'StoresController@store_form');
Route::post('/save/store', 'StoresController@save_store');
Route::get('/delete/store/{id}', 'StoresController@delete_store');

//Articles Route
Route::get('articles', function () { return view('articles'); });
Route::get('/article/{id?}', 'ArticlesController@article_form');
Route::post('/save/article', 'ArticlesController@save_article');
Route::get('/delete/article/{id}', 'ArticlesController@delete_article');

//Services

Route::group(['prefix' => 'services','middleware' => 'api.auth'], function () {
    Route::get('/stores', 'ServicesController@stores'); //All stores
    Route::get('/articles', 'ServicesController@articles'); //All articles
    Route::get('/articles/stores/{id}', 'ServicesController@articles_in_store'); //All articles

    //All other requests that are not listed here in the route grouping
    Route::get('/{p1?}/{p2?}/{p3?}/{p4?}/{p5?}/{p6?}', 'ServicesController@missing');

});