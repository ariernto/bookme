<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/1/2019
 * Time: 10:02 AM
 */
use Illuminate\Support\Facades\Route;

Route::get('/','SocialController@index')->name('social.admin.index');

Route::prefix('forum')->group(function (){
    Route::get('/','ForumController@index')->name('social.admin.forum.index');
    Route::get('/edit/{id}','ForumController@edit')->name('social.admin.forum.edit');
    Route::post('/store/{?id}','ForumController@store')->name('social.admin.forum.store');
    Route::post('/bulkEdit','ForumController@bulkEdit')->name('social.admin.forum.bulkEdit');
});
