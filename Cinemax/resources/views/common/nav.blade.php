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
      <li class="right">
        <img src="{{ asset('images/profile/' . $user->profile_img) }}" class="profile-ico" alt="Profile">
        <button class="nav-dropdown-btn" onclick="toggleNavProfileDropdown()"><i class="fas fa-caret-down"></i></button>
        <div class="profile-dropdown-content">
          @auth
          @if ($user->role == 0)
          <a href="/admin">Admin</a>
          @endif
          <a href="{{ route('user-view', $user->id) }}">View Profile</a>
          @endauth
          <a href="{{ route('logout')}}">Log out</a>
        </div>
  </div>
  @else
  <!-- Before Login -->
  <div class="nav-before-login">
    <a href="/login">Login</a>
    <a href="/user/register">Create Account</a>
  </div>

  </li>
  @endauth
  </ul>
  </div>

</nav>