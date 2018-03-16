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

Route::get('/','InvestController@homepage')->name('home');
Route::get('/updateData','InvestController@updateData')->name('updateData');

//Member
Route::get('/login','UserController@login')->name('login');
Route::post('/login','UserController@loginPost')->name('loginPost');

Route::get('/register','UserController@register')->name('register');
Route::post('/register','UserController@requestRegister');

Route::get('/forgot_password','AdminController@forgotPassword')->name('forgot_password');
Route::get('/password/reset/{token?}', 'AdminController@resetPassword');
Route::post('/password/email', 'AdminController@sendResetLinkEmail')->name('password.email');
Route::post('/password/reset', 'AdminController@saveNewPassword')->name('password.request');

