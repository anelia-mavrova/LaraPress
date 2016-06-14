<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>LaraPress</title>
  <link rel="stylesheet" href="/css/app.css">
</head>
<body>
  <div class="heading">
    <h1 align="center">
      LaraPress
    </h1>
    <h3 align="center">The Laravel Blog Engine</h3>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        @include('admin.partials.alerts')
      </div>
      <div class="col-sm-3">
        @include('home.common.sidebar')
      </div>
      <div class="col-sm-9">
        @yield('content')
      </div>
    </div>
  </div>
</body>
</html>
