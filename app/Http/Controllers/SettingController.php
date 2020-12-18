<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index(){
    	$setting = Setting::all();
    	return view('admin.setting', compact('setting'));

    }
}
