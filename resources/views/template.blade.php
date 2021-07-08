<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>
  @include('partials.css')
  </head>
<body class="hold-transition sidebar-mini layout-fixed">
</body>
  <div class="wrapper">
  	@include('partials.navbar')

  	@include('partials.sidebar')

  	@yield('content')

  </div>
</html>
@include('partials.js')