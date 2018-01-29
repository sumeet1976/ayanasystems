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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('mail', 'PagesController@SendMail');

Route::get('', 'PagesController@Home');
Route::get('about', 'PagesController@About');
Route::get('career', 'PagesController@Career');
Route::get('service/{id}', 'PagesController@Service');

Route::get('admin/welcome', 'AdminController@Home');
Route::get('admin/service/{id}', 'AdminController@Service');
Route::get('admin/services', 'AdminController@Services');
Route::get('admin/about', 'AdminController@About');
Route::get('admin/leaders', 'AdminController@Leaders');
Route::get('admin/leader/edit/{id}', 'AdminController@LeaderEdit');
Route::get('admin/banner', 'AdminController@Banner');
Route::get('admin/banner/edit/{id}', 'AdminController@BannerEdit');
Route::get('admin/request/{type}', 'AdminController@Query');
Route::get('resume/{file}', 'AdminController@Resume');
Route::get('admin/welcome_message', 'AdminController@WelcomeMessage');


Route::get('delete/{type}/{id}', 'AdminController@Delete');
Route::get('update/status/{type}/{id}/{status}', 'AdminController@ChangeStatus');

Route::match(['get', 'post'],'admin/add/{type}', 'AdminController@Add');
Route::match(['get', 'post'],'admin/setting', 'AdminController@Setting');

Route::get('admin/logout', 'AdminController@SignOut');
Route::get('admin', 'AdminController@Index');

Route::post('Query', 'PagesController@Quote');

Route::post('admin/service', 'AdminController@Service');
Route::post('admin/banner', 'AdminController@Banner');
Route::post('admin/leader', 'AdminController@Leaders');
Route::post('admin/greeting', 'AdminController@WelcomeMessage');
Route::post('admin/about', 'AdminController@About');
Route::post('admin/ValidateLogin', 'AdminController@ValidateLogin');
