<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Province;
use Illuminate\Http\Request;

class NewsController extends Controller
{
	//Index Page
    public function index()
    {
        return view('admin.news.index');
    }

    //Add News

    public function addNews(){
    	$categories = Category::where(['parent_id' => 0])->get();

    	$categories_dropdown = "<option selected disabled> Select Category </option>";
    	foreach ($categories as $category) {
    		$categories_dropdown .= "<option value='".$category->id."'>".$category->category_name_np."</option>";
    		$sub_categories = Category::where(['parent_id' => $category->id])->get();
    		foreach ($sub_categories as $sub_category) {
    			$categories_dropdown .= "<option value='".$sub_category->id."'> &nbsp; &nbsp; |-> " .$sub_category->category_name_np."</option>";
    		}
    	}

    	$provinces = Province::all();

    	return view('admin.news.add', compact('categories_dropdown', 'provinces'));
    }
}
