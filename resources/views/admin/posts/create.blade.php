@extends('layouts.admin')
@section('content')
  <div class="card">
    <div class="card-title">
      <h3>
        <i class="fa fa-plus"></i>
        New Post
      </h3>
    </div>
    <div class="card-body">
      <form action="{{ action('AdminPostsController@store') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-sm-4">
            {{-- POST TITLE --}}
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text"
                     name="title"
                     class="form-control"
                     placeholder="The post title" 
              />
            </div>
            {{-- POST CATEGORY --}}
            <div class="form-group">
              <label for="category">Category</label>
              <select name="category_id" class="form-control">
                <option value="">Select Category</option>
                @foreach (App\Category::all() as $category)
                  <option value="{{ $category->id }}">
                    {{ $category->name }}
                  </option>
                @endforeach
              </select>
            </div>
            {{-- POST STATUS --}}
            <div class="form-group">
              <label for="status">Status</label>
              <select name="status" class="form-control">
                <option value="">Select Post Status</option>
                <option value="published">Published</option>
                <option value="draft">Draft</option>
              </select>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="form-group">
              <label for="content">Content</label>
              <textarea name="content" 
                        cols="30" 
                        rows="10"
                        class="tinymce form-control"
              ></textarea>
            </div>
          </div>
          <div class="col-sm-12">
            <a href="{{ route('admin-posts') }}" class="btn btn-default pull-left">
              <i class="fa fa-arrow-left"></i>
              Back
            </a>
            <button class="btn btn-success btn-lg pull-right"
                    data-toggle="tooltip"
                    data-placement="bottom"
                    title="Save Post">
              <i class="fa fa-save"></i>
              Save
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
@stop
