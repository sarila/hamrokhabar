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

Route::get('/', function () {
    return view('welcome');
});

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

	//Admin Profile
	Route::get('/profile', 'AdminController@adminProfile')->name('adminProfile');
	//Update Profile
	Route::post('/profile/update/{id}', 'AdminController@updateProfile')->name('updateProfile');
});

Route::get('/forget/password', 'AdminLoginController@forgetPassword')->name('forgetPassword');


