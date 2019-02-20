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

/**
 * 2019
 */

Route::get('/','FTU2019Controller@homepage')->name('home');
Route::get('/updateData','InvestController@updateData')->name('updateData');

//Page lien quan
Route::get('/tong-quan','FTU2019Controller@tongquan')->name('tongquan');
Route::post('/register','FTU2Controller@register')->name('register');
Route::get('/doitac','FTU2019Controller@doitac')->name('doitac');

//Challenge
Route::get('/challenge','FTU2019Controller@challenge')->name('challenge');
Route::post('/result','FTU2019Controller@checkResult')->name('submit_result');
Route::get('/member/result','FTU2019Controller@showResult')->name('show_result');


//Member
Route::get('/login','UserController@login')->name('login');
Route::post('/login','UserController@loginPost')->name('loginPost');
Route::get('/logout','UserController@logout')->name('logout');
Route::get('/register','UserController@register')->name('register');
Route::post('/register','UserController@requestRegister')->name('register_post');
Route::get('/forgot_password','UserController@forgotPassword')->name('forgot_password');
Route::get('/password/reset/{token?}', 'UserController@resetPassword');
Route::post('/password/email', 'UserController@sendResetLinkEmail')->name('password.email');
Route::post('/password/reset', 'UserController@saveNewPassword')->name('password.request');



/**
 * Admin
 **/

Route::get('/administrator','InvestController@administrator')->name('administrator.login');

Route::get('/reset/password','InvestController@resetPassword')->name('administrator.reset');
Route::post('/reset/password','InvestController@resetPasswordPost')->name('administrator.reset.post');

Route::post('/administrator/action','InvestController@administratorAction')->name('administrator.action');
Route::get('/administrator/action','InvestController@viewAdminAction')->name('administrator.action.view');

Route::get('/ajax/member','InvestController@getListCandicate');

Route::post('/ajax/changePassword','InvestController@changePassword');
Route::get('/download/data','InvestController@exportExcel')->name('download_data');


Route::get('/check/administrator','InvestController@testcase')->name('test');


/**
 * 2018
 */
//Route::get('/','InvestController@homepage')->name('home');
//Route::get('/updateData','InvestController@updateData')->name('updateData');
//
////Member
//Route::get('/login','UserController@login')->name('login');
//Route::post('/login','UserController@loginPost')->name('loginPost');
//Route::get('/logout','UserController@logout')->name('logout');
//
//
//Route::get('/register','UserController@register')->name('register');
//Route::post('/register','UserController@requestRegister')->name('register_post');
//
//Route::get('/forgot_password','UserController@forgotPassword')->name('forgot_password');
//Route::get('/password/reset/{token?}', 'UserController@resetPassword');
//Route::post('/password/email', 'UserController@sendResetLinkEmail')->name('password.email');
//Route::post('/password/reset', 'UserController@saveNewPassword')->name('password.request');
//
////Challenge
//Route::get('/challenge','InvestController@challenge')->name('challenge');
//Route::post('/result','InvestController@checkResult')->name('submit_result');
//Route::get('/member/result','InvestController@showResult')->name('show_result');
//


//Route::get('/tong-quan','FTU2Controller@tongquan')->name('tongquan');
//Route::post('/register','FTU2Controller@register')->name('register');


////Another page
//Route::get('/tongquan2','InvestController@tongquan')->name('tongquan2');
//Route::get('/doitac','InvestController@doitac')->name('doitac');




//---------------------
//Route::post('/subscribe','Round2Controller@subscribe')->name("subscribe");
//Route::get('/mail','Round2Controller@readData');

