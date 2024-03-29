<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/', function () {
    return view('welcome');
});


// Route::group(['prefix' => 'api'], function () {
// });
Route::delete('services/{service}', 'Api\ServicesController@destroy');

Route::put('services/{id}/reset', 'Api\ServicesController@reset');

Route::delete('modules/{module}', 'Api\ModulesController@destroy');

Route::delete('diligences/{diligence}', 'Api\DiligencesController@destroy');

Route::delete('users/{user}', 'Api\UsersController@destroy');

Route::delete('clients/{client}', 'Api\ClientsController@destroy');

Route::post('kiosk/takeAturn', 'Api\KioskController@takeATurn');

Route::post('atending/next-turn', 'Api\AtendingController@nextTurn');
Route::post('atending/atend-turn', 'Api\AtendingController@atendTurn');
Route::post('atending/finish-turn', 'Api\AtendingController@finishTurn');
Route::post('atending/cancel-turn', 'Api\AtendingController@cancelTurn');
Route::get('atending/{diligence_id}/getData/{module_id}', 'Api\AtendingController@getData');

Route::get('tv/get-data', 'Api\TVController@getData');


