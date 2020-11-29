<?php
use \Illuminate\Support\Facades\Route;

Route::group(['prefix'=>config('accommodation.accommodation_route_prefix')],function(){
    Route::get('/','AccommodationController@index')->name('accommodation.search'); // Search
    Route::get('/{slug}','AccommodationController@detail')->name('accommodation.detail');// Detail
});


Route::group(['prefix'=>'user/'.config('accommodation.accommodation_route_prefix'),'middleware' => ['auth','verified']],function(){
    Route::get('/','ManageAccommodationController@manageAccommodation')->name('accommodation.vendor.index');
    Route::get('/create','ManageAccommodationController@createAccommodation')->name('accommodation.vendor.create');
    Route::get('/edit/{id}','ManageAccommodationController@editAccommodation')->name('accommodation.vendor.edit');
    Route::get('/del/{id}','ManageAccommodationController@deleteAccommodation')->name('accommodation.vendor.delete');
    Route::post('/store/{id}','ManageAccommodationController@store')->name('accommodation.vendor.store');
    Route::get('bulkEdit/{id}','ManageAccommodationController@bulkEditAccommodation')->name("accommodation.vendor.bulk_edit");
    Route::get('/booking-report','ManageAccommodationController@bookingReport')->name("accommodation.vendor.booking_report");
    Route::get('/booking-report/bulkEdit/{id}','ManageAccommodationController@bookingReportBulkEdit')->name("accommodation.vendor.booking_report.bulk_edit");
	Route::get('clone/{id}','ManageAccommodationController@cloneAccommodation')->name("accommodation.vendor.clone");
    Route::get('/recovery','ManageAccommodationController@recovery')->name('accommodation.vendor.recovery');
    Route::get('/restore/{id}','ManageAccommodationController@restore')->name('accommodation.vendor.restore');
});

Route::group(['prefix'=>'user/'.config('accommodation.accommodation_route_prefix')],function(){
    Route::group(['prefix'=>'availability'],function(){
        Route::get('/','AvailabilityController@index')->name('accommodation.vendor.availability.index');
        Route::get('/loadDates','AvailabilityController@loadDates')->name('accommodation.vendor.availability.loadDates');
        Route::post('/store','AvailabilityController@store')->name('accommodation.vendor.availability.store');
    });
});
