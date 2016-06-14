<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthorsController extends Controller
{
    public function show($id)
    {
        $author = User::find($id);
        $posts = $author->posts()
                        ->orderBy('created_at', 'DESC')
                        ->where('status', 'published')
                        ->get();

        return view('authors.show', compact('author', 'posts'));
    }
}
