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

Route::get('/', function () {
    return view('welcome');
});

// Successfull subscription aplied
Route::get('/subscription', 'SubscriptionController@index');
Route::post('/subscription/store', 'SubscriptionController@store');

Route::get('/table', 'TableController@index');
Route::get('/table/delete/{id}', 'TableController@delete');
Route::get('/table/filter/email={email}', 'TableController@filter');
Route::get('/table/export/', 'TableController@excel');


