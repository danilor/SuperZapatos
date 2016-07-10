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

Route::get('/', function () { return view('index'); });
Route::get('stores', function () { return view('stores'); });
Route::get('articles', function () { return view('articles'); });
Route::get('/store/{id}', 'StoresController@store_form');
Route::post('/save/store', 'StoresController@save_store');