<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*USER ROUTE*/
Route::get('/',function(){
	return View::make('user.index');
});
Route::post('/', array('uses'=>'UserController@submit_search'));
Route::get('about', array('uses'=>'UserController@get_about'));
Route::get('article', array('uses'=>'UserController@get_article'));
Route::get('search', array('uses'=>'UserController@get_search'));
/*----------*/

/*ADMIN ROUTE*/
Route::group(array('prefix'=>'master','before'=>'admin'),function(){
	Route::get('/', array('uses'=>'AdminController@index'));

	// Basic Proses
	Route::get('/wizard-crawl',function(){
		return View::make('admin.basic.wizard_crawl');
	});
	Route::post('/wizard-crawl', array('uses'=>'AdminController@post_wizard_crawling'));
	Route::get('/wizard-scrap', array('uses'=>'AdminController@get_wizard_scrapping'));
	Route::get('/wizard-classify', array('uses'=>'AdminController@get_wizard_classifying'));
	Route::post('/wizard-classify/upload',array('uses'=>'AdminController@upload_data_training'));
	Route::get('/wizard-report', array('uses'=>'AdminController@get_wizard_report'));

	// Advance Proses
	Route::get('/crawling',array('uses'=>'AdminController@get_advance_crawling'));
	Route::post('/crawling',array('uses'=>'AdminController@post_advance_crawling'));
	Route::get('/scraping',array('uses'=>'AdminController@get_advance_scraping'));
	Route::post('/scraping',array('uses'=>'AdminController@post_advance_scraping'));
	Route::get('/classifying',array('uses'=>'AdminController@get_advance_classifying'));
	Route::post('/classifying',array('uses'=>'AdminController@post_advance_classifying'));

	// Report
	Route::get('/acc-report',array('uses'=>'AdminController@get_acc_report'));
	Route::get('/det-report',array('uses'=>'AdminController@get_det_report'));

	// Setting
	Route::get('/setting', array('uses'=>'AdminController@get_setting'));
	
	// Other
	Route::get('/api',array('uses'=>'AdminController@get_api'));
	Route::get('/about',array('uses'=>'AdminController@get_about'));
	// Logout
	Route::get('/logout', array('uses'=>'AdminController@get_logout'));
});
/*----------*/

/*Login*/
Route::get('login',array('uses'=>'LoginController@index'));
Route::post('login',array('uses'=>'LoginController@auth'));
/*-----*/

/* Test */
Route::get('update', array('uses'=>'TestController@get_update'));
Route::post('update', array('uses'=>'TestController@post_update'));
Route::get('classify', array('uses'=>'TestController@get_classify'));
Route::get('stem', array('uses'=>'TestController@get_stem'));
Route::get('scrap', array('uses'=>'TestController@get_scrap'));
Route::get('crawl', array('uses'=>'TestController@get_crawl'));
Route::get('lihat', array('uses'=>'TestController@get_lihat'));
