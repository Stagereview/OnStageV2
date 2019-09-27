<?php

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

Route::get('/', 'CompanyController@index')->name('home');

Auth::routes();

// User resource
Route::resource('users', 'UserController')->except([
    'create', 'store'
]);
Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');

// Company
Route::get('/company/create', 'CompanyController@create')->name('company.create')->middleware('auth');
Route::post('/company/create', 'CompanyController@store');
Route::get('/company/{company}', 'CompanyController@show')->name('company.show')->middleware('auth');
Route::get('/companies', 'CompanyController@index')->name('company.index')->middleware('auth');