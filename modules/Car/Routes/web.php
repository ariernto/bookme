<?php
use \Illuminate\Support\Facades\Route;

Route::group(['prefix'=>config('car.car_route_prefix')],function(){
    Route::get('/','CarController@index')->name('car.search'); // Search
    Route::get('/{slug}','CarController@detail')->name('car.detail');// Detail
});

Route::group(['prefix'=>'user/'.config('car.car_route_prefix'),'middleware' => ['auth','verified']],function(){
    Route::get('/','ManageCarController@manageCar')->name('car.vendor.index');
    Route::get('/create','ManageCarController@createCar')->name('car.vendor.create');
    Route::get('/edit/{id}','ManageCarController@editCar')->name('car.vendor.edit');
    Route::get('/del/{id}','ManageCarController@deleteCar')->name('car.vendor.delete');
    Route::post('/store/{id}','ManageCarController@store')->name('car.vendor.store');
    Route::get('bulkEdit/{id}','ManageCarController@bulkEditCar')->name("car.vendor.bulk_edit");
    Route::get('/booking-report/bulkEdit/{id}','ManageCarController@bookingReportBulkEdit')->name("car.vendor.booking_report.bulk_edit");
    Route::get('/recovery','ManageCarController@recovery')->name('car.vendor.recovery');
    Route::get('/restore/{id}','ManageCarController@restore')->name('car.vendor.restore');
});

Route::group(['prefix'=>'user/'.config('car.car_route_prefix')],function(){
    Route::group(['prefix'=>'availability'],function(){
        Route::get('/','AvailabilityController@index')->name('car.vendor.availability.index');
        Route::get('/loadDates','AvailabilityController@loadDates')->name('car.vendor.availability.loadDates');
        Route::post('/store','AvailabilityController@store')->name('car.vendor.availability.store');
    });
});
