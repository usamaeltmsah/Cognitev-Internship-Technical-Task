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
Route::get('/hello', "CogControllers@hello");

//$groubing = DB::table()

Route::get('/h', "CogControllers@groupData");

Route::resource('data', 'DataController');

Route::get('/data/grouped/{a1}', 'DataController@groupData');

Route::get('/data/select/{a2}', 'DataController@getFields');
Route::get('/data/groupandselect/{pars1}/{pars2}', 'DataController@groupDataBySelectedFields');