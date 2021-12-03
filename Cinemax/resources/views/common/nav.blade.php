<link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

<nav class="navbar sticky-top bg-white shadow-sm">
    <div class="wrapper">
        <!-- Left Side Of Navbar -->
        <div class="navbar-nav clearfix">
                <a class="nav-link left" href="http://127.0.0.1:8000">
                    <strong class="logo"><i class="fas fa-video logo-icon"></i>Cinemax</strong>
                </a>

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
                        
                        <form action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="logout">
                                {{ __('Log Out') }}
                            </button>
                        </form>
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
        </div>
    </div>

</nav>
