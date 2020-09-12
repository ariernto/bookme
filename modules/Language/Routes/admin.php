<?php
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'],'/','LanguageController@index')->name('language.admin.index');
Route::match(['get', 'post'],'edit/{id}','LanguageController@edit')->name('language.admin.edit');
Route::post('editBulk','LanguageController@editBulk')->name('language.admin.editBulk');


Route::group(['prefix'=>'translations'],function (){
    Route::get('/','TranslationsController@index')->name('language.admin.translations.index');
    Route::get('detail/{id}','TranslationsController@detail')->name('language.admin.translations.detail');
    Route::post('store/{id}','TranslationsController@store')->name('language.admin.translations.store');
    Route::get('build/{id}','TranslationsController@build')->name('language.admin.translations.build');
    Route::get('loadTranslateJson','TranslationsController@loadTranslateJson')->name('language.admin.translations.loadTranslateJson');
    Route::get('loadStrings','TranslationsController@loadStrings')->name('language.admin.translations,loadStrings');
});

