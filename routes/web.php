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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// user dashboard
Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware('auth');
Route::get('/dashboard/{id}/edit', 'HomeController@edit')->name('editDashboard')->middleware('auth');
Route::post('/dashboard/{id}', 'HomeController@update')->name('postDashboard');

// Company

Route::get('/companies', 'CompanyController@index')->name('company.index')->middleware('auth');
Route::get('/company/create', 'CompanyController@create')->name('company.create')->middleware('auth');
Route::get('/company/{company}', 'CompanyController@show')->name('company.show')->middleware('auth');
Route::post('/company/create', 'CompanyController@store');

