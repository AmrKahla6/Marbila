<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Employees Routes
Route::get('/', 'EmployeeController@index')->name('employees');
Route::get('employee/create', 'EmployeeController@create')->name('employee-create');
Route::post('employee/store', 'EmployeeController@store')->name('employee-store');
Route::get('employee/{id}', 'EmployeeController@show')->name('employee.show');

//Vaction Routes
Route::get('vaction', 'VactionController@index')->name('vactions');

//Vacation Requests Routes
Route::get('vacation-requests', 'VacationReqestsController@index')->name('vaction-requests');
