@extends('layouts.admin')
@section('content')
  <div class="card">
    <div class="card-title">
      <h3>
        <i class="fa fa-edit"></i>
        Edit Post
      </h3>
    </div>
    <div class="card-body">
      <form action="{{ action('AdminPostsController@update', [$post->id]) }}" 
            method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT" />
        <div class="row">
          <div class="col-sm-4">
            {{-- POST TITLE --}}
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text"
                     name="title"
                     value="{{ $post->title }}"
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
                  <option value="{{ $category->id }}"
                          @if($category->id == $post->category_id)
                            selected="selected"
                          @endif
                  >
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
                <option value="published" 
                        @if($post->status == 'published')
                          selected="selected"
                        @endif
                >
                  Published
                </option>
                <option value="draft" 
                        @if($post->status == 'draft')
                          selected="selected"
                        @endif
                >
                  Draft
                </option>
                <option value="archived" 
                        @if($post->status == 'archived')
                          selected="selected"
                        @endif
                >
                  Archived
                </option>
              </select>
            </div>
          
          </div>
          <div class="col-sm-8">
            <div class="form-group">
              <label for="content">Content</label>
              <textarea name="content" 
                        cols="30" 
                        rows="10"
                        class="form-control tinymce"
              >{{$post->content}}</textarea>
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
@stop
