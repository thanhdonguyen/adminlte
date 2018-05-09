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

Route::get('/', ['as' => 'login', 'uses' => 'LoginController@getLogin']);
Route::post('/', ['as' => 'postLogin', 'uses' => 'LoginController@postLogin']);
Route::get('register', ['as' => 'register', 'uses' => 'LoginController@getRegister']);
Route::post('register', ['as' => 'postRegister', 'uses' => 'LoginController@postRegister']);
Route::get('send-mail', ['as' => 'sendmail', 'uses' => 'LoginController@getSendmail']);
Route::post('send-mail', ['as' => 'postSenmail', 'uses' => 'LoginController@postSendmail']);
Route::get('reset/{token}', ['as' => 'resetpass', 'uses' => 'LoginController@getResetpass']);
Route::post('reset/{token}', ['as' => 'postResetpass', 'uses' => 'LoginController@postResetpass']);
Route::get('logout', ['as' => 'logout', 'uses' => 'LoginController@getLogout']);
Route::post('api/mail', ['as' => 'getApi', 'uses' => 'SendMailController@getApi']);
Route::group(['prefix' => 'admin', 'middleware' => 'adminlogin'], function () {
	Route::group(['prefix' => 'mail'], function () {
		Route::get(
			'home', [
				'as' => 'admin.mail.getmail',
				'uses' => 'SendMailController@getmail',
			]);
		Route::post(
			'home', [
				'as' => 'admin.mail.postmail',
				'uses' => 'SendMailController@postmail',
			]);
		Route::post(
			'addmail', [
				'as' => 'admin.mail.addMail',
				'uses' => 'SendMailController@postAddmail',
			]);
		Route::get(
			'editmail', [
				'as' => 'admin.mail.getEditMail',
				'uses' => 'SendMailController@getEditMail',
			]);
		Route::post(
			'editmail', [
				'as' => 'admin.mail.postEditMail',
				'uses' => 'SendMailController@postEditMail',
			]);
		Route::post(
			'delete-mail', [
				'as' => 'admin.mail.deleteMail',
				'uses' => 'SendMailController@postdeleteMail']);
		Route::get(
			'archive', [
				'as' => 'admin.mail.archive',
				'uses' => 'SendMailController@getArchive',
			]);
		Route::get(
			'read/{id}', [
				'as' => 'admin.mail.read',
				'uses' => 'SendMailController@getRead',
			]);
		Route::get(
			'count', [
				'as' => 'admin.mail.getCount',
				'uses' => 'SendMailController@getCount',
			]);
		Route::get(
			'delete/{id}', [
				'as' => 'admin.mail.getDelete',
				'uses' => 'SendMailController@getDelete',
			]);

		Route::get('search', 'SendMailController@getSearch')->name('admin.search.get');
		Route::post('search', 'SendMailController@postSearch')->name('admin.search.post');
		Route::get('hospital', 'SendMailController@getCreate')->name('admin.hospital.create');
	});
});