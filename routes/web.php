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



Route::prefix('/admin')->group(function(){
    Route::group(['middleware' => 'admin'], function (){
    	//login route
		Route::match(['get', 'post'], '/admin/login', 'AdminLoginController@adminLogin')->name('admin.login');

    	//for admin dashboard
		Route::match(['get', 'post'], '/dashboard', 'AdminLoginController@adminDashboard')->name('admin.dashboard');	

	});
	//admin logout
	Route::get('/logout', 'AdminLoginController@adminLogout')->name('admin.logout');

});

Route::get('/forget/password', 'AdminLoginController@forgetPassword')->name('forgetPassword');

