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

Route::get('index', function () {
    return view('master');
});
Route::post('post',[
	'as'=>'post',
	'uses'=>'pageController@postData'
]);
Route::post('login',[
	'as'=>'login',
	'uses'=>'pageController@login'
]);
Route::get('register',function(){
	return view('register');
});
Route::get('view_login',function(){
	return view('login');
});
Route::get('logout',[
	'as'=>'logout',
	'uses'=>'pageController@logout'
]);
Route::get('infor',[
	'as'=>'infor',
	'uses'=>'pageController@getInfor'
]);
Route::post('updateInfor',[
	'as'=>'updateInfor',
	'uses'=>'pageController@updateInfor'
]);
Route::post('updatePass',[
	'as'=>'updatePass',
	'uses'=>'pageController@updatePass'
]);