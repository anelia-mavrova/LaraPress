<article>
  <header>
    <h2>{{ $post->title }}</h2>
  </header>
  <section>
    {!! str_limit($post->content, 450) !!}
    <br class="clear">
    <a href="{{ route('post', [$post->id]) }}"
       class="btn btn-primary pull-right"
    >
      Read Post
      <i class="fa fa-arrow-right"></i>
    </a>
  </section>
  <footer>
    <i class="fa fa-user"></i>
    {{ $post->author->name }} {{ $post->author->surname }}
    <br>
    <i class="fa fa-calendar"></i>
    {{ date('d M Y G:i', strtotime($post->created_at)) }}
  </footer>
</article>
