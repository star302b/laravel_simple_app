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

Route::get('/','HomePageController@index')->name('home-page');
Route::get('/order-status','OrderStatusController@index')->name('order-status.get');
Route::post('/order-status','OrderStatusController@store')->name('order-status.save');


//Services
Route::get('/doc-retrieval','ServiceController@docRetrievalService')->name('service.docretrieval');