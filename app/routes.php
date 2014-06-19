<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showForm');
Route::post('/', ['before' => 'csrf', 'uses' => 'HomeController@process']);
Route::get('results', 'HomeController@showResults');