<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>{{ setting('site.title') }}</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('vendor/mdb/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{ asset('vendor/mdb/css/mdb.min.css') }}" rel="stylesheet">
  <style type="text/css">
    html,
    body,
    header,
    .view {
      height: 100%;
    }
  </style>
  @laravelPWA
</head>

<body class="medical-lp">

  <!--Navigation & Intro-->
  <header>
     @include('layouts.frontend.partials.header') 
      <!--bener content-->
      @yield('baner')
      <!--/baner content-->   
  </header>

  
  <!--Main content-->
  @yield('content')
  <!--/Main content-->

  <!--Footer-->
  @include('layouts.frontend.partials.footer')
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="{{ asset('vendor/mdb/js/jquery-3.4.1.min.js') }}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{ asset('vendor/mdb/js/popper.min.js') }}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{ asset('vendor/mdb/js/bootstrap.min.js') }}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{ asset('vendor/mdb/js/mdb.min.js') }}"></script>

  <!-- Custom scripts -->
  <script>

    // Animation init
    new WOW().init();

  </script>

</body>

</html>
