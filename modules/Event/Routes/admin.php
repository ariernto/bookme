<?php

use \Illuminate\Support\Facades\Route;


Route::get('/','EventController@index')->name('event.admin.index');
Route::get('/create','EventController@create')->name('event.admin.create');
Route::get('/edit/{id}','EventController@edit')->name('event.admin.edit');
Route::post('/store/{id}','EventController@store')->name('event.admin.store');
Route::post('/bulkEdit','EventController@bulkEdit')->name('event.admin.bulkEdit');
Route::get('/recovery','EventController@recovery')->name('event.admin.recovery');

Route::group(['prefix'=>'attribute'],function (){
    Route::get('/','AttributeController@index')->name('event.admin.attribute.index');
    Route::get('edit/{id}','AttributeController@edit')->name('event.admin.attribute.edit');
    Route::post('store/{id}','AttributeController@store')->name('event.admin.attribute.store');

    Route::get('terms/{id}','AttributeController@terms')->name('event.admin.attribute.term.index');
    Route::get('term_edit/{id}','AttributeController@term_edit')->name('event.admin.attribute.term.edit');
    Route::get('term_store','AttributeController@term_store')->name('event.admin.attribute.term.store');

    Route::get('getForSelect2','AttributeController@getForSelect2')->name('event.admin.attribute.term.getForSelect2');
});

Route::group(['prefix'=>'availability'],function(){
    Route::get('/','AvailabilityController@index')->name('event.admin.availability.index');
    Route::get('/loadDates','AvailabilityController@loadDates')->name('event.admin.availability.loadDates');
    Route::post('/store','AvailabilityController@store')->name('event.admin.availability.store');
});
