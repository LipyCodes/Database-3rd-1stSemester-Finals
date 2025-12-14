

<!-- NAV BAR START-->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand me-auto" href="{{url('/')}}">
            <img src="{{ asset('images/logo.png') }}" alt="logo" height="100" width="150">
        </a>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                    <img src="images/logo.png" height="100" width="150">
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('all_collections')}}">Collections</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#footer">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
        @if (Route::has('login'))

        @auth
        <div class="dropdown me-3">
            <!-- BUTTON FOR ADMIN-DASHBOARD - IF ADMIN WANTS TO SEE THE USER DASHBOARD/HOMEPAGE IT WILL HAVE A 
                        BUTTON AT THE NAV BAR TO GO BACK TO ADMIN DASHBOARD -->
            @if (Auth::user()->user_type === 'admin')
            <a href="/admin/dashboard" class="btn btn-warning me-3">Dashboard</a>
            @endif

            @if (!Auth::check() || Auth::user()->user_type !== 'admin')
            <a class="shopping-cart" href="{{url('mycart')}}">
                <i class="fa fa-shopping-cart" style="font-size:36px"></i>
                [{{ $count}}]
            </a>
            @endif

            <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                {{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                @if (Auth::user()->usertype === 'admin')
                <li><a class="dropdown-item" href="/admin/dashboard">Admin Dashboard</a></li>
                @endif
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </div>

        @else
        <a href="{{ route('login') }}" class="login-btn">Login</a>
        <a href="{{ route('register') }}" class="register-btn ms-2">Register</a>
        @endauth
        @endif

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<!-- NAV BAR END -->