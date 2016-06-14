<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>LaraPress Administration</title>
  <link rel="stylesheet" href="/css/app.css" />
</head>
<body class="admin">
  @include('admin.partials.navbar')
  <div class="container-fluid">
    @include('admin.partials.alerts')
    @yield('content')
  </div>
  <script src="/js/vendor.js"></script>
  <script src="/js/app.js"></script>
</body>
</html>
