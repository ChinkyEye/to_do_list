<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>To-Do</title>
  <meta name="description" content="Library HTML Template">
  <meta name="keywords" content="industry, html">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{URL::to('/')}}/favicon.ico" rel="shortcut icon"/>
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{URL::to('/')}}/backend/css/all.min.css">
  <link rel="stylesheet" href="{{URL::to('/')}}/backend/plugins/pace-progress/themes/black/pace-theme-flat-top.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{URL::to('/')}}/backend/css/adminlte.min.css">
  <link rel="stylesheet" href="{{URL::to('/')}}/backend/css/toastr.min.css">
  <link rel="stylesheet" href="{{URL::to('/')}}/backend/css/style.back.css">
  <style type="text/css">
    *{
      font-size: 13px;
    }
  </style>
  @stack('style')
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    @include('user.main.header')
    @include('user.main.sidebar')
    <div class="content-wrapper">
      @yield('content')
    </div>
    @include('user.main.footer')
  </div>
  <script src="{{URL::to('/')}}/backend/js/jquery.min.js"></script>
  <script src="{{URL::to('/')}}/backend/js/bootstrap.bundle.min.js"></script>
  <script src="{{URL::to('/')}}/backend/plugins/pace-progress/pace.min.js"></script>
  <script src="{{URL::to('/')}}/backend/js/adminlte.js"></script>
  <script src="{{URL::to('/')}}/backend/js/demo.js"></script>
  <script src="{{URL::to('/')}}/backend/js/toastr.min.js"></script>
  <script src="{{URL::to('/')}}/backend/js/toggle.main.js"></script>
  @stack('javascript')
</body>
</html>


