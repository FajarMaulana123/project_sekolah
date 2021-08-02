<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">  
  <title>Admin Super</title>
  @include('partials.css')
  </head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
  	@include('partials.navbar')

  	@include('partials.sidebar')

  	@yield('content')

  </div>
   @include('partials.js')
   @yield('js')
</body>
</html>