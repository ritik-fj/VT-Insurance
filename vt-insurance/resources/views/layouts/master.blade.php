<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand px-4" href="{{ url('/') }}">VT Insurance</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item lead">
                            <a class="nav-link {{ Request::path() == '/' ? 'active' : '' }}"
                                href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item lead">
                            <a class="nav-link {{ request()->routeIs('viewpolicies') ? 'active' : '' }}"
                                href="{{ route('viewpolicies') }}">Policies</a>
                        </li>
                        {{-- <li class="nav-item lead">
                            <a class="nav-link {{ request()->routeIs('customers.index') ? 'active' : '' }}"
                                href="{{ route('customers.index') }}">Customers</a>
                        </li> --}}
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav px-4">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item lead">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            @if (Auth::user()->role === 'admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                                </li>
                            @elseif (Auth::user()->role === 'customer')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('customer.dashboard') }}">Customer Dashboard</a>
                                </li>
                            @endif

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->fname }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-2" style="margin-top: 70px;">
            @yield('content')
        </main>
        <br><br>
        <footer class="bg-dark text-light footer border">
            <div class="container mt-3">
                <div class="row">
                    <div class="col">
                        <h1 class="display-6 text-center" style="font-size: 25px;"><small>Contact Us</small> </h1>
                        <hr>
                        <p class="lead text-center" style="font-size: 15px;"><small>Address: Kaunikuila House,
                                <br> Laucala Bay Road,, Honson St, Suva
                                <br> <br> Phone: (+679) 999-9999<br>Email: info@vtinsurance.com.fj</small>
                        </p>
                    </div>

                    <div class="col"></div>

                    <div class="col">
                        <h5 class="display-6 text-center" style="font-size: 25px;"><small>About Us</small> </h5>
                        <hr>
                        <p class="lead text-center" style="font-size: 15px;"><small> VT Insurance is committed to
                                providing
                                our
                                customers
                                with the best
                                possible car insurance
                                coverage at the lowest possible rates. Our experienced agents are available to
                                answer
                                any
                                questions you may have and help you choose the right policy for your needs.</small>
                        </p>
                    </div>
                </div>
                <p class="text-center" style="font-size: 13px;">Copyright © 2023. VT Insurance
                </p>
            </div>
        </footer>
    </div>
</body>

</html>
