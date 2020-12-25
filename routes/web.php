<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/', 'ForntendController@index')->name('index');
//login route
Route::match(['get', 'post'], '/login', 'AdminLoginController@adminLogin')->name('admin.login');

Route::prefix('/admin')->group(function(){
    Route::group(['middleware' => 'admin'], function (){
    	//for admin dashboard
		Route::get('/dashboard', 'AdminLoginController@adminDashboard')->name('adminDashboard');	

	});
	//admin logout
	Route::get('/logout', 'AdminLoginController@adminLogout')->name('admin.logout');

	//Admin Password
	Route::get('/profile/password', 'AdminController@changePassword')->name('changePassword');
	//Check current Password
	Route::post('/profile/check-password', 'AdminController@checkPassword');
	//Update Password
	Route::post('/profile/update/password/{id}', 'AdminController@updatePassword')->name('updatePassword');
	//Settings
	Route::get('/setting', 'SettingController@index')->name('setting');
	//updateSettings
	Route::post('/setting/update/{id}', 'SettingController@updateSetting')->name('updateSetting');
	//Theme
	Route::get('/setting/theme', 'SettingController@theme')->name('theme');
	//Update Theme
	Route::post('/theme/update/{id}', 'SettingController@updateTheme')->name('updateTheme');
	//Social Settings
	Route::get('/setting/social', 'SettingController@social')->name('social');
	//Update Social Setting
	Route::post('/social/update/{id}', 'SettingController@socialSettingUpdate')->name('socialSettingUpdate');
	//Admin Profile
	Route::get('/profile', 'AdminController@adminProfile')->name('adminProfile');
	//Update Profile
	Route::post('/profile/update/{id}', 'AdminController@updateProfile')->name('updateProfile');
	//Category
	Route::get('/category', 'CategoryController@index')->name('category');
	Route::get('/category/add', 'CategoryController@addCategory')->name('addCategory');
	Route::post('category/add', 'CategoryController@storeCategory')->name('storeCategory');
	Route::get('/category/show/{id}', 'CategoryController@showCategory')->name('showCategory');
	//for category Datatables
	Route::get('/category/Datatable', 'CategoryController@dataTable')->name('dataTable');
	Route::get('/category/edit/{id}', 'CategoryController@editCategory')->name('editCategory');
	Route::post('/category/edit/{id}', 'CategoryController@updateCategory')->name('updateCategory');

});

Route::get('/forget/password', 'AdminLoginController@forgetPassword')->name('forgetPassword');


