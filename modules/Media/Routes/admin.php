<?php
use Illuminate\Support\Facades\Route;
Route::get('/','MediaController@index')->name('media.admin.index');