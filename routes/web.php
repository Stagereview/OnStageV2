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

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Company
Route::resource('company', 'CompanyController');

Route::get('/company/search/{company}', 'CompanyController@search')->name('company.search');

<<<<<<< HEAD
Route::fallback('CompanyController@index');
=======
>>>>>>> e6ee7e7396a9d77b749bffacc3d157e1b654e828
