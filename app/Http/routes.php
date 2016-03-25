<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
use App\TvShow;

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', 'HomeController@index');
    Route::any('/tv', 'TVController@index');
    Route::get('/tv/add-series', 'TVController@addShow');
    Route::post('/tv/add-series', 'TVController@search');
    Route::get('/tv/store', ['uses' => 'TVController@store', 'as' => 'tv.store']);
    Route::get('/tv/{tv}', 'TVController@show');
//    Route::resource('tv', 'TVController');
    Route::get('/api/shows', function() {
        return TvShow::all();
    });
});
