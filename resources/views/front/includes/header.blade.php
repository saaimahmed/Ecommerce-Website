<header class="header_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg custom_nav-container  ">
                    <div>
                        <a class="navbar-brand" href="index.html"><img width="120" src="{{asset('/')}}front-assets/images/logo.png" alt="#" /></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class=""> </span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse py-3 ml-5" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="{{route('about')}}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('product')}}">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('show_cart') }}">Cart</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('order_show') }}">Order</a>
                            </li>

                            <form class="form-inline ">
                                <button class="btn   my-sm-0 nav_search-btn" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>

                            @if (Route::has('login'))
                                @auth

                                    <li class="nav-item dropdown bx-fade-down-hover">
                                        <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="">{{ Auth::user()->name }}</span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a  class="nav-link" href="{{ route('profile.show') }}">Profile</a></li>

                                            <li>
                                                <a  class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logoutForm').submit();">Logout</a>
                                                <form action="{{ route('logout') }} " method="post" id="logoutForm">
                                                    @csrf
                                                </form>

                                            </li>
                                        </ul>
                                    </li>


                                @else
                                    <li class="nav-item">
                                        <a class="btn btn-outline-danger text-dark  font-weight-bolder" href="{{ route('login') }}">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="btn btn-outline-danger text-dark  font-weight-bolder ml-3" href="{{ route('register') }}">Registration</a>
                                    </li>
                                @endauth
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>

        </div>

    </div>
</header>
