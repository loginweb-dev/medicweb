<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ setting('site.title') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="{{ asset('vendor/mdb/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/mdb/css/mdb.min.css') }}" rel="stylesheet">
    
    @yield('css')
    
    @laravelPWA

    {!! htmlScriptTagJsApi([
        'action' => 'homepage',
        'custom_validation' => 'myCustomValidation'
    ]) !!}
</head>
<body>
    <div id="app">
        @yield('menu')
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('vendor/mdb/js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/mdb/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/mdb/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/mdb/js/mdb.min.js') }}"></script>
    @yield('js')
    <script>
        $( "blockquote" ).addClass( "blockquote" );
    </script>
</body>
</html>
