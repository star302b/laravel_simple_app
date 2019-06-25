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
Route::post('/order-status-thank','OrderStatusController@store')->name('order-status.save');


//Services
Route::get('/doc-retrieval','ServiceController@docRetrievalService')->name('service.docretrieval');
Route::post('/doc-retrieval','ServiceController@docRetrievalServiceSave')->name('service.docretrievalsave');

Route::post('/publishing','ServiceController@routeHomePage')->name('service.routeHomePage');
Route::post('/not-sure-save','ServiceController@notSureSave')->name('service.notSureSave');
Route::post('/publishing-save','ServiceController@publishingSave')->name('service.publishingSave');

Route::post('/service-promo-code','ServiceController@promoCode')->name('service.promoCode');


//Price Match
Route::get('/price-match','PriceMatchController@index')->name('price-match.index');
Route::post('/price-match-thank-you','PriceMatchController@store')->name('price-match.thankyou');

//Free Lookup
Route::get('/free-lookup','FreeLookupController@index')->name('free-lookup.index');
Route::post('/free-lookup-thank-you','FreeLookupController@store')->name('free-lookup.thankyou');

//Contact Page
Route::get('/contact-us','ContactController@index')->name('contact.index');
Route::post('/contact-us','ContactController@store')->name('contact.store');