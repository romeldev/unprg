<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', 'TestController@index');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
