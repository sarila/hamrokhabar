<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use DataTables;

class TagController extends Controller
{
    public function index(){
    	$tag = Tag::latest()->get();
    	return view('admin.tag.index', compact('tag'));
    }

    public function addTag(){
    	$tag = Tag::latest()->get();
    	return view('admin.tag.add', compact('tag')); 	
    }

    public function storeTag(Request $request){
    	$data = $request->all();
    	$tag = new Tag();
    	$tag->name = $data['name'];
    	$tag->slug = Str::slug($data['name']);
    	$tag->save();
    	Session::flash('info_message', 'Tag has been Added');
    	return redirect()->route('tag');
    }

	public function dataTable(){
	$model = Tag::latest()->get();
	return DataTables::of($model)
	->addColumn('action', function ($model){
	    return view ('admin.tag.actions', [
	        'model' => $model,

	    ]);
	})
	->addIndexColumn()
	->rawColumns(['action'])
	->make(true);
	}
}
