<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/1/2019
 * Time: 10:02 AM
 */
use Illuminate\Support\Facades\Route;

Route::get('/edit/{id}', 'NewsController@edit')->name('news.admin.edit');

Route::post('/store/{id}','NewsController@store')->name('news.admin.store');

Route::get('/category','CategoryController@index')->name('news.admin.category.index');

Route::get('category/getForSelect2','CategoryController@getForSelect2')->name('news.admin.category.getForSelect2');

Route::get('/category/{id}','CategoryController@edit')->name('news.admin.category.edit');

Route::post('/category/store/{id}','CategoryController@store')->name('news.admin.category.store');

Route::get('/tag','TagController@index')->name('news.admin.tag.index');
Route::get('/tag/edit/{id}','TagController@edit')->name('news.admin.tag.edit');
Route::post('/tag/store/{id}','TagController@store')->name('news.admin.tag.store');