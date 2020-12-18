<?php
use \Illuminate\Support\Facades\Route;
Route::get('/','JobController@index')->name('job.admin.index');
Route::get('/create','JobController@create')->name('job.admin.create');
Route::get('/edit/{id}','JobController@edit')->name('job.admin.edit');
Route::post('/store/{id}','JobController@store')->name('job.admin.store');
Route::post('/bulkEdit','JobController@bulkEdit')->name('job.admin.bulkEdit');
Route::get('/recovery','JobController@recovery')->name('job.admin.recovery');

Route::group(['prefix'=>'attribute'],function (){
    Route::get('/','AttributeController@index')->name('job.admin.attribute.index');
    Route::get('edit/{id}','AttributeController@edit')->name('job.admin.attribute.edit');
    Route::post('store/{id}','AttributeController@store')->name('job.admin.attribute.store');

    Route::get('terms/{id}','AttributeController@terms')->name('job.admin.attribute.term.index');
    Route::get('term_edit/{id}','AttributeController@term_edit')->name('job.admin.attribute.term.edit');
    Route::get('term_store','AttributeController@term_store')->name('job.admin.attribute.term.store');

    Route::get('getForSelect2','AttributeController@getForSelect2')->name('job.admin.attribute.term.getForSelect2');
    Route::get('getAttributeForSelect2','AttributeController@getAttributeForSelect2')->name('job.admin.attribute.getForSelect2');
});
Route::group(['prefix'=>'room'],function (){

    Route::group(['prefix'=>'attribute'],function (){
        Route::get('/','RoomAttributeController@index')->name('job.admin.room.attribute.index');
        Route::get('edit/{id}','RoomAttributeController@edit')->name('job.admin.room.attribute.edit');
        Route::post('store/{id}','RoomAttributeController@store')->name('job.admin.room.attribute.store');
        Route::post('editAttrBulk','RoomAttributeController@editAttrBulk')->name('job.admin.room.attribute.editAttrBulk');

        Route::get('terms/{id}','RoomAttributeController@terms')->name('job.admin.room.attribute.term.index');
        Route::get('term_edit/{id}','RoomAttributeController@term_edit')->name('job.admin.room.attribute.term.edit');
        Route::get('term_store','RoomAttributeController@term_store')->name('job.admin.room.attribute.term.store');

        Route::get('getForSelect2','RoomAttributeController@getForSelect2')->name('job.admin.room.attribute.term.getForSelect2');
    });

    Route::get('{hotel_id}/index','RoomController@index')->name('job.admin.room.index');
    Route::get('{hotel_id}/create','RoomController@create')->name('job.admin.room.create');
    Route::get('{hotel_id}/edit/{id}','RoomController@edit')->name('job.admin.room.edit');
    Route::post('{hotel_id}/store/{id}','RoomController@store')->name('job.admin.room.store');


    Route::post('/bulkEdit','RoomController@bulkEdit')->name('job.admin.room.bulkEdit');

});

Route::group(['prefix'=>'{hotel_id}/availability'],function(){
    Route::get('/','AvailabilityController@index')->name('job.admin.room.availability.index');
    Route::get('/loadDates','AvailabilityController@loadDates')->name('job.admin.room.availability.loadDates');
    Route::post('/store','AvailabilityController@store')->name('job.admin.room.availability.store');
});

