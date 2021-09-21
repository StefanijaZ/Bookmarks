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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'BookmarkController@index');
Route::get('/info/{tag}', 'BookmarkController@info');
Route::get('/home', 'BookmarkController@home');
Route::get('/delete/{bookmark}', 'BookmarkController@delete');
Route::get('/edit/{bookmark}', 'BookmarkController@edit');
Route::post('/edit/{bookmark}', 'BookmarkController@saveEdit');
Route::get('/add', 'BookmarkController@add');
Route::post('/add', 'BookmarkController@saveAdd');
Route::get('/search', 'BookmarkController@search');


