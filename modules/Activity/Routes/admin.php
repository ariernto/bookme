<?php
use Illuminate\Support\Facades\Route;

Route::get('/','ActivityController@index')->name('activity.admin.index');

Route::get('/create','ActivityController@create')->name('activity.admin.create');
Route::get('/edit/{id}','ActivityController@edit')->name('activity.admin.edit');

Route::post('/store/{id}','ActivityController@store')->name('activity.admin.store');

Route::get('/getForSelect2','ActivityController@getForSelect2')->name('activity.admin.getForSelect2');
Route::post('/bulkEdit','ActivityController@bulkEdit')->name('activity.admin.bulkEdit');
Route::get('/recovery','ActivityController@recovery')->name('activity.admin.recovery');

Route::get('/category','CategoryController@index')->name('activity.admin.category.index');
Route::get('/category/edit/{id}','CategoryController@edit')->name('activity.admin.category.edit');
Route::post('/category/store/{id}','CategoryController@store')->name('activity.admin.category.store');

Route::get('/attribute','AttributeController@index')->name('activity.admin.attribute.index');
Route::get('/attribute/edit/{id}','AttributeController@edit')->name('activity.admin.attribute.edit');
Route::post('/attribute/store/{id}','AttributeController@store')->name('activity.admin.attribute.store');

Route::get('/attribute/term_edit','AttributeController@terms')->name('activity.admin.attribute.term.index');
Route::get('/attribute/term_edit/edit/{id}','AttributeController@term_edit')->name('activity.admin.attribute.term.edit');
Route::post('/attribute/term_store/{id}','AttributeController@term_store')->name('activity.admin.attribute.term.store');


Route::group(['prefix'=>'availability'],function(){
    Route::get('/','AvailabilityController@index')->name('activity.admin.availability.index');
    Route::get('/loadDates','AvailabilityController@loadDates')->name('activity.admin.availability.loadDates');
    Route::post('/store','AvailabilityController@store')->name('activity.admin.availability.store');
});
