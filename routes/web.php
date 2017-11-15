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

Auth::routes();

Route::get('/', 'SubscriberController@create');

// Need to be renoved from routes in the end
Route::resource('subscriber','SubscriberController');

Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

Route::post('verify/phone_number', 'Auth\RegisterController@sendOTP')->name('user.phonenumber.submit');
Route::get('cancel-otp', 'Auth\RegisterController@cancelOTP');
Route::get('resend-otp', 'Auth\RegisterController@resendOTP');
Route::post('verify/OTP', 'Auth\RegisterController@verifyOTP')->name('user.verifyOTP.submit');

Route::get('verify/{email}/{token}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone');

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function() {
    // Admin login routes
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    // Admin password reset routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});
