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

Route::get('/',['as'=>'login','uses'=>'LoginController@getLogin']);
Route::post('/',['as'=>'postLogin','uses'=>'LoginController@postLogin']);
Route::get('register',['as'=>'register','uses'=>'LoginController@getRegister']);
Route::post('register',['as'=>'postRegister','uses'=>'LoginController@postRegister']);
Route::get('send-mail',['as'=>'sendmail','uses'=>'LoginController@getSendmail']);
Route::post('send-mail',['as'=>'postSenmail','uses'=>'LoginController@postSendmail']);
Route::get('reset/{token}',['as'=>'resetpass','uses'=>'LoginController@getResetpass']);
Route::post('reset/{token}',['as'=>'postResetpass','uses'=>'LoginController@postResetpass']);
Route::get('logout',['as'=>'logout','uses' => 'LoginController@getLogout']);
Route::post('api/mail',['as'=>'getApi','uses'=>'SendMailController@getApi']);
Route::group(['prefix'=>'admin','middleware'=>'adminlogin'],function (){
	Route::group(['prefix'=>'mail'],function(){
		Route::get(
			'home',['as'=>'admin.mail.getmail','uses'=>'SendMailController@getmail']);
		Route::post(
			'home',['as'=>'admin.mail.postmail','uses'=>'SendMailController@postmail']);
		Route::post(
			'addmail',['as'=>'admin.mail.addMail','uses'=>'SendMailController@postAddmail']);
		Route::get(
			'editmail',['as'=>'admin.mail.getEditMail','uses'=>'SendMailController@getEditMail']);
		Route::post(
			'editmail',['as'=>'admin.mail.postEditMail','uses'=>'SendMailController@postEditMail']);
		Route::get(
			'sent',['as'=>'admin.mail.sent','uses'=>'SendMailController@getsent']);
		Route::get(
			'read',['as'=>'admin.mail.read','uses'=>'SendMailController@getread']);
		});
	});