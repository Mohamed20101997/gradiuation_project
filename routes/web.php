<?php

use Illuminate\Support\Facades\Route;


// Route::get('/','HomeController@home')->name('home');

Route::group(['middleware'=>'authStudent:student'], function () {

    Route::get('/','FrontController@index')->name('front.home');

    Route::get('/subjects/{semester_id}','FrontController@getSubjects')->name('front.getSubjects');

    Route::get('/uploads/{subject_id}','FrontController@uploads')->name('front.uploads');


    Route::get('/getModel','FrontController@get_model')->name('front.get_model');




    Route::get('/logout', 'AuthController@logout')->name('front.logout');


});  /** End of Route Group Student  */



Route::group(['middleware'=>'guestStudent:student'], function () {
    Route::get('login', 'AuthController@getLogin')->name('front.login');
    Route::post('login', 'AuthController@login')->name('front.login');

});

