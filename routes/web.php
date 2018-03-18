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
Route::post('/register','UserController@requestRegister')->name('register_post');

Route::get('/forgot_password','UserController@forgotPassword')->name('forgot_password');
Route::get('/password/reset/{token?}', 'UserController@resetPassword');
Route::post('/password/email', 'UserController@sendResetLinkEmail')->name('password.email');
Route::post('/password/reset', 'UserController@saveNewPassword')->name('password.request');

//Challenge
Route::get('/challenge','InvestController@challenge')->name('challenge');
Route::post('/result','InvestController@checkResult')->name('submit_result');
Route::get('/member/result','InvestController@showResult')->name('show_result');

//Another page
Route::get('/tongquan','InvestController@tongquan')->name('tongquan');
Route::get('/doitac','InvestController@doitac')->name('doitac');