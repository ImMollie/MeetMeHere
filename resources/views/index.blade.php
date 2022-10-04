@extends('layouts.app')
@section('content') 
      <div class="page-content-product">
         <div class="main-product">
            <div class="head">
               <div class="find-box">
                  <h1>What are you looking for?</h1>
                  <h4><b>Find</b> announcement or <b>add</b> your own!</h4>
                  <div class="product-sh">
                     {{-- <div class="col-sm-6">
                        <div class="form-sh">
                           <input type="text" placeholder="Search something you love" >
                        </div>
                     </div> --}}
                     {{-- <div class="col-sm-3">
                        <div class="form-sh">
                           <select class="selectpicker">
                              <option>Textiles</option>
                              <option>Furniture</option>
                              <option>Leather</option>
                           </select>
                        </div>
                     </div> --}}
                     {{-- <div class="col-sm-3">
                        <div class="form-sh"> <a class="btn" href="#">Search</a> </div>
                     </div> --}}
                     <p>If you feel lost <a href="#"> click here </a> and get answers about the site!</p>
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="row">
                  <div class="col">
                     <a href="productpage.html">
                        <div class="box-img">
                           <h4>Find</h4>  
                           <img src={{ asset("images/pobrane.png")}} />                         
                        </div>
                     </a>
                  </div>
                  <div class="col">
                     <a href="productpage.html">
                        <div class="box-img">
                           <h4>Add</h4>  
                           <img src={{ asset("images/add.jpg")}} />                         
                        </div>
                     </a>
                  </div>                  
               </div>
               <div class="categories_link">
                  <a href="#">Browse all categories here</a>
               </div>
         </div>
      </div>  
@endsection