<?php
use \Illuminate\Support\Facades\Route;

Route::group(['prefix'=>env('SAUNA_ROUTE_PREFIX','sauna')],function(){
    Route::get('/','SaunaController@index')->name('sauna.search'); // Search
    Route::get('/{slug}','SaunaController@detail')->name('sauna.detail');// Detail
});

Route::group(['prefix'=>'user/'.env('SAUNA_ROUTE_PREFIX','sauna'),'middleware' => ['auth','verified']],function(){
    Route::get('/','VendorSaunaController@indexSauna')->name('sauna.vendor.index');
    Route::get('/create','VendorSaunaController@createSauna')->name('sauna.vendor.create');
    Route::get('/edit/{id}','VendorSaunaController@editSauna')->name('sauna.vendor.edit');
    Route::get('/del/{id}','VendorSaunaController@deleteSauna')->name('sauna.vendor.delete');
    Route::post('/store/{id}','VendorSaunaController@store')->name('sauna.vendor.store');
    Route::get('bulkEdit/{id}','VendorSaunaController@bulkEditSauna')->name("sauna.vendor.bulk_edit");
    Route::get('/booking-report','VendorSaunaController@bookingReport')->name("sauna.vendor.booking_report");
    Route::get('/booking-report/bulkEdit/{id}','VendorSaunaController@bookingReportBulkEdit')->name("sauna.vendor.booking_report.bulk_edit");
    Route::get('/recovery','VendorSaunaController@recovery')->name('sauna.vendor.recovery');
    Route::get('/restore/{id}','VendorSaunaController@restore')->name('sauna.vendor.restore');
});

Route::group(['prefix'=>'user/'.env('SAUNA_ROUTE_PREFIX','sauna')],function(){
    Route::group(['prefix'=>'availability'],function(){
        Route::get('/','AvailabilityController@index')->name('sauna.vendor.availability.index');
        Route::get('/loadDates','AvailabilityController@loadDates')->name('sauna.vendor.availability.loadDates');
        Route::post('/store','AvailabilityController@store')->name('sauna.vendor.availability.store');
    });
});
