<?php
use \Illuminate\Support\Facades\Route;

Route::group(['prefix'=>config('job.job_route_prefix')],function(){
    Route::get('/','JobController@index')->name('job.search'); // Search
    Route::get('/{slug}','JobController@detail')->name('job.detail');// Detail
});

Route::group(['prefix'=>'user/'.config('job.job_route_prefix'),'middleware' => ['auth','verified']],function(){
    Route::get('/','VendorController@index')->name('job.vendor.index');
    Route::get('/create','VendorController@create')->name('job.vendor.create');
    Route::get('/recovery','VendorController@recovery')->name('job.vendor.recovery');
    Route::get('/restore/{id}','VendorController@restore')->name('job.vendor.restore');
    Route::get('/edit/{id}','VendorController@edit')->name('job.vendor.edit');
    Route::get('/del/{id}','VendorController@delete')->name('job.vendor.delete');
    Route::post('/store/{id}','VendorController@store')->name('job.vendor.store');
    Route::get('bulkEdit/{id}','VendorController@bulkEditjob')->name("job.vendor.bulk_edit");
    Route::get('/booking-report/bulkEdit/{id}','VendorController@bookingReportBulkEdit')->name("job.vendor.booking_report.bulk_edit");
    Route::group(['prefix'=>'availability'],function(){
        Route::get('/','AvailabilityController@index')->name('job.vendor.availability.index');
        Route::get('/loadDates','AvailabilityController@loadDates')->name('job.vendor.availability.loadDates');
        Route::post('/store','AvailabilityController@store')->name('job.vendor.availability.store');
    });
    Route::group(['prefix'=>'room'],function (){
        Route::get('{job_id}/index','VendorRoomController@index')->name('job.vendor.room.index');
        Route::get('{job_id}/create','VendorRoomController@create')->name('job.vendor.room.create');
        Route::get('{job_id}/edit/{id}','VendorRoomController@edit')->name('job.vendor.room.edit');
        Route::post('{job_id}/store/{id}','VendorRoomController@store')->name('job.vendor.room.store');
        Route::get('{job_id}/del/{id}','VendorRoomController@delete')->name('job.vendor.room.delete');
        Route::get('{job_id}/bulkEdit/{id}','VendorRoomController@bulkEdit')->name('job.vendor.room.bulk_edit');
    });
});

Route::group(['prefix'=>'user/'.config('job.job_route_prefix')],function(){
    Route::group(['prefix'=>'{job_id}/availability'],function(){
        Route::get('/','AvailabilityController@index')->name('job.vendor.room.availability.index');
        Route::get('/loadDates','AvailabilityController@loadDates')->name('job.vendor.room.availability.loadDates');
        Route::post('/store','AvailabilityController@store')->name('job.vendor.room.availability.store');
    });
});

Route::post(config('job.job_route_prefix').'/checkAvailability','JobController@checkAvailability')->name('job.checkAvailability');
