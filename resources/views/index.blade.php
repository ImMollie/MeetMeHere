@extends('layouts.app')
@section('content') 
<div class="hero_area">
   <div class="bg-box">
     <img src="images/index/hero-bg1.jpg" alt="">
   </div>
   <!-- header section strats -->
   <x-header/>
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
                     Web application supporting the organization of group activities
                   </h1>
                   {{-- <p>                    
                     Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad mollitia laborum quam quisquam esse error unde. Tempora ex doloremque, labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.
                   </p> --}}
                   <div class="btn-box">
                     <a href="#readmore" class="btn1">
                       Read about it
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
               <img src="images/index/search2.jpg" class="img-fluid" alt="">
             </div>
             <div class="detail-box">
               <h3>
                 Search
               </h3>
               <h6>
                 Find announcement you are looking for
               </h6>               
               <a class="login_button" href="{{ route('searchAnnouncement') }}">
                 Click here!
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
                 Add
               </h3>
               <h6>
                 Add your own announcement
               </h6>
               <a class="login_button" href="{{ route('indexAnnouncement') }}">
                  Click here!
                </a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

 <!-- end offer section -->

 <!-- food section -->

 <section class="food_section layout_padding-bottom" id="categories">
   <div class="container">
     <div class="heading_container heading_center">
       <h2>
         Our Categories
       </h2>
     </div>

     <ul class="filters_menu">
       <li class="active" data-filter="*">All</li>
       <li data-filter=".Social">Social</li>
       <li data-filter=".Sport">Sport</li>
       <li data-filter=".Travels">Travels</li>
       <li data-filter=".Others">Others</li>
     </ul>

     <div class="filters-content">
       <div class="row grid">
        @foreach($categories as $category)
         <div class="col-sm-6 col-lg-4 all {{$category->categoryType}}">
           <div class="box">
             <div>
               <div class="img-box">
                 <img src="{{ asset($category->categoryIMG) }}" alt="">
               </div>
               <div class="detail-box">
                 <h5>
                  {{ $category->categoryName }}
                 </h5>
                 <p>
                   Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam voluptatem repellendus sed eaque
                 </p>
               </div>
             </div>
           </div>
         </div>
         @endforeach         
       </div>
     </div>
     <div class="btn-box">
       <a href="">
         View More
       </a>
     </div>
   </div>
 </section>

 <!-- end food section -->

 <!-- about section -->

 <section class="bg-img layout_padding mb-5" id="readmore">
   <div class="container">
     <div class="row text-align-center"> 
      <div class="col-md"> 
      </div>     
       <div class="col-md">         
         <div class="detail-box">
           <div class="heading_container">
             <h2>
               We Are Feane
             </h2>
           </div>
           <p>
             There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
             in some form, by injected humour, or randomised words which don't look even slightly believable. If you
             are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in
             the middle of text. All
           </p>           
         </div>
       </div>
       <div class="col-md">
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
         &copy; <span id="displayYear"></span> All Rights Reserved By
         <a href="https://html.design/">Free Html Templates</a><br><br>
         &copy; <span id="displayYear"></span> Distributed By
         <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
       </p>
     </div>
   </div>
 </footer>
 <!-- footer section -->


@endsection