<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
{
    public function adminLogin(Request $request){
    	//added user validation
    	if($request ->isMethod('POST')){
    		$data = $request->all();

    		$rules =[
    			'email' =>'required|email',
    			'password' => 'required',
    		];
    		$customMessages = [
    			'email.required' => 'E-Mail Address is required',
    			'email.valid' => 'Please enter valid email address',
    			'password.required' => 'Password is required'
    		];
    		//to validate email and password
    		$this->validate($request, $rules, $customMessages);

    		if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])){
    			return redirect()->route('adminDashboard');
    		}else{
    			Session::flash('error_message', 'Invalid Email or Password');
    			return redirect()->route('admin.login');
    		}

    	}else{
    		return view('admin.login');
    	} 	
    }

    public function adminDashboard(){
    	return view('admin.dashboard');
    }

    public function forgetPassword(){
        return view('admin.forget_password');
    }
    //Logout
    public function adminLogout(){
        Auth::guard('admin')->logout();
        Session::flash('info_message', 'Logout Successful');
    	return redirect()->route('admin.login');
    }

}
