<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use DataTables;


class CategoryController extends Controller
{
    public function index(){
    	$categories = Category::all();
    	return view('admin.category.index', compact('categories'));
    }

    public function addCategory(){
    	$categories = Category::where('parent_id', '0')->get();
    	return view('admin.category.add',compact('categories'));
    }

    public function storeCategory(Request $request){
    	$data = $request->all();
    	$validateData = $request->validate([
    		'category_name' => 'required',
    		'category_name_np'=> 'required'
    	]); 
    	$category = new Category();
    	$category->parent_id = $data['parent_id'];
    	$category->category_name = $data['category_name'];
    	$category->category_name_np = $data['category_name_np'];
    	$category->slug = Str::slug($data['category_name']);
    	$category->seo_title = $data['seo_title'];
    	$category->seo_subtitle = $data['seo_subtitle'];
    	$category->seo_description = $data['seo_description'];
    	$category->keywords = $data['keywords'];
    	$category->save();
    	Session::flash('info_message', 'Category has been Added');
    	return redirect()->route('category');
    }

    public function dataTable(){
    	$model = Category::latest()->get();
    	return DataTables::of($model)
        ->addColumn('action', function ($model){
            return view ('admin.category.actions', [
                'model' => $model,
                'url_show' => route('showCategory', $model->id),
                'url_edit' => route('editCategory', $model->id),
            ]);
        })
        ->editColumn('parent_id', function($model){
        	if($model->parent_id == 0){
        		return "Main Category";
        	} else {
        		return $model->subCategory->category_name;
        	}
        })
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->make(true);
    }

    public function showCategory($id){
    	$model = Category::Findorfail($id);
    	return view('admin.category.show', compact('model'));
    }

    public function editCategory($id){
    	$category = Category::Findorfail($id);
    	$categories = Category::where('parent_id', '0')->get();
    	return view('admin.category.edit', compact('category', 'categories'));
    }

    public function updateCategory(Request $request, $id){
    	$data = $request->all();
    	$validateData = $request->validate([
    		'category_name' => 'required',
    		'category_name_np'=> 'required'
    	]); 
    	$category = Category::Findorfail($id);
    	$category->parent_id = $data['parent_id'];
    	$category->category_name = $data['category_name'];
    	$category->category_name_np = $data['category_name_np'];
    	$category->slug = Str::slug($data['category_name']);
    	$category->seo_title = $data['seo_title'];
    	$category->seo_subtitle = $data['seo_subtitle'];
    	$category->seo_description = $data['seo_description'];
    	$category->keywords = $data['keywords'];
    	$category->save();
    	Session::flash('info_message', 'Category has been Updated Successfully');
    	return redirect()->route('category');
    }
}
