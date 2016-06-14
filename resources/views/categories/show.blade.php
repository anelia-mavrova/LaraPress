@extends('layouts.front')

@section('content')
  @foreach($posts as $post)
    @include('posts.partials.post')
  @endforeach
@stop
