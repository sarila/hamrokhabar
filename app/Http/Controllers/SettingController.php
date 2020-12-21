<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\Theme;


class SettingController extends Controller
{
    public function index(){
    	$setting = Setting::first();
    	return view('admin.setting', compact('setting'));
    }

    public function updateSetting(Request $request, $id){
	    $setting = Setting::findOrFail($id);
        $validateData = $request->validate([
            'site_title' => 'required|max:255',
            'site_subtitle' => 'min:6',
            'phone_number' => 'required',
            'mobile_number' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);
        $data = $request->all();
        $setting->site_title = $data['site_title'];
        $setting->site_title_np = $data['site_title_np'];
        $setting->site_subtitle = $data['site_subtitle'];
        $setting->site_subtitle_np = $data['site_subtitle_np'];
        $setting->phone_number = $data['phone_number'];
        $setting->mobile_number = $data['mobile_number'];
        $setting->email = $data['email'];
        $setting->alternate_email = $data['alternate_email'];
        $setting->address = $data['address'];
        $setting->nirdesak = $data['nirdesak'];
        $setting->sampadak = $data['sampadak'];
        $setting->ads_number = $data['ads_number'];

        $setting->save();
        Session::flash('success_message', 'Settings has been updated successfully');
        return redirect()->back();
    }

    public function theme(){
        $theme = Theme::first();
        return view('admin.theme', compact('theme'));
    }

    public function updateTheme(Request $request, $id){
        $theme = Theme::first();
        if ($request->isMethod('post')) {
            $theme = Theme::first();
            $data = $request->all();
            $theme->website_name = $data['website_name'];
            $slug = Str::slug($data['website_name']);
            $currentDate = Carbon::now()->toDateString();

            if ($request->hasFile('header_logo')) {
                $image_tmp = $request->file('header_logo');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $slug . '-' . $currentDate . '.' . $extension;
                    $image_path = 'public/uploads/' . $filename;
                    // Resize Image Code
                    Image::make($image_tmp)->save($image_path);
                    // Store image name in products table
                    $theme->header_logo = $filename;
                }
            }

            $slug3 = Str::random(10);
            if ($request->hasFile('footer_logo')) {
                $image_tmp = $request->file('footer_logo');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $slug3 . '-' . $currentDate . '.' . $extension;
                    $image_path = 'public/uploads/' . $filename;
                    // Resize Image Code
                    Image::make($image_tmp)->save($image_path);
                    // Store image name in products table
                    $theme->footer_logo = $filename;
                }
            }

            $slug2 = "favicon";
            if ($request->hasFile('favicon')) {
                $image_tmp = $request->file('favicon');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $slug2 . '-' . $currentDate . '.' . $extension;
                    $image_path = 'public/uploads/' . $filename;
                    // Resize Image Code
                    Image::make($image_tmp)->save($image_path);
                    // Store image name in products table
                    $theme->favicon = $filename;
                }
            }
            $theme->save();
            Session::flash('success_message', 'Theme Settings has been saved successfully');
            return redirect()->back();
        }
    }
}
