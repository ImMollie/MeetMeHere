<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Strona główna</title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!--enable mobile device-->
      <!--main css-->
      <link rel="stylesheet" href="{{ asset('css/style.css')}}">      
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
      {{-- Naprawic dopinanie boostrapa --}}
   </head>
   <body>
      <header id="header" class="top-head">
         <nav class="navbar">
            <div class="container-fluid">
            <h1>We supporting the organization<br>of group activities</h1>
                     <div class="right-nav">                        
                        <div class="login-sr">
                           <div class="login-signup">
                              <ul>
                                 <li><a class="custom-b" href="#">Login</a></li>
                                 <li><a class="custom-b" href="#">Sign up</a></li>
                              </ul>
                           </div>                                                                                
                     </div>
               </div>
            </div>
            <!--/.container-fluid  --> 
            <div class="container2">
               <div class="d-flex justify-content-end">
                  <div class="nav-box">
                     <ul>
                        <li><a class="text-primary font-weight-bold" href="howitworks.html">How it works</a></li>                                 
                     </ul>
                  </div>
                  <div class="nav-box">
                     <ul>
                        <li><a class="text-primary font-weight-bold" href="about-us.html">Chamb for Business</a></li>                                    
                           </ul>
                  </div>
                  <div class="nav-box">
                     <ul>
                        <li><a class="text-primary font-weight-bold" href="howitworks.html">How it works</a></li>                                 
                     </ul>
                  </div>
               </div>
            </div>
         </div> 
         </nav>
      </header>
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
                           <img src={{ asset("images/pobrane.jpg")}} />                         
                        </div>
                     </a>
                  </div>
                  <div class="col">
                     <a href="productpage.html">
                        <div class="box-img">
                           <h4>Add</h4>  
                           <img src={{ asset("images/pobrane.jpg")}} />                         
                        </div>
                     </a>
                  </div>                  
               </div>
               <div class="categories_link">
                  <a href="#">Browse all categories here</a>
               </div>
         </div>
      </div>  
   </body>
</html>