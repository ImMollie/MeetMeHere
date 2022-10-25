<header id="header" class="top-head">
  <div class="background-img row align-items-center">
   <div class="col-5 col-md-2">   <h1>Meet me<br><div style="letter-spacing:3px; font-size:60px; font-weight:600;">Here!</div></h1></div>
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
               <a class="custom-b" href="{{ route('indexProfile') }}">Profile</a>
            </li>
        @else
            <li><a class="custom-b" href="{{ route('login') }}">Login</a></li>
            <li><a class="custom-b" href="{{ route('register') }}">Sign up</a></li>
            @endauth
         </ul>
      </div>  
   </div> 

   <nav class="navigation">
      <ul class="menu">
        <li class="menu__item">
          <a href="#" class="menu__link">
            <span class="menu__title">
              <span class="menu__first-word" data-hover="About">
                About
              </span>
              <span class="menu__second-word" data-hover="Us">
                Us
              </span>
            </span>
          </a>
        </li>
    
        <li class="menu__item">
          <a href="#" class="menu__link">
            <span class="menu__title">
              <span class="menu__first-word" data-hover="Our">
                Our
              </span>
              <span class="menu__second-word" data-hover="History">
                History
              </span>
            </span>
          </a>
        </li>
    
        <li class="menu__item">
          <a href="#" class="menu__link">
            <span class="menu__title">
              <span class="menu__first-word" data-hover="Latest">
                Latest
              </span>
              <span class="menu__second-word" data-hover="News">
                News
              </span>
            </span>
          </a>
        </li>
    
        <li class="menu__item">
          <a href="#" class="menu__link">
            <span class="menu__title">
              <span class="menu__first-word" data-hover="New">
                New
              </span>
              <span class="menu__second-word" data-hover="Arrivals">
                Arrivals
              </span>
            </span>
          </a>
        </li>
    
        <li class="menu__item">
          <a href="#" class="menu__link">
            <span class="menu__title">
              <span class="menu__first-word" data-hover="On">
                On
              </span>
              <span class="menu__second-word" data-hover="Sale">
                Sale
              </span>
            </span>
          </a>
        </li>
    
        <li class="menu__item">
          <a href="#" class="menu__link">
            <span class="menu__title">
              <span class="menu__first-word" data-hover="Contact">
                Contact
              </span>
              <span class="menu__second-word" data-hover="Us">
                Us
              </span>
            </span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</header>