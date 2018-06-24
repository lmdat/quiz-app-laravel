<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <link as=style href="{{asset('cs/app.css')}}" rel=preload>
        <link as=style href="{{asset('css/chunk-vendors.css')}}" rel=preload>
        <link as=script href="{{asset('js/app.js')}}" rel=preload>
        <link as=script href="{{asset('js/chunk-vendors.js')}}" rel=preload>
        <link href="{{asset('css/chunk-vendors.css')}}" rel=stylesheet>
        <link href="{{asset('css/app.css')}}" rel=stylesheet>

        
    </head>
    <body>
        <noscript>
            <strong>We're sorry but vue-quiz doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
        </noscript>
        <div id="app"></div>
        <script src="{{asset('js/chunk-vendors.js')}}"></script>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>