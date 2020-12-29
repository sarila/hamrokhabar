<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

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

   public function forgetPassword(Request  $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // Validate The Data
            $validateData = $request->validate([
                'email' => 'required'
            ]);
            // Check whether the email address exists or not
            $userCount = Admin::where('email', $data['email'])->count();
            if($userCount == 0){
                return redirect()->back()->with('error_message', 'Email does not exist in our database');
            }
            // Get User Details
            $userDetails = Admin::where('email', $data['email'])->first();
            // Generate a Random password
            $random_password = Str::random(10);
            // Encode The password
            $new_password = bcrypt($random_password);
            // Update The Password
            Admin::where('email', $data['email'])->update(['password' => $new_password]);
            // Sending the Email
            $email = $data['email'];
            $name = $userDetails->firstname;
            $messageData = ['email' => $data['email'], 'password' => $random_password, 'name' => $name];
            Mail::send('emails.forgetpassword', $messageData, function($message) use ($email){
               $message->to($email)->subject('New Password Change for News Portal');
            });
            return redirect()->back()->with('info_message', 'Please check your email for a new password');
        }
        return view ('admin.forget_password');
    }

    //Logout
    public function adminLogout(){
        Auth::guard('admin')->logout();
        Session::flash('info_message', 'Logout Successful');
    	return redirect()->route('admin.login');
    }

}
