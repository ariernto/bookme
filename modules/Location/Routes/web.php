<?php
use Illuminate\Support\Facades\Route;

// Location
Route::group(['prefix'=>config('location.location_route_prefix')],function(){
    Route::get('/{slug}','LocationController@detail')->name("location.detail");;// Detail
    Route::get('/search/searchForSelect2','LocationController@searchForSelect2')->name("location.searchForSelect");;// Search for select 2
});
