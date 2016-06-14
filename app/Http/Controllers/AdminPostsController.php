<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use App\Http\Requests\AdminCreatePostRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminsController;

class AdminPostsController extends AdminsController
{
    /**
     * Gets all posts from the database and renders the view
     *
     * @return View
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->get();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Displays new post page
     *
     * @return View
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Saves new post to the database
     *
     * @param AdminCreatePostRequest $request
     * @return Redirect
     */
    public function store(AdminCreatePostRequest $request)
    {
        $post = new Post;
        $post->user_id = \Auth::user()->id;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->status = $request->status;
        $post->content = $request->content;
        $post->save();

        session()->flash('success', 'The post was successfully created.');

        return redirect(route('admin-posts'));
    }

    /**
     * Find post with id and display edit post page
     *
     * @param mixed $id
     * @return View
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if (!$this->checkUserPriviliges($post))
            return redirect(route('admin-posts'));

        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Updates post info if the current user has priviliges to do so
     *
     * @param mixed $id
     * @param AdminCreatePostRequest $request
     * @return Redirect
     */
    public function update($id, AdminCreatePostRequest $request)
    {
        $post = Post::find($id);

        if ($this->checkUserPriviliges($post))
        {
            $post->update($request->all());

            session()->flash('success', 'The post was successfully updated.');
        }

        return redirect(route('admin-posts'));
    }

    /**
     * Deletes a post entry from the database if the current user
     * has the privileges to do so
     *
     * @param mixed $id
     * @return Redirect
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if ($this->checkUserPriviliges($post))
        {
            Post::destroy($id);

            session()->flash('success', 'The post was successfully deleted.');
        }

        return redirect(route('admin-posts'));
    }

    /**
     * Checks if a post belongs to the current user or the current
     * user is an admin to give privileges to operate with the post
     *
     * @param mixed $post
     */
    private function checkUserPriviliges($post)
    {
        if (!$post->belongsToUser() && !\Auth::user()->admin)
        {
            session()->flash('error', 
                'You no priviliges to perform this operation.');

            return false;
        }

        return true;
    }
}
