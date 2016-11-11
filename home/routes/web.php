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
//前台首页
Route::get('/', 'SiteController@index');
//注册页面
Route::get('/reg', function(){
	return view('simple.register');
});
//注册动作
Route::post('/reg_act', 'SimpleController@reg_act');
//登录页面
Route::get('/login', function(){
	return view('simple.login');
});