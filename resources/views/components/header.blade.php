<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.html">
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
                        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu.html">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="book.html">Book Table</a>
                    </li>
                </ul>
                <div class="user_option">
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
</header>