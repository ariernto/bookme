<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Route;
// Vendor Manage Activity
Route::group(['prefix'=>'user/'.config('activity.activity_route_prefix'),'middleware' => ['auth','verified']],function(){
    Route::get('/','ManageActivityController@manageActivity')->name('activity.vendor.index');
    Route::get('/create','ManageActivityController@createActivity')->name('activity.vendor.create');
    Route::get('/edit/{id}','ManageActivityController@editActivity')->name('activity.vendor.edit');
    Route::get('/del/{id}','ManageActivityController@deleteActivity')->name('activity.vendor.delete');
    Route::post('/store/{id}','ManageActivityController@store')->name('activity.vendor.store');
    Route::get('bulkEdit/{id}','ManageActivityController@bulkEditActivity')->name("activity.vendor.bulk_edit");
    Route::get('clone/{id}','ManageActivityController@cloneActivity')->name("activity.vendor.clone");
    Route::get('/booking-report','ManageActivityController@bookingReport')->name("activity.vendor.booking_report");
    Route::get('/booking-report/bulkEdit/{id}','ManageActivityController@bookingReportBulkEdit')->name("activity.vendor.booking_report.bulk_edit");
    Route::get('/recovery','ManageActivityController@recovery')->name('activity.vendor.recovery');
    Route::get('/restore/{id}','ManageActivityController@restore')->name('activity.vendor.restore');
});
Route::group(['prefix'=>'user/'.config('activity.activity_route_prefix')],function(){
    Route::group(['prefix'=>'availability'],function(){
        Route::get('/','AvailabilityController@index')->name('activity.vendor.availability.index');
        Route::get('/loadDates','AvailabilityController@loadDates')->name('activity.vendor.availability.loadDates');
        Route::post('/store','AvailabilityController@store')->name('activity.vendor.availability.store');
    });
});
// Activity
Route::group(['prefix'=>config('activity.activity_route_prefix')],function(){
    Route::get('/','\Modules\Activity\Controllers\ActivityController@index')->name('activity.search'); // Search
    Route::get('/{slug}','\Modules\Activity\Controllers\ActivityController@detail');// Detail
});
