<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'products'], function () {

    Route::get('/', 'ProductController@productsView');
    Route::get('/groups', 'ProductController@groupsView');
    Route::post('/add-product', 'ProductController@addProduct');
    Route::post('/add-group', 'ProductController@addGroup');


});
