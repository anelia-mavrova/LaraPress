@extends('layouts.admin')
@section('content')
  <div class="card">
    <div class="card-title">
      <h3>
        <i class="fa fa-th-large fa-fw"></i>
        categories
      </h3>
    </div>
    <div class="card-body">
      <a href="{{ route('admin-new-category') }}" class="btn btn-primary btn-sm pull-left"
         data-toggle="tooltip"
         data-placement="bottom"
         title="Create New Category"
         @if(!\Auth::user()->admin)
           disabled="disabled"
         @endif
      >
        <i class="fa fa-plus"></i>
        New Category
      </a>
      <br class="clear">
      @if ($categories->count() > 0)
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Posts</th>
              <th>Dates</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $index => $category)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $category->name }}</td>
                <td>
                  {{ $category->posts()->count() }} posts
                </td>
                <td>
                  Created: {{ date('d M Y G:i', strtotime($category->created_at)) }} <br>
                  Last Modified: {{ date('d M Y G:i', strtotime($category->updated_at)) }}
                </td>
                <td>
                <a href="{{ route('admin-edit-category', [$category->id]) }}" 
                     class="btn btn-xs btn-info"
                     data-toggle="tooltip"
                     data-placement="bottom"
                     title="Edit Category"
                     @if(!\Auth::user()->admin)
                       disabled="disabled"
                     @endif
                  >
                    <i class="fa fa-edit"></i>
                  </a>
                  <a href="{{ route('admin-destroy-category', [$category->id]) }}" 
                     class="btn btn-xs btn-danger"
                     data-toggle="tooltip"
                     data-placement="bottom"
                     title="Delete Category"
                     @if(!\Auth::user()->admin)
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
        <h4>
          <i class="fa fa-frown-o"></i>
          There are no categories to display. Get creative.
        </h4>
      @endif
    </div>
  </div>
@stop
