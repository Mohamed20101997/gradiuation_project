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

Route::group(['middleware'=>['auth:admin,doctor'],'prefix'=>'admin'], function () {
    Route::get('/','WelcomeController@index')->name('welcome');

    Route::post('/logout', 'AuthController@logout')->name('logout');

});  /** End of Route Group Admin  */


Route::group(['middleware'=>['auth:admin'],'prefix'=>'admin'], function () {

    Route::resource('admin', 'AdminController')->except('show');

    Route::resource('doctor', 'DoctorController')->except('show');

    Route::resource('student', 'StudentController')->except('show');

    Route::resource('college', 'CollegeController')->except('show');

    Route::resource('semester', 'SemesterController')->except('show');

    Route::resource('subject', 'SubjectController')->except('show');

});  /** End of Route Group Admin  */


Route::group(['middleware'=>['auth:doctor'],'prefix'=>'doctor'], function () {

    Route::get('colleges/{id}', 'CollegesController@index')->name('colleges.index');

    Route::get('subject/files/{id}', 'CollegesController@files')->name('subject.doctor.files');

    Route::get('subject/edit/{id}', 'CollegesController@edit')->name('subject.doctor.edit');

    Route::post('subject/update/{id}', 'CollegesController@update')->name('subject.doctor.update');

    Route::get('subject/add/{id}', 'CollegesController@add')->name('subject.doctor.add');

    Route::post('subject/store/{id}', 'CollegesController@store')->name('subject.doctor.store');

    Route::post('subject/delete/{id}', 'CollegesController@delete')->name('subject.doctor.delete');



});  /** End of Route Group doctor  */


/** Start Auth Section */



Route::group(['middleware'=>'guest','prefix'=>'admin'], function () {
    Route::get('login', 'AuthController@getLogin')->name('getLogin');
    Route::post('login', 'AuthController@login')->name('login');
});
