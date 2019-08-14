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

Route::get('/', function () {
    return view('welcome');
});

Route::get('recharge', 'AppsController@recharge')->name('recharge');
Route::get('announcement', 'AppsController@announcement')->name('announcement');
Route::get('hotel', 'AppsController@hotel')->name('hotel');
Route::get('profile', 'AppsController@profile')->name('profile');
Route::get('signup', 'UsersController@create')->name('signup');
Route::resource('users', 'UsersController');
Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');
Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::get('payment/payzcy', 'PaymentController@payzcy')->name('payment.payzcy');
Route::get('payment/notifyzcy', 'PaymentController@notifyzcy')->name('payment.notifyzcy');
Route::get('payment/returnzcy', 'PaymentController@returnzcy')->name('payment.returnzcy');
Route::get('cn2014', 'HgdbController@cn2014')->name('cn2014');
