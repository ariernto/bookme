<?php
    use Illuminate\Support\Facades\Route;

    Route::get('/testEmail','EmailController@testEmail')->name('email.admin.testEmail');
