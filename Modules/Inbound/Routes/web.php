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

Route::prefix('inbound')->group(function() {
    Route::get('/', 'InboundController@index');
    Route::get("document", ['as' => "document.index", 'uses' => "InboundController@index"]);
    Route::get("profile/{id}", ['as' => "inbound.profile.index", 'uses' => "UserController@index"]);
    Route::put("profile/{id}", ['as' => "inbound.profile.update", 'uses' => "UserController@update"]);
});
