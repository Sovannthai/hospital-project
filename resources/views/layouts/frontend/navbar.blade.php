<!-- Back to top button -->
<div class="topbar">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 text-sm">
                <div class="site-info">
                    <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
                    <span class="divider">|</span>
                    <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
                </div>
            </div>
            <div class="col-sm-4 text-right text-sm">
                <div class="social-mini-button">
                    <a href="#"><span class="mai-logo-facebook-f"></span></a>
                    <a href="#"><span class="mai-logo-twitter"></span></a>
                    <a href="#"><span class="mai-logo-dribbble"></span></a>
                    <a href="#"><span class="mai-logo-instagram"></span></a>
                </div>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .topbar -->

<nav class="navbar navbar-expand-lg navbar-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('frontend.home') }}"><img src="{{ asset('uploads/logo/logo3.png') }}" alt="" style="height:60px;"></a>

        {{-- <form action="#">
            <div class="input-group input-navbar">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
                </div>
                <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
            </div>
        </form> --}}

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('frontend.home'))active @endif" href="{{ route('frontend.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('frontend.about-us') }}" class="nav-link @if (request()->routeIs('frontend.about-us'))active @endif">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('frontend.doctor') }}" class="nav-link @if (request()->routeIs('frontend.doctor'))active @endif">Doctors</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('frontend.blog') }}" class="nav-link @if (request()->routeIs('frontend.blog'))active @endif">News</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('frontend.contact') }}" class="nav-link @if (request()->routeIs('frontend.contact'))active @endif">Contact</a>
                </li>
                <li class="nav-item">
                    @guest
                    <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login</a>
                    <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}">Register</a>
                    @else
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a class="btn btn-primary ml-lg-3" href="">Profile</a>
                        <button type="submit" class="btn btn-primary ml-lg-3">Logout</button>
                    </form>
                    @endguest
                </li>
            </ul>
        </div> <!-- .navbar-collapse -->
    </div> <!-- .container -->
</nav>
