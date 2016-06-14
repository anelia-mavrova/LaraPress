@extends('layouts.front')
@section('content')
<article>
  <header>
    <h2>{{ $post->title }}</h2>
  </header>
  <section>
    {!! $post->content !!}
  </section>
  <footer>
    <i class="fa fa-user"></i>
    {{ $post->author->name }} {{ $post->author->surname }}
    <br>
    <i class="fa fa-calendar"></i>
    {{ date('d M Y G:i', strtotime($post->created_at)) }}
  </footer>
</article>
@stop
