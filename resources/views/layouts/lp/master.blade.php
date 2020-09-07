<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

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
  <link rel="stylesheet" href="{{ asset('vendor/whatsapp/floating-wpp.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/up/css/floating-totop-button.css') }}">
  @laravelPWA

  {!! htmlScriptTagJsApi([
      'action' => 'homepage',
      'custom_validation' => 'myCustomValidation'
  ]) !!}
</head>

<body class="medical-lp">

    @yield('header')


    <!--Main content-->
    <main>
        @yield('main')
    </main>
    <!--/Main content-->

    @yield('footer')

  <div id="myWP"></div>
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
  <script src="{{ asset('vendor/whatsapp/floating-wpp.js') }}"></script>
  <script src="{{ asset('vendor/up/js/floating-totop-button.js') }}"></script>
  <script>

    // Animation init
    new WOW().init();

    // whatsapp ----------------------------------------------------------------------------------
    $('#myWP').floatingWhatsApp({
      phone: '{{ setting('whatsapp.phone') }}',
      popupMessage: '{{ setting('whatsapp.popupMessage') }}',
      message: '{{ setting('whatsapp.message') }}',
      showPopup: true,
      showOnIE: true,
      headerTitle: '{{ setting('whatsapp.headerTitle') }}',
      headerColor: '{{ setting('whatsapp.color') }}',
      backgroundColor: '{{ setting('whatsapp.color') }}',
      // buttonImage: '<img src="{{ Voyager::Image(setting('whatsapp.buttonImage' )) }}" />',
      position: '{{ setting('whatsapp.position') }}',
      // autoOpenTimeout: {{ setting('whatsapp.autoOpenTimeout') }},
      size: '{{ setting('whatsapp.size') }}'
    });

    // buttun up ----------------------------------------------------------------------
    $("body").toTopButton({
      // path to icons
      imagePath: 'vendor/up/img/icons/',
      // arrow, arrow-circle, caret, caret-circle, circle, circle-o, arrow-l, drop, rise, top
      // or your own SVG icon
      arrowType: 'arrow',
      // 'w' = white
      // 'b' = black
      iconColor: 'w',
      // icon shadow
      // from 1 to 16
      iconShadow: 6
    });

    $( "blockquote" ).addClass( "blockquote" );
  </script>

  @php
    $user_id = Auth::user() ? Auth::user()->id : '';
  @endphp

  <script src="{{ asset('js/app.js') }}"></script>
  <script>
    // Pedir autorización para mostrar notificaciones
    Notification.requestPermission();

    $('#btn-answer-call').click(function(e){
      $('.dark-mask').css('display', 'none');
      $('#btn-answer-call').removeAttr('href');
    });

    // ***WebSockets***
    // Escuchando los pedidos nuevo
    Echo.channel('IncomingCallChannel-{{ $user_id }}')
    .listen('IncomingCallEvent', (res) => {
        $('.dark-mask').css('display', 'flex');
        $('#btn-answer-call').attr('href', "{{ url('meet') }}/"+res.meet.id);
        $('#name-call').text(`${res.meet.especialista.prefix} ${res.meet.especialista.name} ${res.meet.especialista.last_name}`);
    });
  </script>

  <style>
    .dark-mask{
      position: fixed;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: rgba(0, 0, 0, 0.8);
      top: 0px;
      left: 0px;
      width: 100%;
      height: 100vh;
      z-index: 10000;
      display: none;
    }
    .img-call{
      width: 150px;
      border-radius: 75px;
      margin-bottom: 10px
    }
  </style>

  <div class="dark-mask text-center">
    <div id="div-call">
      <img src="{{ asset('storage/users/default.png') }}" class="img-call" alt="avatar">
      <h6 class="text-white">Llamada entrante</h6>
      <h3 class="text-white" id="name-call"></h3>
      <div class="mt-3">
        <a class="btn btn-danger btn-rounded font-weight-bold ml-lg-0 wow fadeInLeft" style="margin-right: 50px" data-wow-delay="0.3s"><span class="fa fa-times fa-2x"></span></a>
        <a id="btn-answer-call" class="btn btn-success btn-rounded font-weight-bold ml-lg-0 wow fadeInLeft" style="margin-left: 50px" data-wow-delay="0.3s"><span class="fa fa-phone fa-2x"></span></a>
      </div>
    </div>
  </div>

</body>

</html>
