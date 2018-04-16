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
    return view('login');
});
Route::get('/users', 'UsersController@index')->middleware('checkuser');;
Route::post('/updateSalary', 'UsersController@updateSalary')->middleware('checkuser');;
Route::get('/createuser', 'UsersController@create')->middleware('checkuser');;
Route::post('/adduser', 'UsersController@store')->middleware('checkuser');;
Route::get('/viewuser/{id}', 'UsersController@show')->middleware('checkuser');;
Route::patch('/updateuser/{id}', 'UsersController@update')->middleware('checkuser');;
Route::get('deleteuser/{id}', 'UsersController@destroy')->middleware('checkuser');;
Route::post('/login', 'LoginController@index');
Route::get('/logout', 'LoginController@logout')->middleware('checkuser');;
Route::get('/search', 'UsersController@search')->middleware('checkuser');;
Route::get('/filter', 'UsersController@filter')->middleware('checkuser');;
Route::get('/redirect/{service}', 'LoginController@redirect');
Route::get('/callback/{service}', 'LoginController@callback');