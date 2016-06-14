@extends('layouts.admin')
@section('content')
  <div class="card">
    <div class="card-title">
      <h3>
        <i class="fa fa-plus"></i>
        New Category
      </h3>
    </div>
    <div class="card-body">
      <form action="{{ action('AdminCategoriesController@store') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text"
                     name="name"
                     class="form-control"
                     placeholder="Category name"
                     required
              >
            </div>
            <div class="form-group">
              <a href="{{ route('admin-categories') }}" class="btn btn-default pull-left">
                <i class="fa fa-arrow-left"></i>
                Back
              </a>
              <button class="btn btn-lg btn-success pull-right" 
                      type="submit"
                      data-toggle="tooltip"
                      data-placement="bottom"
                      title="Save Category"
              >
                <i class="fa fa-save"></i>
                Save
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@stop
