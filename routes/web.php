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
Route::match(['get', 'post'], '/admin/login', 'AdminLoginController@adminLogin')->name('admin.login');
//admin dashboard

Route::group(['middleware' => 'admin'], function(){
	Route::match(['get', 'post'], '/admin/dashboard', 'AdminLoginController@adminDashboard')->name('admin.dashboard');	
});

//admin logout
Route::get('/admin/logout', 'AdminLoginController@adminLogout')->name('admin.logout');
