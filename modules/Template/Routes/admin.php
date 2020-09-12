<?php
use Illuminate\Support\Facades\Route;

Route::get('/','TemplateController@index')->name('template.admin.index');

Route::match(['get'],'/create','TemplateController@create')->name('template.admin.create');
Route::match(['get'],'/edit/{id}','TemplateController@edit')->name('template.admin.edit');

Route::post('/store','TemplateController@store')->name('template.admin.store');

Route::get('/getForSelect2','TemplateController@getForSelect2')->name('template.admin.getForSelect2');
Route::get('/getBlocks','TemplateController@getBlocks')->name('template.admin.getBlocks');
Route::post('/bulkEdit','TemplateController@bulkEdit')->name('template.admin.bulkEdit');


//import/export
	Route::match(['get', 'post'],'/importTemplate','TemplateController@importTemplate')->name('template.admin.importTemplate');
	Route::match(['get'],'/exportTemplate/{id}','TemplateController@exportTemplate')->name('template.admin.exportTemplate');
