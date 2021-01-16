<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PlaceMapController@index')->name('frontpage');
Route::get('/place/data', 'DataController@places')->name('place.data'); // DATA TABLE CONTROLLER

Route::group(['middleware' => ['auth']], function () {
    Route::resource('places', 'PlaceController');
});

// SAMPLE MAP DISPLAY
//Route::get('/sample', 'PlaceController@sampleMap')->name('sample');
