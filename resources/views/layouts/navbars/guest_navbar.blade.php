<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item float-left">
            <a class="nav-link nav-link-icon  btn btn-sm btn-primary" href="{{ route('home') }}">
                <i class="ni ni-planet"></i>
                <span class="nav-link-inner--text">{{ __('Home') }}</span>
            </a>
        </li>

        <li class="nav-item ml-3">
            <a class="nav-link nav-link-icon  btn btn-sm btn-primary" href="{{ route('faq') }}">
                <i class="ni ni-planet"></i>
                <span class="nav-link-inner--text">{{ __('FAQ') }}</span>
            </a>
        </li>



        <div class="topbar-divider d-none d-sm-block"></div>

    
        <li class="nav-item">
            <a class="nav-link nav-link-icon  btn btn-sm btn-primary" href="{{ route('register') }}">
                <i class="ni ni-circle-08"></i>
                <span class="nav-link-inner--text">{{ __('Register') }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-icon btn btn-sm btn-success ml-3 text-gray-900" href="{{ route('login') }}">
                <i class="ni ni-key-25"></i>
                <span class="nav-link-inner--text">{{ __('Login') }}</span>
            </a>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->