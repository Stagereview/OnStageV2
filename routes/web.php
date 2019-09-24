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

// user dashboard
Route::post('/dashboard/{id}', 'HomeController@update')->name('postDashboard');
Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware('auth');
Route::get('/dashboard/{id}/edit', 'HomeController@edit')->name('editDashboard')->middleware('auth');