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
Route::any('/company/search/{q}', 'CompanyController@search')->name('company.search')->middleware('auth');
// Route::any('/search',function(){
//     $q = Input::get ( 'q' );
//     $user = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
//     if(count($user) > 0)
//         return view('welcome')->withDetails($user)->withQuery ( $q );
//     else return view ('welcome')->withMessage('No Details found. Try to search again !');
// });