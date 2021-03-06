<style>
</style>

<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">

      <a href="{{ url('/') }}" class="navbar-brand">
        <img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo" style="object-fit: cover;" width="180px" height="auto">
      </a>

      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand">
        <div class="collapse navbar-collapse order-3">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="{{ url('/product') }}" class="nav-link">
                Admin
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/') }}" class="nav-link">
                Shop
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/') }}" class="nav-link">
                Account
              </a>
            </li>
          
            <li class="nav-item">
              <a href="{{ url('/') }}" class="nav-link">
                <i class="fas fa-shopping-cart fa-lg"></i>
                <span class="badge badge-lg badge-success navbar-badge">0</span>
              </a>
            </li>
          </ul>
  
        </div>
        </ul>


      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">

          <li class="nav-item">
            <a href="#" class="nav-link">Contact us</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">About us</a>
          </li>
          @if (Auth::check())
            <li class="nav-item dropdown">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">{{ Auth::user()->name }}</a>
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="{{url('/')}}" class="dropdown-item">My account</a></li>
                <li><a href="{{url('/admin/logout')}}" class="dropdown-item">Logout</a></li>
            </li>
          @else 
            <li class="nav-item">
              <a href="{{ url('/signup') }}" class="nav-link">Sign up</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/login') }}" class="nav-link">Login</a>
            </li>
          @endif
        </ul>

      </div>
      </ul>
      
  </nav>
  