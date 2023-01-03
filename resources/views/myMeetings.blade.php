@extends('layouts.app')

@section('content')
    <x-header />
    <section>
        <div class="container p-5 card text-black h-100 mx-auto mt-5" style="border-radius: 25px;">
            <div class="row food_section">
                <div class="row text-center">
                    <div class="heading_container heading_center">
                        <h2>
                            Your meetings
                        </h2>
                    </div>
                    <div>                        
                        <ul class="filters_menu">
                            <li class="active all_statuses" data-filter=".Arranged" value="1">Arranged</li>
                            <li class="all_statuses" data-filter=".Active" value="2">Active</li>
                            <li class="all_statuses" data-filter=".Canceled" value="4">Canceled</li>
                            <li class="all_statuses" data-filter=".Old" value="3">Old</li>                            
                        </ul>                        
                    </div>
                </div>                
                <div class="d-flex justify-content-center">
                    <div class="container-fluid ">
                        <div class="row justify-content-md-center announcement_container">
                            <x-announcement-card :announcements="$announcements" :creatordetails='false' :poke='false' :cancel='true' :refresh='false' :dismiss='true' />
                        </div>
                        {{-- <div class="row sorting mb-5 mt-5">
                            {!! $announcements->links() !!}
                        </div> --}}
                    </div>
                </div>                
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
    <script type="module">    
    $(document).ready(function(){
        var myCarousel = document.querySelector('#carouselExampleSlidesOnly')
        var carousel = new bootstrap.Carousel(myCarousel)

        $(window).on('load', function(){
        
        $('.filters_menu li').click(function () {
            $('.filters_menu li').removeClass('active');
            $(this).addClass('active');
            
            var data = $(this).attr('data-filter');
            $grid.isotope({
                filter: data
            })
        });
    
        var $grid = $(".grid").isotope({
            filter: '.Arranged',
            itemSelector: ".all",
            percentPosition: false,
            masonry: {
                columnWidth: ".all"
            }
        })        
    });

    var statusesAll = document.getElementsByClassName("all_statuses");
    for(var i = 0; i < statusesAll.length; i++){
        statusesAll[i].addEventListener("click",checkClicks);
    }
    function checkClicks(e){
        $(".announcement_container").html("");
        $.ajax({ 
            url: '{{ route('filterMeetings') }}',
            type: 'POST',                                
            data: {
                '_token': '<?php echo csrf_token(); ?>',
                data: e.target.value,
            },
            success: function(data){
                if(data){
                
                $(".announcement_container").html(data);                    
            }
            }
        })
    }
    });
</script>
@endpush
