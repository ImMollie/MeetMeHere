<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>     

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoDY1RWjbut0htw-VZxTU6bi4Ns6WZWkk"></script>
    <script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>   

    <script>     
    var map,marker,geocode;
        function dateDisabled()
        {
            if($('input[name="oneDay"]').is(':checked')) {
                $(".oneDay").val("");
                $(".oneDay").prop('disabled',true);
                }else{
                    $(".oneDay").prop('disabled',false);
                }
            
        }
    function Modal()
    { 
        $("#location-modal").modal('show');
        var location=new google.maps.LatLng(0,0);
        var mapProperty= {
            center:location,
            zoom:25,
            mapTypeId:google.maps.MapTypeId.ROADMAP    
        };
        map=new google.maps.Map(document.getElementById('map'),mapProperty);
        marker=new google.maps.Marker({
            map:map,
            draggable:true,
            animation: google.maps.Animation.DROP,
            position:location
        });

            geocodePosition(marker.getPosition());

                google.maps.event.addListener(marker,'dragend',function()
                {
                    map.setCenter(marker.getPosition());
                    geocodePosition(marker.getPosition());
                    $("#latitude").val(marker.getPosition().lat());
                    $("#longitude").val(marker.getPosition().lng());
        
                });
                currentLat=$("#latitude").val();
                currentLng=$("#longitude").val();
                if(navigator.geolocation)
                {
                    navigator.geolocation.getCurrentPosition(function(position)
                    {
                        pos={
                            lat:position.coords.latitude,
                            lng:position.coords.longitude
                        };
                        $("#latitude").val(pos.lat);
                        $("#longitude").val(pos.lng);
                        marker.setPosition(pos);
                        map.setCenter(marker.getPosition());
                        geocodePosition(marker.getPosition());
                    });
                }
    }
            
    function geocodePosition(pos){

        geocoder= new google.maps.Geocoder();
        geocoder.geocode({
            latLng:pos
        },
        function(results, status){
            if(status == google.maps.GeocoderStatus.OK)
            {
                $("#address-label").html(results[0].formatted_address);
                $("#address").val(results[0].formatted_address);

            }else
            {
                $("#address-label").html('Cannot determine address at that location');
            }
        }
        );
    }
    
        </script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">      
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/addAnnouncement.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">   
        @include('navigation-bar')      
        <div style="background-color: #09284b height:100%">
            @yield('content')
        </div>
    </div>
</body>

</html>
