<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



$this->group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {

    $this->resource('users', 'UserController');
    $this->any('users/search', 'UserController@search')->name('users.search');

    $this->any('products/search', 'ProductController@search')->name('products.search');
    $this->any('categories/search', 'CategoryController@search')->name('categories.search');
    $this->resource('categories', 'CategoryController');
    $this->resource('products', 'ProductController');

    $this->get('/', 'DashboardController@index')->name('admin');
});


Auth::routes(['register' => true]);

Route::get('/', 'Site\\SiteController@index')->name('site.index');

