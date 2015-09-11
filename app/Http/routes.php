<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/exemplo', 'WelcomeController@exemplo');

Route::pattern('id', '[0-9]+');
Route::group(['prefix'=>'admin'], function() {

    Route::group(['prefix'=>'categories'], function() {

        Route::get('/', ['as'=>'allCategories', 'uses'=>'AdminCategoriesController@index']);
        Route::get('/create', ['as'=>'createCategories', 'uses'=>'AdminCategoriesController@create']);
        Route::get('/read/{id}', ['as'=>'readCategories', 'uses'=>'AdminCategoriesController@read']);
        Route::get('/update/{id}', ['as'=>'updateCategories', 'uses'=>'AdminCategoriesController@update']);
        Route::get('/delete/{id}', ['as'=>'deleteCategories', 'uses'=>'AdminCategoriesController@delete']);

    });

    Route::group(['prefix'=>'products'], function() {

        Route::get('/', ['as'=>'allProducts', 'uses'=>'AdminProductsController@index']);
        Route::get('/create', ['as'=>'createProducts', 'uses'=>'AdminProductsController@create']);
        Route::get('/read/{id}', ['as'=>'readProducts', 'uses'=>'AdminProductsController@read']);
        Route::get('/update/{id}', ['as'=>'updateProducts', 'uses'=>'AdminProductsController@update']);
        Route::get('/delete/{id}', ['as'=>'deleteProducts', 'uses'=>'AdminProductsController@delete']);

    });

});