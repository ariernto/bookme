<?php

use \Illuminate\Support\Facades\Route;


Route::get('/','SaunaController@index')->name('sauna.admin.index');
Route::get('/create','SaunaController@create')->name('sauna.admin.create');
Route::get('/edit/{id}','SaunaController@edit')->name('sauna.admin.edit');
Route::post('/store/{id}','SaunaController@store')->name('sauna.admin.store');
Route::post('/bulkEdit','SaunaController@bulkEdit')->name('sauna.admin.bulkEdit');
Route::get('/recovery','SaunaController@recovery')->name('sauna.admin.recovery');

Route::group(['prefix'=>'attribute'],function (){
    Route::get('/','AttributeController@index')->name('sauna.admin.attribute.index');
    Route::get('edit/{id}','AttributeController@edit')->name('sauna.admin.attribute.edit');
    Route::post('store/{id}','AttributeController@store')->name('sauna.admin.attribute.store');

    Route::get('terms/{id}','AttributeController@terms')->name('sauna.admin.attribute.term.index');
    Route::get('term_edit/{id}','AttributeController@term_edit')->name('sauna.admin.attribute.term.edit');
    Route::get('term_store','AttributeController@term_store')->name('sauna.admin.attribute.term.store');

    Route::get('getForSelect2','AttributeController@getForSelect2')->name('sauna.admin.attribute.term.getForSelect2');
});

Route::group(['prefix'=>'availability'],function(){
    Route::get('/','AvailabilityController@index')->name('sauna.admin.availability.index');
    Route::get('/loadDates','AvailabilityController@loadDates')->name('sauna.admin.availability.loadDates');
    Route::post('/store','AvailabilityController@store')->name('sauna.admin.availability.store');
});
