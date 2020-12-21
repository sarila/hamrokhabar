<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForntendController extends Controller
{
    // Index Page
    public function index(){
        return view ('front.index');
    }
}
