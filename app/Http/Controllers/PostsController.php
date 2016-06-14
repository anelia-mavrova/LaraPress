<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }
}
