@extends('layouts.admin')
@section('content')
  <div class="card">
    <div class="card-title">
      <h3>
        <i class="fa fa-files-o"></i>
        posts
      </h3>
    </div>
    <div class="card-body">
      <a href="{{ route('admin-new-post') }}" class="btn btn-primary btn-sm pull-left"
              data-toggle="tooltip"
              data-placement="bottom"
              title="Create New Post">
        <i class="fa fa-plus"></i>
        New Post
      </a>
      <br class="clear">
      @if ($posts->count() > 0)
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Category</th>
              <th>Status</th>
              <th>Author</th>
              <th>Dates</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($posts as $index => $post)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $post->title }}</td>
                <td>
                  <span class="label label-primary">
                    {{ $post->category->name }}
                  </span>
                </td>
                <td>
                  <span class="label {{ $post->getStatusLabelClass() }}">
                    {{ $post->status }}
                  </span>
                </td>
                <td>{{ $post->author->name }} {{ $post->author->surname }}</td>
                <td>
                  Created: {{ date('d M Y G:i', strtotime($post->created_at)) }}<br>
                  Last Edited: {{ date('d M Y G:i', strtotime($post->updated_at)) }}
                </td>
                <td>
                  <a class="btn btn-info btn-xs"
                     href="{{ route('admin-edit-post', [$post->id]) }}"
                     data-toggle="tooltip"
                     data-placement="bottom"
                     title="Edit Post"
                     @if(!$post->belongsToUser() && !\Auth::user()->admin)
                       disabled="disabled"
                     @endif
                  >
                    <i class="fa fa-edit"></i>
                  </a>
                  <a href="{{ route('admin-destroy-post', [$post->id]) }}"
                     class="btn btn-danger btn-xs"
                     data-toggle="tooltip"
                     data-placement="bottom"
                     title="Delete Post"
                     @if(!$post->belongsToUser() && !\Auth::user()->admin)
                       disabled="disabled"
                     @endif
                  >
                    <i class="fa fa-trash"></i>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @else
        <h4 align="center">
          <i class="fa fa-frown-o"></i>
          There are no posts to display. Get creative.
        </h4>
      @endif
    </div>
  </div>
@stop
