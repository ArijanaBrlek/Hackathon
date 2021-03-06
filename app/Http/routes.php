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
    return Redirect::action('HomeController@index'); //view('layouts.partials.app');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::post('/schedule/update/{schedule}', 'ScheduleController@updateAjax');
Route::get('/schedule', 'ScheduleController@index')->name('schedule');
Route::resource('stations', 'StationsController');
Route::get('/employees/report', 'EmployeeController@report')->name('report');
Route::get('/employees/ajaxHours', 'EmployeeController@ajaxHours');
Route::get('/employees/ajaxVacations', 'EmployeeController@ajaxVacations');
Route::get('/employees/ajaxOvertimes', 'EmployeeController@ajaxOvertimes');
Route::get('/employees/ajax/{employee}', 'EmployeeController@ajax');
Route::get('/employees/single/{employee}', 'EmployeeController@single');
Route::resource('employees', 'EmployeeController');


Route::get('/ajax', 'ScheduleController@ajax');
Route::get('/data', 'DataController@createInputFile');
Route::get('/read_data', 'DataController@readOutputFile');
Route::get('/modal/{schedule}', 'ScheduleController@modal');

Route::get('/plan/ajax', 'PlanController@ajax');
Route::resource('plans', 'PlanController');
Route::post('/plan/update/{plan}', 'PlanController@updateAjax');

Route::get('/generate_schedule', 'GenerateScheduleController@generate');


