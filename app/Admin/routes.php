<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->redirect('/','admin/order',301);
    $router->resource('county-promo-codes', CountyPromoCodeController::class);
    $router->resource('countyimports', CountyImportController::class);
    $router->resource('countyprices', CountyPricesController::class);
    $router->resource('order', OrderController::class);
});
