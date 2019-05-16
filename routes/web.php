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

Route::get('index',[
	'as'=>'trangchu',
	'uses'=>'pageController@getIndex'
]);
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

Route::group(['prefix'=>'company'],function(){
	Route::get('comIndex/{username}','applyJobController@getComIndex');
	Route::group(['prefix'=>'jobPost'],function(){
		Route::get('allJob/{username}','jobPostController@getAllJob');
		Route::get('detailJob/{id}','jobPostController@getDetailJob');
		Route::get('updateJob/{id}','jobPostController@getUpdateJob');
		Route::post('updateJob/{id}','jobPostController@postUpdateJob');
		Route::get('postJob/{username}','jobPostController@getPostJob');
		Route::post('postJob','jobPostController@postPostJob');
		Route::get('deleteJob/{id}','jobPostController@getDeleteJob');
		Route::get('active/{id}','jobPostController@getActive');
		Route::post('active/{id}','jobPostController@postActive');
		Route::get('deactive/{id}','jobPostController@deactive');
	});

	
	Route::group(['prefix'=>'applyJob'],function(){
		Route::get('allApplyJob/{username}','applyJobController@getAllApplyJob');
		Route::post('updateState/{idJob}/{username}','applyJobController@postUpdateState');
		Route::get('ungVien/{username}','applyJobController@getUngVien');
		Route::get('searchUngVien','applyJobController@getsearchUngVien');
	});
	Route::group(['prefix'=>'ibox'],function(){
		Route::get('hopThuDen/{username}','pageController@getdetailmaildencompany');
		Route::get('hopThuDi/{username}','pageController@getdetailmaildicompany');
	});

});


Route::get('loai-viec/{type}',[
	'as'=>'loaiviec',
	'uses'=>'pageController@getTypeOfJob'
]);

Route::get('chi-tiet-viec/{id}',[
	'as' => 'chitietviec',
	'uses' => 'pageController@showJob'
]);

Route::get('apply-to-this-job/{id}',[
	'as' => 'applytothisjob',
	'uses' => 'pageController@store'
]);

Route::get('search-job',[
	'as'=>'searchjob',
	'uses' => 'pageController@searchjob'
]);
Route::get('sendmail','pageController@getMail');
Route::post('sendmail','pageController@postmail');
Route::get('autocomplete','pageController@autocomplete');
