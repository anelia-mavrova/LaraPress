@if (session('success'))
  <div class="alert alert-success">
    <i class="fa fa-thumbs-up"></i>
    {{ session('success') }}
  </div>
@endif
@if (session('error'))
  <div class="alert alert-danger">
    <i class="fa fa-thumbs-down"></i>
    {{ session('error') }}
  </div>
@endif
@if (count($errors->all()) > 0)
  <ul class="alert alert-danger">
    <i class="fa fa-thumbs-down"></i>
    <strong>ERROR!</strong>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif
