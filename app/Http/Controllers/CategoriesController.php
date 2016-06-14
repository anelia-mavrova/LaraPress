<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function show($id)
    {
        $category = Category::find($id);
        $posts = $category->posts()
                          ->orderBy('created_at', 'DESC')
                          ->where('status', 'published')
                          ->get();

        return view('categories.show', compact('category', 'posts'));
    }
}
