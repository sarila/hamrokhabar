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

    //addTag
    public function addTag(){
    	$tag = Tag::latest()->get();
    	return view('admin.tag.add', compact('tag')); 	
    }

    //Store tag
    public function storeTag(Request $request){
    	$data = $request->all();
        $validateData = $request->validate([
            'name' => 'required',
        ]);
        $tagCount = Tag::where('name', $data['name'])->count();
        if ($tagCount > 0) {
            return redirect()->back()->with('error_message', 'Tag already exists in database');
        }
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
            'url_edit' => route('editTag', $model->id),
	    ]);
	})
	->addIndexColumn()
	->rawColumns(['action'])
	->make(true);
	}

    //Edit Tag
    public function editTag($id){
        $tag = tag::Findorfail($id);
        return view('admin.tag.edit', compact('tag'));
    }

    //Update Tag
    public function updateTag(Request $request, $id) {
        $data = $request->all();
        $validateData = $request->validate([
            'name' => 'required',
        ]);

        $tagCount = Tag::where('name', $data['name'])->where('id', '!=', $id)->count();
        if ($tagCount > 0) {
            return redirect()->back()->with('error_message', 'Tag name already exists in database');
        }

        $tag = Tag::findOrFail($id);
        $tag->name = ucwords(strtolower($data['name']));
        $tag->slug = Str::slug($data['name']);
        $tag->save();
        Session::flash('info_message', 'Tag has been updated successfully');
        return redirect()->route('tag');
    }
}
