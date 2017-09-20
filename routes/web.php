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