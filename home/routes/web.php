<?php
use Illuminate\Support\Facades\Storage;
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
//前台首页
Route::get('/', 'SiteController@index');
//注册页面
Route::get('/reg', function(){
	
	return view('simple.register');
});
//注册动作
Route::post('/reg_act', 'SimpleController@reg_act')->middleware('regCheck');;
//登录页面
Route::get('/login', function(){
	return view('simple.login');
});
Route::post('/login_act','SimpleController@login_act');
Route::get('/jianli','ResumeaddController@index');
//退出账户
Route::get('/exit','SimpleController@_exit');

//QQ登录
Route::get('/auth/qq', 'SimpleController@qq');
Route::get('/auth/qq_callback', 'SimpleController@qq_callback');

//验证码
Route::get('/auth/geetest','SimpleController@getGeetest');