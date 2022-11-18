<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    

    <!-- Styles -->    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/addAnnouncement.css') }}" rel="stylesheet">
    <link href="{{ asset('css/chat.css') }}" rel="stylesheet">
    <link href="{{ asset('css/chatRoom.css') }}" rel="stylesheet">   
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">  
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
</head>

<body>
    <div id="app">            
        <div>
            @yield('content')
        </div>        
    </div>    
</body>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoDY1RWjbut0htw-VZxTU6bi4Ns6WZWkk"></script>
<script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>
@stack('scripts')

</html>
