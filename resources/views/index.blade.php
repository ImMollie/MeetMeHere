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
                     <h4>If you feel lost <a href="#"> click here </a> and get answers about the site!</h4>
                  </div>
               </div>
            </div>
            
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col">
                     <a href="{{ route('searchAnnouncement') }}">
                        <div class="box-img">
                           <h4>Search</h4>  
                           {{-- <img src="https://img.freepik.com/free-vector/business-team-looking-new-people-allegory-searching-ideas-staff-woman-with-magnifier-man-with-spyglass-flat-illustration_74855-18236.jpg?w=1380&t=st=1665584888~exp=1665585488~hmac=8d7b92076695bd48f44b6b1f89dbe208504837657cddfa5898b7f085fb50a7d3" />                          --}}
                        </div>
                     </a>
                     <a href="{{ route('indexAnnouncement') }}">
                        <div class="box-img">
                           <h4>Add</h4>  
                           {{-- <img src="https://img.freepik.com/free-vector/refer-friend-concept-illustration_114360-6959.jpg?w=826&t=st=1666524211~exp=1666524811~hmac=e5ecbd74e653d80ca60b8f834b58bc615b9e6f2e599e819808a44999f4bda62f" />                          --}}
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