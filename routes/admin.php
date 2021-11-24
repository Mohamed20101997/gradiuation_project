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


Route::get('admin/','WelcomeController@index')->name('welcome');
Route::group(['middleware'=>['auth:admin'],'prefix'=>'admin'], function () {

    Route::resource('admin', 'AdminController')->except('show');

    Route::resource('doctor', 'DoctorController')->except('show');

    Route::resource('student', 'StudentController')->except('show');


    Route::resource('college', 'CollegeController')->except('show');

    Route::resource('semester', 'SemesterController')->except('show');

    Route::resource('subject', 'SubjectController')->except('show');
    //logout route
    Route::post('logout', 'AuthController@logout')->name('logout');

});  /** End of Route Group Admin  */


Route::group(['middleware'=>['auth:doctor'],'prefix'=>'doctor'], function () {

    Route::resource('colleges', 'CollegesController')->except('show');

    //logout route
    Route::post('logout', 'AuthController@logout')->name('logout');

});  /** End of Route Group doctor  */


/** Start Auth Section */

Route::group(['middleware'=>['guest:admin' , 'guest:doctor'],'prefix'=>'admin'], function () {
    Route::get('login', 'AuthController@getLogin')->name('getLogin');
    Route::post('login', 'AuthController@login')->name('login');
});
