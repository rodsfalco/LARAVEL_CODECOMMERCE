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

// #########################################################################

Route::get('/exemplo', 'WelcomeController@exemplo');

// #########################################################################

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

// #########################################################################

Route::get('categories',                ['as'=>'categories.index', 'uses'=>'CategoriesController@index']);
Route::get('categories/create',         ['as'=>'categories.create', 'uses'=>'CategoriesController@create']);
Route::post('categories',               ['as'=>'categories.store', 'uses'=>'CategoriesController@store']);
Route::get('categories/{id}/destroy',   ['as'=>'categories.destroy', 'uses'=>'CategoriesController@destroy']);
Route::get('categories/{id}/edit',      ['as'=>'categories.edit', 'uses'=>'CategoriesController@edit']);
Route::put('categories/{id}/update',    ['as'=>'categories.update', 'uses'=>'CategoriesController@update']);

Route::get('products',                  ['as'=>'products.index', 'uses'=>'ProductsController@index']);
Route::get('products/create',           ['as'=>'products.create', 'uses'=>'ProductsController@create']);
Route::post('products',                 ['as'=>'products.store', 'uses'=>'ProductsController@store']);
Route::get('products/{id}/destroy',     ['as'=>'products.destroy', 'uses'=>'ProductsController@destroy']);
Route::get('products/{id}/edit',        ['as'=>'products.edit', 'uses'=>'ProductsController@edit']);
Route::put('products/{id}/update',      ['as'=>'products.update', 'uses'=>'ProductsController@update']);