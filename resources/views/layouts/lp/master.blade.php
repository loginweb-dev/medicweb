<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#3E4551">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Plataforma web de Telemedicina">
    <meta name="keywords" content="medicina, telemedicina, internet">
    <meta name="author" content="LoginWeb@2020">
    <title>{{ setting('site.title') }}</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/mdb/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('vendor/mdb/css/mdb.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/mdb/css/mdb.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/mdb/css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('vendor/whatsapp/floating-wpp.css') }}">

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
    'custom_validation' => 'myCustomValidation',
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

    {{-- Tono de llamada --}}
    <audio loop id="tone-call-incoming" src="{{ url('audio/tone.mp3') }}" preload="auto"></audio>

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('vendor/mdb/js/jquery-3.4.1.min.js') }}">
    </script>
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

        $("blockquote").addClass("blockquote");

    </script>

    @php
    $user_id = Auth::user() ? Auth::user()->id : '';
    @endphp

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('vendor/whatsapp/floating-wpp.js') }}"></script>
    <script>
        // Pedir autorización para mostrar notificaciones
        Notification.requestPermission();

        // Responder llamada
        // $('#btn-answer-call').click(function(e){
        //   $('.dark-mask').css('display', 'none');
        //   $('#btn-answer-call').removeAttr('href');
        // });

        $(document).ready(function() {
            // Presionar desvío de llamada
            $('.btn-divert-call').click(function() {
                console.log('hi')
                $('.btn-actions').css('display', 'none');
                $('#form-divert-call').css('display', 'block');
            });

            // Desviar llamada
            $('#form-divert-call').submit(function(e) {
                e.preventDefault();
                $.post($(this).attr('action'), $(this).serialize(), function(res) {
                    if (res) {
                        $('#form-divert-call').trigger('reset');
                        $('.dark-mask').css('display', 'none');
                        $('.btn-actions').css('display', 'block');
                        $('#form-divert-call').css('display', 'none');
                        document.getElementById('tone-call-incoming').pause();
                    } else {
                        console.log('error')
                    }
                });
            });

            // whatsapp ------------------------------------
            $('#myWP').floatingWhatsApp({
            phone: '{{ setting('whatsapp.phone') }}',
            popupMessage: '{{ setting('whatsapp.popupMessage') }}',
            message: '{{ setting('whatsapp.message') }}',
            showPopup: true,
            showOnIE: true,
            headerTitle: '{{ setting('whatsapp.headerTitle') }}',
            headerColor: '{{ setting('whatsapp.color') }}',
            backgroundColor: '{{ setting('whatsapp.color') }}',
            buttonImage: '<img src="{{ Voyager::Image(setting('whatsapp.buttonImage' )) }}" />',
            position: '{{ setting('whatsapp.position') }}',
            autoOpenTimeout: {{ setting('whatsapp.autoOpenTimeout') }},
            size: '{{ setting('whatsapp.size') }}'
            });
        });

        // ***WebSockets***
        // Escuchando los pedidos nuevo
        Echo.channel('IncomingCallChannel-{{ $user_id }}')
            .listen('IncomingCallEvent', (res) => {
                $('.dark-mask').css('display', 'flex');
                $('#btn-answer-call').attr('href', "{{ url('meet') }}/" + res.meet.id);
                $('#name-call').text(
                    `${res.meet.specialist.prefix} ${res.meet.specialist.name} ${res.meet.specialist.last_name}`
                );
                document.getElementById('tone-call-incoming').play();
                $('#div-call img').attr('src', "{{ url('storage') }}/" + res.meet.specialist.user
                    .avatar);
                $('#form-divert-call input[name="id"]').val(res.meet.id);
            });

    </script>

    <style>
        .dark-mask {
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

        .img-call {
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
            <div class="mt-3 btn-actions">
                <button type="button" class="btn btn-danger btn-rounded btn-divert-call" style="margin-right: 50px"
                    data-wow-delay="0.3s"><span class="fa fa-times fa-2x"></span></button>
                <a id="btn-answer-call" class="btn btn-success btn-rounded" style="margin-left: 50px"
                    data-wow-delay="0.3s"><span class="fa fa-phone fa-2x"></span></a>
            </div>
            <br>
            <form id="form-divert-call" action="{{ url('meet/divert_call') }}" style="display: none">
                @csrf
                <input type="hidden" name="id">
                <textarea name="message" class="form-control form-control-user" style="width:300px" rows="3"
                    placeholder="Ingrese el motivo..."></textarea> <br>
                <button type="submit" class="btn btn-danger mx-3"><span class="fa fa-times"></span> Colgar
                    llamada</button>
            </form>
        </div>
    </div>

</body>

</html>
