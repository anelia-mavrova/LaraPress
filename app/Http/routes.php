<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

get('/', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

get('categories/{id}', [
    'as' => 'category', 
    'uses' => 'CategoriesController@show'
]);

get('authors/{id}', [
    'as' => 'author',
    'uses' => 'AuthorsController@show'
]);

get('posts/{id}', [
    'as' => 'post',
    'uses' => 'PostsController@show'
]);

Route::group(['prefix' => 'admin'], function()
{
    get('/', function() 
    {
        return redirect(route('admin-posts'));
    });

    get('login',[
        'as' => 'admin-login',
        'uses' => 'AdminsController@login'
    ]);
    get('logout', 'AdminsController@logout');

    post('login', 'AdminsController@postLogin');
    post('signup', 'AdminsController@signup');

    Route::group(['prefix' => 'posts'], function()
    {
        get('/', [
            'as' => 'admin-posts',
            'uses' => 'AdminPostsController@index'
        ]);

        get('create', [
            'as' => 'admin-new-post',
            'uses' => 'AdminPostsController@create'
        ]);

        get('{id}/edit', [
            'as' => 'admin-edit-post',
            'uses' => 'AdminPostsController@edit'
        ]);

        get('{id}/destroy', [
            'as' => 'admin-destroy-post',
            'uses' => 'AdminPostsController@destroy'
        ]);

        post('store', 'AdminPostsController@store');

        put('{id}/update', 'AdminPostsController@update');
    });

    Route::group(['prefix' => 'categories'], function()
    {
        get('/', [
            'as' => 'admin-categories',
            'uses' => 'AdminCategoriesController@index'
        ]);

        get('create', [
            'as' => 'admin-new-category',
            'uses' => 'AdminCategoriesController@create'
        ]);

        get('{id}/edit', [
            'as' => 'admin-edit-category',
            'uses' => 'AdminCategoriesController@edit'
        ]);

        get('{id}/destroy', [
            'as' => 'admin-destroy-category',
            'uses' => 'AdminCategoriesController@destroy'
        ]);

        post('store', 'AdminCategoriesController@store');

        put('{id}/update', 'AdminCategoriesController@update');
    });

    Route::group(['prefix' => 'users'], function()
    {
        get('/', [
            'as' => 'admin-users',
            'uses' => 'AdminUsersController@index'
        ]);   
    });

});
