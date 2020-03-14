<?php

use Composer\DependencyResolver\Request;
use Illuminate\Support\Facades\Redirect;
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

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Auth::routes();


Route::GET('/', function () {
    if (Auth::check()) {
        return redirect('/home');
    }
    return view('new_option');
});

Route::group(['middleware' => 'auth'], function () {

    Route::GET('/home', 'HomeController@index')->name('home');

    Route::get('/atention', 'AtentionController@index')->name('atention');

    Route::GET('/tv', 'TvController@index')->name('tv');
    
    Route::resource('kiosko', 'TurnController');
    
    Route::resource('services', 'ServicesController');

    Route::resource('modules', 'ModulesController');

    Route::resource('diligences', 'DiligencesController');

    Route::resource('users', 'UsersController');
    
    Route::resource('clients', 'ClientController');

});

/*
    Ruta para imprimir
*/
Route::get('/imprimir', 'PdfController@imprimir')->name('imprimir');
Route::get('/pdf', 'PdfController@index');
