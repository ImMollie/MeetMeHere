<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{ route('home') }}">
                <span>
                    Meet me HERE!
                </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  mx-auto ">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}/#categories">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#readmore">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('myMeetings') }}">Meetings</a>
                    </li>
                </ul>
                <div class="user_option">                    
                    <i class="position-relative notification-btn fa-solid fa-bell" style="color: white;">                        
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            9+
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </i>                    
                    
                    <!-- Notification dropdown -->
                    <div class="navbar-nav dropdown">
                        <div class="notification-dropdown collapse" aria-expanded="false">
                            <div class="notBtn" href="#">   
                                @auth                                   
                                    <div class="box2">                                        
                                        <div class="display">                                                
                                            <div class="cont readNotification">
                                                @foreach ($notification as $powiadomienia)
                                                <input type="hidden" value="{{$powiadomienia->id}}" name="ids[]">
                                                    @if($loop->iteration === 1)
                                                        <i class="fa-regular fa-circle-check readedNotification" style="font-size: 15px"> Check as readed</i> 
                                                    @endif                              
                                                    <div class="txt text-center m-2 justify-content-start d-flex pt-2 pb-2" style="border: 1px solid; border-color: sandybrown; border-radius: 30px;">
                                                        <div class="profCont">
                                                            @if($powiadomienia->user->photo != null)
                                                                <img class="profile" src="/storage/images/usersPhotos+ {{$powiadomienia->user->photo}}">
                                                            @else
                                                                <img class="profile" src="/storage/images/usersPhotos/placeholder.png">
                                                            @endif
                                                        </div> 
                                                        <div class="col">   
                                                            <div class="row">
                                                                <h4 class="text-center">{{$powiadomienia->user->nickname}}</h4>
                                                            </div>                                                    
                                                            <div class="row">                                                  
                                                                <h6 class="text-center">Send you a message!</h6> 
                                                            </div>
                                                        </div>                                                       
                                                    </div> 
                                                @endforeach                                        
                                            </div>                                                
                                        </div>
                                    </div>
                                @endauth                                                            
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('chatRoom') }}" class="user_link">
                        <i class="fa-solid fa-comments" aria-hidden="true"></i>
                    </a>
                    <a href="{{ route('indexProfile') }}" class="user_link">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </a>
                    @auth

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a class="login_button" href=""
                                onclick='this.parentNode.submit(); return false;'>Logout</a>
                        </form>
                    @else
                        <a class="login_button" href="{{ route('login') }}">Login</a>
                        <a class="login_button" href="{{ route('register') }}">Sign up</a>
                    @endauth
                </div>
            </div>
        </nav>
    </div>

@push('scripts')
<script src="https://js.pusher.com/7.2.0/pusher.min.js"></script>
    <script>
        $(document).ready(function(){
            $(window).on('load', function () {               

            $('.notification-btn').click(function() {            
            $('.notification-dropdown').toggle();
            $(this).toggleClass('active');
        });

        $('.readNotification').click(function(){
            var element = $('.readedNotification');
            element.removeClass("fa-regular");
            element.addClass("fa-solid");  
            var array = [];  
            $('input[name^="ids"]').each(function(){
                array.push($(this).val());
            })
            $.ajax({                
                type: 'POST',
                url: '{{ route('readNotification') }}',                    
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    data: array,
                },                
            }) 
        });

        


        
        window.Echo.private("privateChat.4").listen('MessageSent',function (e){
            
            console.log(e);
            $('.notification').html(newNotification);
        });

        });
    });
    </script>
@endpush
</header>
