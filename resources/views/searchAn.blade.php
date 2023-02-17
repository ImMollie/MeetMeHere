@extends('layouts.app')

@section('content')
    <x-header />
    <section>
        <div class="container p-5 card text-black h-100 mx-auto mt-5" style="border-radius: 25px;">
            <div class="row food_section">                
                <div class="col-md-8 order-md-2 col-lg-9">
                    <div class="container-fluid ">
                        <div class="row justify-content-md-center announcement_container">
                            <x-announcement-card :announcements="$announcements" :creatordetails='true' :poke='true' :cancel='false' :refresh='false' :dismiss='false' />
                        </div>
                        {{-- <div class="row sorting mb-5 mt-5">
                            {!! $announcements->links() !!}
                        </div> --}}
                    </div>
                </div>
                <div class="col-md-4 order-md-1 col-lg-3 sidebar-filter box pt-5 pb-5">
                    <div>
                        <div class="accordion">
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">{{__('translation.searchAnnouncement.buttons.categories')}}</a>
                                </div>
                            </div>
                            <div id="collapse1" style="margin-left:24px;" class="accordion-collapse collapse ml-4"
                                aria-labelledby="heading6" data-bs-parent="#accordionExample">
                                @foreach ($categories as $category)
                                <div class="form-group form-check pl-4">
                                    <input type="checkbox" class="form-check-input all_checkbox" value="{{ $category->id }}">
                                    <label class="form-check-label"> {{ __($category->categoryName) }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 mb-2" style="border-top: 2px dashed #222831;"></div>
                    <div class="accordion">
                        <div class="accordion-item">
                            <div class="accordion-header" id="heading6">
                                <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">{{__('translation.searchAnnouncement.buttons.amount')}}</a>
                            </div>
                        </div>
                        <div id="collapse2" style="margin-left:24px;" class="accordion-collapse collapse ml-4"
                                aria-labelledby="heading6" data-bs-parent="#accordionExample">
                            <div class="form-group form-check pl-4">
                                <input type="radio" class="form-check-input amount_radio" name="amount" value="1">
                                <label class="form-check-label"> 1</label>
                            </div>
                            <div class="form-group form-check pl-4">
                                <input type="radio" class="form-check-input amount_radio" name="amount" value="2">
                                <label class="form-check-label"> 2</label>
                            </div>
                            <div class="form-group form-check pl-4">
                                <input type="radio" class="form-check-input amount_radio" name="amount" value="all">
                                <label class="form-check-label"> {{__('translation.addAnnouncement.more')}}</label>
                            </div>
                        </div>                        
                    </div>
                    <div class="mt-2 mb-2" style="border-top: 2px dashed #222831;"></div>
                    <div class="accordion">
                        <div class="accordion-item">
                            <div class="accordion-header" id="heading6">
                                <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse2">{{__('translation.searchAnnouncement.buttons.place')}}</a>
                            </div>
                        </div>
                        <div id="collapse3" class="accordion-collapse collapse ml-4"
                                aria-labelledby="heading6" data-bs-parent="#accordionExample">
                            <div class="filter-content" id="collapse_aside2" style="">
                                <div class="card-body">
                                    <label style="font-size: 12px;">{{__('translation.searchAnnouncement.kilometers')}}</label>
                                    <div class="range-slider">
                                        <input class="range-slider__range" type="range" value="0" min="0" max="100" id="range">
                                        <span class="range-slider__value">0</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2 mb-2" style="border-top: 2px dashed #222831;"></div>                        
                        </div>
                    </div>
                    <div class="mt-2 mb-2" style="border-top: 2px dashed #222831;"></div>
                    <div class="accordion">
                        <div class="accordion-item">
                            <div class="accordion-header" id="heading6">
                                <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse2">{{__('translation.searchAnnouncement.buttons.date')}}</a>
                            </div>
                        </div>
                        <div id="collapse4" style="margin-left:24px;" class="accordion-collapse collapse ml-4"
                                aria-labelledby="heading6" data-bs-parent="#accordionExample">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-check-label" for="date1">{{__('translation.addAnnouncement.date1')}}</label>
                                        <input type="date" id="date1" class="form-control" min="{{ date('Y-m-d') }}" name="date1">
                                        <div class="form-check">
                                            <input class="form-check-input" name="oneDay" id="oneDay" type="checkbox"
                                                onchange="dateDisabled()">
                                            <label class="form-check-label" for="oneDay">{{__('translation.addAnnouncement.thisday')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="form-check-label" for="date2">{{__('translation.addAnnouncement.date2')}}</label>
                                    <input type="date" id="date2" class="form-control oneDay" min="{{ date('Y-m-d') }}"
                                        name="date2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 mb-2" style="border-top: 2px dashed #222831;"></div>                    
                    
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script type="module">        
    $(document).ready(function(){
        
        var myCarousel = document.querySelector('#carouselExampleSlidesOnly')
        var carousel = new bootstrap.Carousel(myCarousel)

        window.dateDisabled = function() {
        if ($('input[name="oneDay"]').is(':checked')) {
            $(".oneDay").val("");
            $(".oneDay").prop('disabled', true);
        } else {
            $(".oneDay").prop('disabled', false);
        }
    }

    var map, marker, geocode;
window.Modal = function() {
    $("#location-modal").modal('show');
    var location = new google.maps.LatLng(0, 0);
    var mapProperty = {
        center: location,
        zoom: 25,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById('map'), mapProperty);
    marker = new google.maps.Marker({
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: location
    });

    geocodePosition(marker.getPosition());

    google.maps.event.addListener(marker, 'dragend', function() {
        map.setCenter(marker.getPosition());
        geocodePosition(marker.getPosition());
        $("#latitude").val(marker.getPosition().lat());
        $("#longitude").val(marker.getPosition().lng());

    });
    var currentLat = $("#latitude").val();
    var currentLng = $("#longitude").val();
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            $("#latitude").val(pos.lat);
            $("#longitude").val(pos.lng);
            marker.setPosition(pos);
            map.setCenter(marker.getPosition());
            geocodePosition(marker.getPosition());
        });
    }
}

window.geocodePosition = function (pos) {

    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({
            latLng: pos
        },
        function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                $("#address-label").html(results[0].formatted_address);
                $("#address").val(results[0].formatted_address);

            } else {
                $("#address-label").html('Cannot determine address at that location');
            }
        }
    );
    }
    var rangeSlider = function(){
    var slider = $('.range-slider'),
        range = $('.range-slider__range'),
        value = $('.range-slider__value');
        
    slider.each(function(){

        value.each(function(){
        var value = $(this).prev().attr('value');
        $(this).html(value);
        });

        range.on('input', function(){
        $(this).next(value).html(this.value);
        });
    });
    };

    rangeSlider();

    var storageClicks = [];
    var counter;
    var amountPeople;
    var range;
    var date1;
    var date2;  
    var oneDayChoose = false;

    var checboxCategoryAll = document.getElementsByClassName("all_checkbox");
    for(var i = 0; i < checboxCategoryAll.length; i++){
        checboxCategoryAll[i].addEventListener("click",checkClicks);
    }

    function checkClicks(e){
        
        if(storageClicks.includes(e.target.value) && !e.target.checked){            
            storageClicks.splice(storageClicks.indexOf(e.target.value), 1);
        }
        if(e.target.checked){
            storageClicks.push(e.target.value);
            send(storageClicks, amountPeople, range, date1, date2, oneDayChoose);
        }
    }  

    var amountAll = document.getElementsByClassName("amount_radio");
    for(var i = 0; i < amountAll.length; i++){
        amountAll[i].addEventListener("click",checkAmount);
    }
    function checkAmount(e){
        if(e.target.checked){            
            amountPeople = e.target.value;            
        }else amountPeople = null;
        send(storageClicks, amountPeople, range, date1, date2, oneDayChoose);
    }

    var timeout;
    $(this).on('input change','#range',function(){
        clearTimeout(timeout);        
        timeout = setTimeout(() => {
            range = $(this).val();        
        send(storageClicks, amountPeople, range, date1, date2, oneDayChoose);
        }, 1000);
        
        
    });

    $(this).on('input','#date1',function(){
        date1 = $(this).val();
        send(storageClicks, amountPeople, range, date1, date2, oneDayChoose);
    });
    $(this).on('input','#date2',function(){
        date2 = $(this).val();
        send(storageClicks, amountPeople, range, date1, date2, oneDayChoose);
    });   

    $('#oneDay').click(function(){        
        if(this.checked){
            oneDayChoose = true;         
        }else oneDayChoose = false;
        send(storageClicks, amountPeople, range, date1, date2, oneDayChoose);
    });
        

    function send(storageClicks, amountPeople, range, date1, date2, oneDayChoose){
        $.ajax({  
                type: 'POST',
                url: '{{ route('filterAnnouncement') }}',                    
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    data: storageClicks,
                    amount: amountPeople,
                    range: range,
                    date1: date1,
                    date2: date2,
                    oneDay: oneDayChoose,

                },
                success: function(data){
                    if(data){
                    $(".announcement_container").html("");
                    $(".announcement_container").html(data);                    
                }
            }
            })
    }
    });
</script>
@endpush
