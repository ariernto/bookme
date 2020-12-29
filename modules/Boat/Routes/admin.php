<?php

use \Illuminate\Support\Facades\Route;


Route::get('/','BoatController@index')->name('boat.admin.index');
Route::get('/create','BoatController@create')->name('boat.admin.create');
Route::get('/edit/{id}','BoatController@edit')->name('boat.admin.edit');
Route::post('/store/{id}','BoatController@store')->name('boat.admin.store');
Route::post('/bulkEdit','BoatController@bulkEdit')->name('boat.admin.bulkEdit');
Route::get('/recovery','BoatController@recovery')->name('boat.admin.recovery');

Route::group(['prefix'=>'attribute'],function (){
    Route::get('/','AttributeController@index')->name('boat.admin.attribute.index');
    Route::get('edit/{id}','AttributeController@edit')->name('boat.admin.attribute.edit');
    Route::post('store/{id}','AttributeController@store')->name('boat.admin.attribute.store');

    Route::get('terms/{id}','AttributeController@terms')->name('boat.admin.attribute.term.index');
    Route::get('term_edit/{id}','AttributeController@term_edit')->name('boat.admin.attribute.term.edit');
    Route::get('term_store','AttributeController@term_store')->name('boat.admin.attribute.term.store');

    Route::get('getForSelect2','AttributeController@getForSelect2')->name('boat.admin.attribute.term.getForSelect2');
});

Route::group(['prefix'=>'availability'],function(){
    Route::get('/','AvailabilityController@index')->name('boat.admin.availability.index');
    Route::get('/loadDates','AvailabilityController@loadDates')->name('boat.admin.availability.loadDates');
    Route::post('/store','AvailabilityController@store')->name('boat.admin.availability.store');
});
