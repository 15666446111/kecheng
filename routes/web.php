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





	Route::get('/sequence/plain/{sub}', 	'PlainController@subject');					// 科目一四 顺序练习 详情页面
	Route::get('/sequence/practice/{id}', 	'PlainController@practice');				// 科目一四 顺序练习 总练习
	Route::get('/sequence/chapter/{id}', 	'PlainController@subject');					// 科目一四 顺序练习 总练习



	Route::get('/super/{sub}', 				'SuperController@index');					// 超级攻略 - 章节列表
});




Route::get('/appointment', 'AppointmentController@index');  	// 科一科四 预约考试



/**  汽车保养 **/
Route::get('/CarMaint', 'MaintController@index')->name('qcby');

/**  安全驾驶 **/
Route::get('/CarSecurity', 'MaintController@safeDriving')->name('aqjs');



/**
 * @author pudding
 * @version 科目二
 */
Route::get('/sub2', 'SubjectController@sub2');



// 加密视频播放地址 
Route::get('/video/{id}', 'VideoController@video');





/** 后台使用。联动选择所属章节 **/
Route::get('/getSection', 		'AdminApiController@getSection');
Route::get('/getSectionSec', 	'AdminApiController@getSectionSec');

/** 后台使用 联动选择顺序练习的车型与章节  **/
Route::get('/getMaintains', 	'AdminApiController@getMaintain');

/** 后台使用 联动选择保过600题的车型与章节  **/
Route::get('/getMaintainsSix', 	'AdminApiController@getMaintainSix');

/** 后台使用 联动选择懒人速学  **/
Route::get('/getMaintainsLrsx',  'AdminApiController@getMaintainLrsx');

/** 后台使用 联动选择三力测试  **/
Route::get('/getMaintainsSan',  'AdminApiController@getMaintainSanli');



/** 设置城市和车型  **/
Route::post('/setCity', 'SetController@setCity');
Route::post('/setCars', 'SetController@setCars');