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
Route::get('employee/{id}/show', 'EmployeeController@show')->name('employee.show');
Route::get('employee/{id}/edit', 'EmployeeController@edit')->name('employee.edit');
Route::put('employee/{id}/update', 'EmployeeController@update')->name('employee.update');
Route::delete('employee/{id}/delete', 'EmployeeController@destroy')->name('employee.destroy');

//Vaction Routes
Route::get('vaction', 'VactionController@index')->name('vactions');

//Vacation Requests Routes
Route::get('vacation-requests', 'VacationReqestsController@index')->name('vaction-requests');
