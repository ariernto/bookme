<?php

use \Illuminate\Support\Facades\Route;


Route::get('/','CarController@index')->name('car.admin.index');
Route::get('/create','CarController@create')->name('car.admin.create');
Route::get('/edit/{id}','CarController@edit')->name('car.admin.edit');
Route::post('/store/{id}','CarController@store')->name('car.admin.store');
Route::post('/bulkEdit','CarController@bulkEdit')->name('car.admin.bulkEdit');
Route::get('/recovery','CarController@recovery')->name('car.admin.recovery');

Route::group(['prefix'=>'attribute'],function (){
    Route::get('/','AttributeController@index')->name('car.admin.attribute.index');
    Route::get('edit/{id}','AttributeController@edit')->name('car.admin.attribute.edit');
    Route::post('store/{id}','AttributeController@store')->name('car.admin.attribute.store');

    Route::get('terms/{id}','AttributeController@terms')->name('car.admin.attribute.term.index');
    Route::get('term_edit/{id}','AttributeController@term_edit')->name('car.admin.attribute.term.edit');
    Route::get('term_store','AttributeController@term_store')->name('car.admin.attribute.term.store');

    Route::get('getForSelect2','AttributeController@getForSelect2')->name('car.admin.attribute.term.getForSelect2');
});

Route::group(['prefix'=>'availability'],function(){
    Route::get('/','AvailabilityController@index')->name('car.admin.availability.index');
    Route::get('/loadDates','AvailabilityController@loadDates')->name('car.admin.availability.loadDates');
    Route::post('/store','AvailabilityController@store')->name('car.admin.availability.store');
});
