@extends('layouts.admin')
@section('content')
  <div class="card">
    <div class="card-title">
      <h3>
        <i class="fa fa-users"></i>
        users
      </h3>
    </div>
    <div class="card-body">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Dates</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $index => $user)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>
                {{ $user->name }} {{ $user->surname }}
              </td>
              <td>
                {{ $user->email }}
              </td>
              <td>
                <span class="label label-info">
                  @if($user->admin)
                    Administrator
                  @else
                    Author
                  @endif
                </span>
              </td>
              <td>
                Created: {{ date('d M Y G:i', strtotime($user->created_at)) }}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@stop
