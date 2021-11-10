<?php

use Illuminate\Support\Facades\Route;
// Route::get('/','HomeController@home')->name('home');

Route::get('/',function (){
    return view('dashboard.welcome');
})->middleware('auth');

