<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Province;
use App\Models\Tag;
use Illuminate\Http\Request;
use Toastr;

class NewsController extends Controller
{
	//Index Page
    public function index()
    {
        return view('admin.news.index');
    }

    //Add News

    public function addNews(){

        $categoryCount = Category::count();
        if($categoryCount == 0){
            Toastr::error('Please Add Category First', 'Error');
            return redirect()->route('category');
        } else {

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

            $tags =  Tag::orderBy('name', 'ASC')->get();
        	return view('admin.news.add', compact('categories_dropdown', 'provinces', 'tags'));
        }
    }
}
