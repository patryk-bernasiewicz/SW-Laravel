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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
  Route::get('dashboard', 'DashboardController@index');
  Route::get('dashboard/generate_api_key', 'DashboardController@generate_api_key');
  Route::get('dashboard/swapi', 'SwapiController@index');
  Route::get('dashboard/swapi/refresh', 'SwapiController@refresh');

  Route::resource('roles', 'RoleController');
  Route::resource('users', 'UserController');
});