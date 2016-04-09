<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/schedule', 'ScheduleController@index')->name('schedule');
Route::resource('stations', 'StationsController');
Route::resource('employees', 'EmployeeController');

Route::get('/ajax', 'ScheduleController@ajax');
Route::get('/data', 'DataController@createInputFile');
Route::get('/read_data', 'DataController@readOutputFile');
