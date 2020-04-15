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
    return view('auth/login');
});

// Route::get('/login', 'userController@login')->name('login')->middleware('guest');
// Route::post('loginPost','userController@loginPost')->name('loginPost');
// Route::get('/register', 'userController@register')->name('register');
// Route::post('/registerPost','userController@registerPost')->name('registerPost');
// Route::get('/dashboard', function() {
//     return view('dashboard');
//   })->middleware('auth:user');
Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/masterdata', 'masterController@index')->name('masterdata');
Route::get('/monitoring', 'monitoringController@index')->name('monitoring');
Route::get('/logout','HomeController@logout');
Route::get('/tambahdata', 'masterController@add')->name('add');
Route::post('store', 'masterController@store')->name('store');
Route::get('deletefile/{id}','masterController@deletefile')->name('delete');
Route::get('/ujidata/{id}','ujiController@index')->name('ujidata');
Route::get('/proses/{id}','ujiController@process')->name('proses');
Route::get('generate-docx', 'ujiController@generateDocx')->name('exportword');
Route::get('exportexcel', 'monitoringController@export')->name('export');
