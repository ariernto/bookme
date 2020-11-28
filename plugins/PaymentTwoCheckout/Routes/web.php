<?php
use Illuminate\Support\Facades\Route;
Route::get('confirmTwoCheckout','TwoCheckoutController@handleCheckout')->middleware('auth');