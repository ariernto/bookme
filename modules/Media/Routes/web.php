<?php
use Illuminate\Support\Facades\Route;
//
Route::get('media/private/view','MediaController@privateFileView')->middleware('auth')->name('media.private.view');

// Media
Route::group(['prefix'=>'media'],function(){
    Route::get('/preview/{id}/{size?}','\Modules\Media\Controllers\MediaController@preview');//
    Route::post('/private/store','MediaController@privateFileStore')->name('media.private.store');//
});
Route::group(['middleware' => ['auth']],function(){
    Route::post('/admin/module/media/store','\Modules\Media\Admin\MediaController@store');
    Route::post('/admin/module/media/getLists','\Modules\Media\Admin\MediaController@getLists');
    Route::post('/admin/module/media/removeFiles','\Modules\Media\Admin\MediaController@removeFiles');
});
