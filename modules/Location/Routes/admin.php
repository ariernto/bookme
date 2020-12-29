<?php
use Illuminate\Support\Facades\Route;

Route::get('/','LocationController@index')->name('location.admin.index');

Route::match(['get'],'/create','LocationController@create')->name('location.admin.create');
Route::match(['get'],'/edit/{id}','LocationController@edit')->name('location.admin.edit');

Route::post('/store/{id}','LocationController@store')->name('location.admin.store');

Route::get('/getForSelect2','LocationController@getForSelect2')->name('location.admin.getForSelect2');
Route::post('/bulkEdit','LocationController@bulkEdit')->name('location.admin.bulkEdit');
