<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
// Route::get('/','UsersController@login');
// Route::post('/new','TablesController@new');

Route::post('/delete/{id}','TablesController@delete')->name('deletename');
Route::get('/edit/{id}','TablesController@edit');
Route::post('/edit/{id}','TablesController@complete');
Route::resource('tables', 'TablesControlle');
// Route::post('/users/login','TablesController@index');
// Route::post('/users/signup','UsersController@signup');
// Route::get('/users/new','UsersController@new');
// Route::get('/logout','UsersController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
