<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function adminLogin(){
    	return view('admin.login');
    }

    public function adminDashboard(){
    	return view('admin.dashboard');
    }
}
