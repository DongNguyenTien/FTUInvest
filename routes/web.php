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
//Route::get('/updateData','FTU2019Controller@reshapeData')->name('updateData');
//Route::get('/test','FTU2019Controller@rawAns');

//Page lien quan
Route::get('/tong-quan','FTU2019Controller@tongquan')->name('tongquan');
//Route::post('/register','FTU2Controller@register')->name('register');
Route::get('/doi-tac','FTU2019Controller@doitac')->name('doitac');

//Challenge
Route::get('/thu-thach','FTU2019Controller@challenge')->name('challenge');
Route::post('/result','FTU2019Controller@checkResult')->name('submit_result');
Route::get('/ket-qua','FTU2019Controller@showResult')->name('show_result');
Route::post('/getExam','FTU2019Controller@getExam')->name('getExam');
Route::post('/verify', 'FTU2019Controller@verifyExam')->name('verify');


//Member
Route::get('/login','UserController@login')->name('login');
Route::post('/login','UserController@loginPost')->name('loginPost');
Route::get('/logout','UserController@logout')->name('logout');
Route::get('/dang-ky','UserController@register')->name('dangky');
Route::post('/register','UserController@requestRegister')->name('register');
Route::get('/forgot_password','UserController@forgotPassword')->name('forgot_password');
Route::get('/password/reset/{token?}', 'UserController@resetPassword');
Route::post('/password/email', 'UserController@sendResetLinkEmail')->name('password.email');
Route::post('/password/reset', 'UserController@saveNewPassword')->name('password.request');



/**
 * Admin
 **/

Route::get('/administrator','FTU2019Controller@administrator')->name('administrator.login');
Route::post('/administrator/action','FTU2019Controller@administratorAction')->name('administrator.action');
Route::get('/administrator/action','FTU2019Controller@viewAdminAction')->name('administrator.action.view');
Route::get('/administrator/logout', 'FTU2019Controller@adminLogout');

Route::get('/reset/password','FTU2019Controller@resetPassword')->name('administrator.reset');
Route::post('/reset/password','FTU2019Controller@resetPasswordPost')->name('administrator.reset.post');


Route::get('/ajax/member','FTU2019Controller@getListCandicate');

Route::post('/ajax/changePassword','FTU2019Controller@changePassword');
Route::get('/download/data','FTU2019Controller@exportExcel')->name('download_data');


//Route::get('/check/administrator','InvestController@testcase')->name('test');


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

