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
 * @version 微信公众号授权登陆
 */
Route::any('/wxLogin', 'LoginController@wxIndex');


/**
 * @version 以下页面需要微信授权登陆后才有防伪权限 [<description>]
 */
Route::middleware(['checkLogin', 'beforeInit'])->group(function () {
	
	Route::get('/', 					'HomeController@index');				// 通过总公众号自由到访

	Route::get('/school/{idHash?}', 	'HomeController@index');				// 通过驾校公众号到访




});




Route::get('/appointment', 'AppointmentController@index');  	// 科一科四 预约考试



/**  汽车保养 **/
Route::get('/CarMaint', 'MaintController@index')->name('qcby');

/**  安全驾驶 **/
Route::get('/CarSecurity', 'MaintController@safeDriving')->name('aqjs');


/**
 * @version [<vector>] [< 科目一四 顺序练习 >]
 */
Route::get('/subject/plain/{sub}', 'PlainController@subject');



/**
 * @author pudding
 * @version 科目二
 */
Route::get('/sub2', 'SubjectController@sub2');



// 加密视频播放地址 
Route::get('/video/{id}', 'VideoController@video');



/** 后台使用。联动选择所属章节 **/
Route::get('/getSection', 'AdminApiController@getSection');
Route::get('/getSectionSec', 'AdminApiController@getSectionSec');


/** 设置城市和车型  **/
Route::post('/setCity', 'SetController@setCity');
Route::post('/setCars', 'SetController@setCars');