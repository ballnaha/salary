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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/','DashboardController@index');


Auth::routes();
Route::get('/logout','\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/dashboard', 'DashboardController@index');

Route::resource('setting/user','SetuserController');
Route::any('setting/user/{id}/edit','SetuserController@update');

////////////////////////////////////////////////////////////////////////////////////

Route::get('setting/employee/sort','EmployeeController@sort');
Route::resource('setting/employee','EmployeeController');

Route::any('setting/employee/{id}/edit','EmployeeController@update');

Route::resource('main/pay','PayController');





