<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')
                     ->where('status', 'published')
                     ->take(20)
                     ->get();

        return view('home.index', compact('posts'));
    }
}
