<link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

<nav class="navbar sticky-top bg-white shadow-sm">
    <div class="wrapper">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav clearfix">
            <li class="left">
                <a class="nav-link" href="http://127.0.0.1:8000">
                    <strong class="logo"><i class="fas fa-video logo-icon"></i>Cinemax</strong>
                </a>
            </li>

            <!-- Right Side Of Navbar -->
            <!-- Authentication Links -->
            @auth
            <!-- After Login -->
            <div class="nav-after-login">
                    @csrf
                    @if(Auth::user()->role == '0')
                        <a href="{{ route('admin') }}" class="nav-a pr-20">Dashboard</a>
                    @endif
                        <a href="{{ route('user-edit') }}" class="nav-a"><i class="fas fa-user-circle nav-a pr-5"></i>{{Auth::user()->name}}</a>
            </div>
            <div class="nav-icon">
                <span class="bar-line"></span>
                <span class="bar-line"></span>
                <span class="bar-line"></span>
            </div>

            @else
            <!-- Before Login -->
            <div class="nav-before-login right">
                <a href="{{ route('login') }}">Login</a>
            </div>
            @endauth
        </ul>
    </div>

</nav>
