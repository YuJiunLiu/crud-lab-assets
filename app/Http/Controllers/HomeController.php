<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
    	$posts = \App\Post::where('is_feature', 1)
    					 ->orderBy('created_at', 'DESC')
    					 ->paginate(5);
    	$data = ['posts' => $posts];				 
    	return view('home.index', $data);
    }
}
