<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests;
use App\Http\Requests\AdminCreateCategoryRequest;
use App\Http\Requests\AdminUpdateCategoryRequest;
use App\Http\Controllers\Controller;

class AdminCategoriesController extends AdminsController
{
    /**
     * Gets categories from the database and displays them
     *
     * @return View
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Display new category page
     *
     * @return View
     */
    public function create()
    {
        if (!\Auth::user()->admin)
            return $this->redirectUserIfNotAdmin();

        return view('admin.categories.create');
    }

    public function store(AdminCreateCategoryRequest $request)
    {
        if (!\Auth::user()->admin)
            return $this->redirectUserIfNotAdmin();

        Category::create($request->all());

        session()->flash('success', 'The category was saved.');

        return redirect(route('admin-categories'));
    }

    public function edit($id)
    {
        if (!\Auth::user()->admin)
            return $this->redirectUserIfNotAdmin();

        $category = Category::find($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update($id, AdminUpdateCategoryRequest $request)
    {
        if (!\Auth::user()->admin)
            return $this->redirectUserIfNotAdmin();

        $category = Category::find($id);
        $category->update($request->all());

        session()->flash('success', 'The category was updated.');

        return redirect(route('admin-categories'));
    }

    public function destroy($id)
    {
        if (!\Auth::user()->admin)
            return $this->redirectUserIfNotAdmin();

        $category = Category::find($id);

        if ($category->posts()->count() > 0)
            return $this->redirectUserIfCategoryHasPosts();

        $category->posts()->delete();
        $category->delete();

        session()->flash('success', 'The category was deleted.');

        return redirect(route('admin-categories'));
    }

    private function redirectUserIfCategoryHasPosts()
    {
        session()->flash('error', 
            'The category has associated posts and can not be deleted.
             Reassign all posts to other categories in order to proceed.');

        return redirect(route('admin-categories'));
    }

    private function redirectUserIfNotAdmin()
    {
        session()->flash('error', 
            'You have no privileges to work on this page.');

        return redirect(route('admin-categories'));
    }
}
