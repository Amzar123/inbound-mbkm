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
$inboundNameSpaceBackend = "\Modules\Inbound\Http\Controllers\Backend";

Route::prefix('inbound')->group(function() {
    Route::get('/', 'InboundController@index');
});


/*
*
* Backend Routes
* These routes need view-backend permission
* --------------------------------------------------------------------
*/
Route::group(['namespace' => $inboundNameSpaceBackend, 'as' => 'backend.'], function () {
    $backend_controller = 'BackendController';
    $controller_name = 'UserController';
    Route::get("dashboard", ['as' => "$backend_controller.index", 'uses' => "$backend_controller@index"]);
    Route::get("document", ['as' => "document.index", 'uses' => "DocumentController@index"]);
});