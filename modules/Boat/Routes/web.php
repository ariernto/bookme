<?php
use \Illuminate\Support\Facades\Route;

Route::group(['prefix'=>config('boat.boat_route_prefix')],function(){
    Route::get('/','BoatController@index')->name('boat.search'); // Search
    Route::get('/{slug}','BoatController@detail')->name('boat.detail');// Detail
});

Route::group(['prefix'=>'user/'.config('boat.boat_route_prefix'),'middleware' => ['auth','verified']],function(){
    Route::get('/','ManageBoatController@manageBoat')->name('boat.vendor.index');
    Route::get('/create','ManageBoatController@createBoat')->name('boat.vendor.create');
    Route::get('/edit/{id}','ManageBoatController@editBoat')->name('boat.vendor.edit');
    Route::get('/del/{id}','ManageBoatController@deleteBoat')->name('boat.vendor.delete');
    Route::post('/store/{id}','ManageBoatController@store')->name('boat.vendor.store');
    Route::get('bulkEdit/{id}','ManageBoatController@bulkEditBoat')->name("boat.vendor.bulk_edit");
    Route::get('/booking-report','ManageBoatController@bookingReport')->name("boat.vendor.booking_report");
    Route::get('/booking-report/bulkEdit/{id}','ManageBoatController@bookingReportBulkEdit')->name("boat.vendor.booking_report.bulk_edit");
    Route::get('/recovery','ManageBoatController@recovery')->name('boat.vendor.recovery');
    Route::get('/restore/{id}','ManageBoatController@restore')->name('boat.vendor.restore');
});

Route::group(['prefix'=>'user/'.config('boat.boat_route_prefix')],function(){
    Route::group(['prefix'=>'availability'],function(){
        Route::get('/','AvailabilityController@index')->name('boat.vendor.availability.index');
        Route::get('/loadDates','AvailabilityController@loadDates')->name('boat.vendor.availability.loadDates');
        Route::post('/store','AvailabilityController@store')->name('boat.vendor.availability.store');
    });
});
