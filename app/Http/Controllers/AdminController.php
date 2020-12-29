<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use App\Models\Admin;



class AdminController extends Controller
{
   //change password
    public function changePassword(){
        $user = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        return view('admin.changepassword', compact('user'));
    }



    // Checking User Current Password
    public function checkPassword(Request $request)
    {
        $data = $request->all();
        $current_password = $data['current_password'];
        $user_id = Auth::guard('admin')->user()->id;
        $check_password = Admin::where('id', $user_id)->first();
        if (Hash::check($current_password, $check_password->password)) {
            return "true";
            die;
        } else {
            return "false";
            die;
        }
    }


    // Update Password
    public function updatePassword(Request $request, $id)
    {
        $validateData = $request->validate([
            'current_password' => 'required|max:255',
            'password' => 'min:6',
            'pass_confirmation' => 'required_with:password|same:password|min:6'
        ]);
        $user = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        $current_user_password = $user->password;
        $data = $request->all();
        if (Hash::check($data['current_password'], $current_user_password)) {
            $user->password = bcrypt($data['password']);
            $user->save();
            Session::flash('info_message', 'Password has been updated successfully');
            return redirect()->back();
        } else {
            Session::flash('error_message', 'Your current password does not match with our database');
            return redirect()->back();
        }
    }

    //Admin Profile
    public function adminProfile(){
        $user = Auth::guard('admin')->user();
        return view('admin.profile', compact('user'));
    }

    //Update Profile

    public function updateProfile(Request $request, $id){
        $rules = [
            'email' => 'required|email|max:255',
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'address' => 'required|max:255',
            'mobile' => 'required',
        ];
        $customMessages = [
            'email.required' => 'E-Mail Address is required',
            'email.email' => 'Please enter a valid email address',
            'email.max' => 'You are not allowed to enter more than 255 Characters',
            'first_name.required' => 'Please provide your first name',
            'first_name.max' => 'You are not allowed to enter more than 255 Characters',
            'last_name.required' => 'Please provide your last name',
            'last_name.max' => 'You are not allowed to enter more than 255 Characters',
            'address.required' => 'Please provide your address',
            'address.max' => 'You are not allowed to enter more than 255 Characters',
            'mobile.required' => 'Please provide your Mobile number',
        ];
        $this->validate($request, $rules, $customMessages);
        $user_id = Auth::guard('admin')->user()->id;
        $admin = Admin::findOrFail($user_id);
        $data = $request->all();
        $admin->firstname = ucwords(strtolower($data['firstname']));
        $admin->middlename = ucwords(strtolower($data['middlename']));
        $admin->lastname = ucwords(strtolower($data['lastname']));
        $admin->email = strtolower($data['email']);
        $admin->address = $data['address'];
        $admin->mobile = $data['mobile'];
        $admin->alternate_contact = $data['alternate_contact'];
        $random = Str::random(10);
        if ($request->hasFile('image')) {
            $image_tmp = $request->file('image');
            if ($image_tmp->isValid()) {
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/admin/profile/' . $filename;
                // Resize Image Code
                Image::make($image_tmp)->save($image_path);
                // Store image name in products table
                $admin->image = $filename;
            }
        }
        $admin->save();
        $image_path = 'public/uploads/admin/profile/';
        if ($data['current_image'] != "") {
            if (file_exists($image_path . $data['current_image'])) {
                if (!empty($data['image'])) {
                    if (file_exists($image_path . $admin->image)) {
                        unlink($image_path . $data['current_image']);
                    }
                }
            }
        }
        Session::flash('success_message', 'Profile has been updated successfully');
        return redirect()->back();
    }
}
