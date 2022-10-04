<header id="header" class="top-head row align-items-center">
   <div class="col-5 col-md-1-5">   <h1>Meet me<br><div style="letter-spacing:3px; font-size:60px; font-weight:600;">Here!</div></h1></div>
   <div class="col">    <a href="{{ route('home') }}"><h3>We supporting the organization<br>of group activities</h3></a> </div>
   <div class="col-2">   
      
      <div class="login-signup">                              
         <ul>
            @auth
            <li>
               <form action="{{ route('logout')}}" method="POST">
               @csrf
               <a class="custom-b" href="" onclick='this.parentNode.submit(); return false;'>Logout</a>
               </form>
            </li>
        @else
            <li><a class="custom-b" href="{{ route('login') }}">Login</a></li>
            <li><a class="custom-b" href="{{ route('register') }}">Sign up</a></li>
            @endauth
         </ul>
      </div>  
   </div> 

<nav class="navbar">
    <div class="container-fluid">
             <div class="right-nav">                        
                <div class="login-sr">
                                                                                                
             </div>
       </div>
    </div>
<div class="container2" style="background-color: #05192e">
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
</nav>
</header>