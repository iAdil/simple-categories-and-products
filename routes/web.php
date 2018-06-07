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

Route::get('/', "HomeController@index");
Route::get('/categories', "CategoriesController@index");
Route::get('/products/{category?}', "ProductsController@index");

//admin routes
//@toDO auth admin middleware
Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/', "AdminController@index");

    Route::resource('/categories', "CategoriesController", ['as' => 'admin']);
    Route::resource('/products', "ProductsController", ['as' => 'admin']);
});
