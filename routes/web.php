<?php

use Illuminate\Support\Facades\Route;


// Route::get('/','HomeController@home')->name('home');

Route::group(['middleware'=>'auth:student'], function () {

    Route::get('/','FrontController@index')->name('front.home');


});  /** End of Route Group Student  */



Route::group(['middleware'=>'guest:student'], function () {
    Route::get('login', 'AuthController@getLogin')->name('front.login');
    Route::post('login', 'AuthController@login')->name('front.login');
});

