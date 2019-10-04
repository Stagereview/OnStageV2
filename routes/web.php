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
Route::resource('company', 'CompanyController');

Route::get('/company/edit/{company}', 'CompanyController@edit')->name('company.edit')->middleware('auth');
Route::post('/company/edit/{company}', 'CompanyController@update');

Route::get('/company/search/{company}', 'CompanyController@search')->name('company.search');

// Reviews
Route::resource('review', 'ReviewController');


