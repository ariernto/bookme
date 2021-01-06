<?php
use \Illuminate\Support\Facades\Route;

Route::group(['prefix'=>config('hotel.hotel_route_prefix')],function(){
    Route::get('/','HotelController@index')->name('hotel.search'); // Search
    Route::get('/{slug}','HotelController@detail')->name('hotel.detail');// Detail
});

Route::group(['prefix'=>'user/'.config('hotel.hotel_route_prefix'),'middleware' => ['auth','verified']],function(){
    Route::get('/','VendorController@index')->name('hotel.vendor.index');
    Route::get('/create','VendorController@create')->name('hotel.vendor.create');
    Route::get('/recovery','VendorController@recovery')->name('hotel.vendor.recovery');
    Route::get('/restore/{id}','VendorController@restore')->name('hotel.vendor.restore');
    Route::get('/edit/{id}','VendorController@edit')->name('hotel.vendor.edit');
    Route::get('/del/{id}','VendorController@delete')->name('hotel.vendor.delete');
    Route::post('/store/{id}','VendorController@store')->name('hotel.vendor.store');
    Route::get('bulkEdit/{id}','VendorController@bulkEdithotel')->name("hotel.vendor.bulk_edit");
    Route::get('/booking-report/bulkEdit/{id}','VendorController@bookingReportBulkEdit')->name("hotel.vendor.booking_report.bulk_edit");
    Route::group(['prefix'=>'availability'],function(){
        Route::get('/','AvailabilityController@index')->name('hotel.vendor.availability.index');
        Route::get('/loadDates','AvailabilityController@loadDates')->name('hotel.vendor.availability.loadDates');
        Route::post('/store','AvailabilityController@store')->name('hotel.vendor.availability.store');
    });
    Route::group(['prefix'=>'room'],function (){
        Route::get('{hotel_id}/index','VendorRoomController@index')->name('hotel.vendor.room.index');
        Route::get('{hotel_id}/create','VendorRoomController@create')->name('hotel.vendor.room.create');
        Route::get('{hotel_id}/edit/{id}','VendorRoomController@edit')->name('hotel.vendor.room.edit');
        Route::post('{hotel_id}/store/{id}','VendorRoomController@store')->name('hotel.vendor.room.store');
        Route::get('{hotel_id}/del/{id}','VendorRoomController@delete')->name('hotel.vendor.room.delete');
        Route::get('{hotel_id}/bulkEdit/{id}','VendorRoomController@bulkEdit')->name('hotel.vendor.room.bulk_edit');
    });
});

Route::group(['prefix'=>'user/'.config('hotel.hotel_route_prefix')],function(){
    Route::group(['prefix'=>'{hotel_id}/availability'],function(){
        Route::get('/','AvailabilityController@index')->name('hotel.vendor.room.availability.index');
        Route::get('/loadDates','AvailabilityController@loadDates')->name('hotel.vendor.room.availability.loadDates');
        Route::post('/store','AvailabilityController@store')->name('hotel.vendor.room.availability.store');
    });
});

Route::post(config('hotel.hotel_route_prefix').'/checkAvailability','HotelController@checkAvailability')->name('hotel.checkAvailability');
