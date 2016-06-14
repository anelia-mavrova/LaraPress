@extends('layouts.admin')
@section('content')
  <div class="col-md-4 col-md-offset-4">
    <div class="card login">
      <div class="card-title">
        <h3>
          <i class="fa fa-lock"></i>
          Larapress Login
        </h3>
      </div>
      <div class="card-body">
        <form action="/admin/login" method="POST">
          <input type="hidden" name="_method" value="POST" />
          {{ csrf_field() }}
          <div class="form-group">
            <label for="email">E-mail</label>
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-fw fa-at"></i>
              </span>
              <input type="email"
                     name="email"
                     class="form-control"
                     placeholder="Your email address" 
                     required
              />
            </div>
          </div>
          <div class="form-group">
            <label for="password">Passoword</label>
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-fw fa-lock"></i>
              </span>
              <input type="password"
                     name="password"
                     class="form-control"
                     placeholder="Your password" 
                     required
              />
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-lg btn-primary pull-right">
              <i class="fa fa-lock"></i>
              Login
            </button>
          </div>
          <br class="clear">
        </form>
      </div>
    </div>
  </div>
@stop
