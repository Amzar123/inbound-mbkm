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
    Route::get("profile", ['as' => "inbound.profile.index", 'uses' => "UserController@index"]);
    Route::post("document/delete", ['as' => "document.destroy", 'uses' => "FileController@destroy"]);
    Route::put("profile/{id}", ['as' => "inbound.profile.update", 'uses' => "UserController@update"]);
    Route::post("upload", ['as' => "inbound.upload", 'uses' => "FileController@store"]);
    Route::post("subject", ['as' => "inbound.subject", 'uses' => "SubjectsTakenStudentsController@store"]);
    Route::delete("subject/{id}", ['as' => "inbound.subject.delete", 'uses' => "SubjectsTakenStudentsController@destroy"]);

    Route::get("peserta", ['as' => "inbound.peserta", 'uses' => "UserController@getPesertaInbound"]);
    Route::get("peserta/{id}", ['as' => "inbound.peserta.show", 'uses' => "UserController@show"]);

    Route::get("program", ['as' => "program.index", 'uses' => "ProgramController@index"]);
    Route::post("program", ['as' => "program.store", 'uses' => "ProgramController@store"]);
    Route::delete("program/{id}", ['as' => "program.destroy", 'uses' => "ProgramController@destroy"]);
    Route::post("program/show", ['as' => "program.show", 'uses' => "ProgramController@show"]);
    Route::get("program/register/{uuid}", ['as' => "program.register", 'uses' => "ProgramController@register"]);

    $controller_name = "UserController";
    $module_name = "users";
    Route::get("$module_name/index_data", ['as' => "$module_name.index_data", 'uses' => "$controller_name@index_data"]);
});
