<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        {{-- <link rel="stylesheet" href="css/app.css"> --}}
        {{-- <link rel="stylesheet" href="http://192.168.1.17:8000/css/app.css"> --}}

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
        {{-- <script src="http://192.168.1.17:8000/js/app.js" defer></script> --}}
        {{-- <script src="js/app.js" defer></script> --}}
    </head>
    <body class="font-sans antialiased">
        @inertia


        @env ('local')
            {{-- <script src="http://192.168.1.29:3000/browser-sync/browser-sync-client.js"></script> --}}
            <script src="http://127.0.0.1:3000/browser-sync/browser-sync-client.js"></script>
        @endenv
    </body>
</html>
