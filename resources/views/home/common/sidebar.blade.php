<h4>Categories:</h4>
@foreach(App\Category::all() as $category)
  <a href="{{ route('category', [$category->id]) }}">
    {{ $category->name }}
    <small>({{ $category->posts()->count() }} posts)</small>
  </a><br>
@endforeach

<h4>Authors:</h4>
@foreach(App\User::all() as $user)
  <a href="{{ route('author', [$user->id]) }}">
    {{ $user->name }} {{ $user->surname }}
    <small>({{ $user->posts()->count() }} posts)</small>
  </a><br>
@endforeach

<h4>Authors:</h4>
<a href="{{ route('admin-login') }}"
   class="btn btn-sm btn-primary"
>
  <i class="fa fa-sign-in"></i>
  Log in
  </a>

<h4>Sign Up</h4>
@include('home.common.signup')
