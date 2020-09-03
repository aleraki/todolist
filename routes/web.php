<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/','TablesController@index');
Route::post('/new','TablesController@new');
Route::post('/delete/{id}','TablesController@delete')->name('deletename');
Route::get('/edit/{id}','TablesController@edit');
Route::post('/edit/{id}','TablesController@complete');
Route::resource('tables', 'TablesControlle');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
