<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

    @php
      $user = DB::table('users')->where('id',Auth::user()->id)->first();  
    @endphp

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="mrs-link" data-toggle="dropdown" href="#">
          <img src="{{ (!empty($user->image)) ? url('backend/all-images/database/user/'.$user->image): url('backend/all-images/database/default/mps.png') }}" alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: .8">
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{ Auth::user()->name }}</span>
          <div class="dropdown-divider"></div>
          <a href="{{route('profile.view')}}" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> My Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{route('change.password')}}" class="dropdown-item">
            <i class="fas fa-key mr-2"></i> Change Password
          </a>
          @if(Auth::user()->role == "Admin")
          <div class="dropdown-divider"></div>
          <a href="{{route('setting.view')}}" class="dropdown-item">
            <i class="fas fa-cog mr-2"></i> Settings
          </a>
          @endif
          <div class="dropdown-divider"></div>
          <a href="{{route('user.logout')}}" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </a>
      </li>
    </ul>
  </nav>