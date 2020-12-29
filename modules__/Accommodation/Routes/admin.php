<?php

use \Illuminate\Support\Facades\Route;


Route::get('/','AccommodationController@index')->name('accommodation.admin.index');
Route::get('/create','AccommodationController@create')->name('accommodation.admin.create');
Route::get('/edit/{id}','AccommodationController@edit')->name('accommodation.admin.edit');
Route::post('/store/{id}','AccommodationController@store')->name('accommodation.admin.store');
Route::post('/bulkEdit','AccommodationController@bulkEdit')->name('accommodation.admin.bulkEdit');
Route::get('/recovery','AccommodationController@recovery')->name('accommodation.admin.recovery');

Route::group(['prefix'=>'attribute'],function (){
    Route::get('/','AttributeController@index')->name('accommodation.admin.attribute.index');
    Route::get('edit/{id}','AttributeController@edit')->name('accommodation.admin.attribute.edit');
    Route::post('store/{id}','AttributeController@store')->name('accommodation.admin.attribute.store');

    Route::get('terms/{id}','AttributeController@terms')->name('accommodation.admin.attribute.term.index');
    Route::get('term_edit/{id}','AttributeController@term_edit')->name('accommodation.admin.attribute.term.edit');
    Route::get('term_store','AttributeController@term_store')->name('accommodation.admin.attribute.term.store');

    Route::get('getForSelect2','AttributeController@getForSelect2')->name('accommodation.admin.attribute.term.getForSelect2');
});

Route::group(['prefix'=>'availability'],function(){
    Route::get('/','AvailabilityController@index')->name('accommodation.admin.availability.index');
    Route::get('/loadDates','AvailabilityController@loadDates')->name('accommodation.admin.availability.loadDates');
    Route::post('/store','AvailabilityController@store')->name('accommodation.admin.availability.store');
});
