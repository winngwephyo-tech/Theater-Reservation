<nav class="navbar sticky-top bg-white shadow-sm">
    <div class="wrapper">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav clearfix">
            <li class="left">
                <a class="nav-link" href="http://127.0.0.1:8000">
                    <strong class="logo">Cinemax</strong>
                </a>
            </li>

            <!-- Right Side Of Navbar -->
            <!-- Authentication Links -->
            @auth
            <!-- After Login -->
            <div class="nav-before-login">
                <form action="{{ route('logout') }}">
                    @csrf

                    @if(Auth::user()->role == '0')
                    <a href="{{ route('admin') }}" class="button">Dashboard</a>
                    @endif
                    <a href="#" class="button">{{Auth::user()->name}}</a>
                    <button type="submit" class="button button2">
                        {{ __('Log Out') }}
                    </button>
                </form>

            </div>

            @else
            <!-- Before Login -->
            <div class="nav-before-login">
                <a href="{{ route('login') }}">Login</a>
            </div>
            @endauth
        </ul>
    </div>

</nav>