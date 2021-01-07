<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use App\Notifications\NewComment;

class CommentController extends Controller
{
    public function addComment(Request $request){
    	$message = $request->all();
    	$user = Admin::first();
    	$user->notify(new NewComment($request->comment));
    	return redirect()->back();
    }
}
