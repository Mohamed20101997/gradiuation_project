<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware'=>['auth:admin'],'prefix'=>'admin'], function () {

    Route::get('/','WelcomeController@index')->name('welcome');

    Route::resource('user', 'UsersController')->except('show');

    //logout route
    Route::post('logout', 'AuthController@logout')->name('logout');


});  /** End of Route Group  */



/** Start Auth Section */

Route::group(['middleware'=>'guest:admin','prefix'=>'admin'], function () {

    Route::get('login', 'AuthController@getLogin')->name('getLogin');
    Route::post('login', 'AuthController@login')->name('login');

});
