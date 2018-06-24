<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.name') }}</title>
    
    <link href="{{ asset('vendor/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/iCheck/skins/square/_all.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>
    
    @yield ('css-link')
</head>
<body>
    <div class="container-fluid">
        <header>
            <div class="my-2 text-center">
                <h2>{{ config('app.name') }}</h2>
            </div>
        </header>

        <main class="mt-5">
            @yield('content')
        </main>

        <footer>

        </footer>
    </div>

    <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/iCheck/icheck.min.js') }}"></script>
    @yield ('js-link')
    
    @yield ('js-script')
</body>
</html>