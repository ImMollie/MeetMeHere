@extends('layouts.app')
@section('content')
    <div class="hero_area">
        <div class="bg-box">
            <img src="images/index/hero-bg1.jpg" alt="">
        </div>
        <!-- header section strats -->
        <x-header />
        <!-- end header section -->
        <!-- slider section -->
        <section class="slider_section ">
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 col-lg-6 ">
                                    <div class="detail-box">
                                        <h1>
                                            {{__('translation.index.title')}}
                                        </h1>
                                        {{-- <p>                    
                     Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad mollitia laborum quam quisquam esse error unde. Tempora ex doloremque, labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.
                   </p> --}}
                                        <div class="btn-box">
                                            <a href="#readmore" class="btn1">
                                                {{__('translation.index.buttons.read')}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- end slider section -->
    </div>

    <!-- offer section -->

    <section class="offer_section layout_padding-bottom">
        <div class="offer_container">
            <div class="container ">
                <div class="row">
                    <div class="col-md-6  ">
                        <div class="box ">
                            <div class="img-box">
                                <img src="images/index/search3.jpg" alt="">
                            </div>
                            <div class="detail-box">
                                <h3>
                                    {{__('translation.index.search')}}
                                </h3>
                                <h6>
                                    {{__('translation.index.search2')}}
                                </h6>
                                <a class="login_button" href="{{ route('searchAnnouncement') }}">
                                    {{__('translation.index.buttons.click')}}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  ">
                        <div class="box ">
                            <div class="img-box">
                                <img src="images/index/add.jpg" alt="">
                            </div>
                            <div class="detail-box">
                                <h3>
                                    {{__('translation.index.add')}}
                                </h3>
                                <h6>
                                    {{__('translation.index.add2')}}
                                </h6>
                                <a class="login_button" href="{{ route('indexAnnouncement') }}">
                                    {{__('translation.index.buttons.click')}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end offer section -->

    <!-- categories section -->

    <section class="food_section layout_padding-bottom" id="categories">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    {{__('translation.index.lastannouncements')}}<br>.<br>.
                </h2>
            </div>
            <div class="heading_container heading_center">
                <h2>
                    {{__('translation.index.categories')}}
                </h2>
            </div>

            <ul class="filters_menu">
                <li class="active" data-filter=".Social">{{__('translation.index.social')}}</li>
                <li data-filter=".Animals">{{__('translation.index.animals')}}</li>
                <li data-filter=".Sport">{{__('translation.index.sport')}}</li>
                <li data-filter=".Travel">{{__('translation.index.travells')}}</li>
                <li data-filter="*">{{__('translation.index.all')}}</li>
            </ul>

            <div class="filters-content">
                <div class="row grid">
                    @foreach ($categories as $category)
                        <div class="col-sm-6 col-lg-4 all {{ $category->categoryType }}">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img src="{{ asset($category->categoryIMG) }}" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h4 class="text-center">
                                            {{ __($category->categoryName) }}
                                        </h4>
                                        <h6 class="detail-box text-center">
                                            {{ __($category->categoryDesc) }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>            
        </div>
    </section>

    <!-- end categories section -->

    <!-- about section -->

    <section class="layout_padding mb-5 position-relative text-center" id="readmore" >
        <img src="{{asset('/images/index/bg-img1.png')}}" class="rounded img-fluid" style="width: 100%;" alt="...">
        <div class="container position-absolute" style="top: 50%; left:50%; transform: translate(-50%, -50%);">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                {{__('translation.index.wearepeople')}}
                            </h2>
                        </div>
                        <p style="margin-right: 150px; margin-left: 150px;">
                            {{__('translation.index.about')}}
                        </p>
                    </div>
    </div>
                </div>
</section>

    <!-- end about section -->

    <!-- footer section -->
    <footer class="footer_section">
        <div class="container">
            {{-- <div class="row">
       <div class="col-md-4 footer-col">
         <div class="footer_contact">
           <h4>
             Contact Us
           </h4>
           <div class="contact_link_box">
             <a href="">
               <i class="fa fa-map-marker" aria-hidden="true"></i>
               <span>
                 Location
               </span>
             </a>
             <a href="">
               <i class="fa fa-phone" aria-hidden="true"></i>
               <span>
                 Call +01 1234567890
               </span>
             </a>
             <a href="">
               <i class="fa fa-envelope" aria-hidden="true"></i>
               <span>
                 demo@gmail.com
               </span>
             </a>
           </div>
         </div>
       </div>
       <div class="col-md-4 footer-col">
         <div class="footer_detail">
           <a href="" class="footer-logo">
             Feane
           </a>
           <p>
             Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with
           </p>
           <div class="footer_social">
             <a href="">
               <i class="fa fa-facebook" aria-hidden="true"></i>
             </a>
             <a href="">
               <i class="fa fa-twitter" aria-hidden="true"></i>
             </a>
             <a href="">
               <i class="fa fa-linkedin" aria-hidden="true"></i>
             </a>
             <a href="">
               <i class="fa fa-instagram" aria-hidden="true"></i>
             </a>
             <a href="">
               <i class="fa fa-pinterest" aria-hidden="true"></i>
             </a>
           </div>
         </div>
       </div>
       <div class="col-md-4 footer-col">
         <h4>
           Opening Hours
         </h4>
         <p>
           Everyday
         </p>
         <p>
           10.00 Am -10.00 Pm
         </p>
       </div>
     </div> --}}
            <div class="footer-info">
                <p>
                    <a href="https://themewagon.com/" target="_blank">Every picture designed By</a><br>
                    &copy; <span id="displayYear"></span> Freepik                    
                </p>
            </div>
        </div>
    </footer>
    <!-- footer section -->
@endsection

@push('scripts')
<script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
<script>
    $(document).ready(function(){
        $(window).on('load', function () {
        
    $('.filters_menu li').click(function () {
        $('.filters_menu li').removeClass('active');
        $(this).addClass('active');
        
        var data = $(this).attr('data-filter');
        $grid.isotope({
            filter: data
        })
    });

    var $grid = $(".grid").isotope({
        filter: '.Social',
        itemSelector: ".all",
        percentPosition: false,
        masonry: {
            columnWidth: ".all"
        }
    })
    
});
    });
</script>
@endpush