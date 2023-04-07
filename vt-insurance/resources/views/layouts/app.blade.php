<html>

<head>
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-2">
        <div class="container-fluid">
            <a class="navbar-brand lead" href="{{ url('/') }}">VT Insurance</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item lead">
                        <a class="nav-link active " aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown lead">
                        <a class="nav-link dropdown-toggle lead" href="#" role="button"
                            data-bs-toggle="dropdown">Policies</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item lead " style="font-size: 15px;"
                                    href="{{ route('policies.index') }}">View Policies</a>
                            </li>
                            <li><a class="dropdown-item lead" style="font-size: 15px;"
                                    href="{{ route('policies.create') }}">Create Policies</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item lead">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item lead">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- @section('sidebar')

    @show -->

    <div class="row">
        @yield('content')
    </div>

    <footer class="bg-dark text-white py-4 footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="text-left">
                        <h1 class="display-6">Contact Us</h1>
                        <p class="lead" style="font-size: 15px;">Address: Kaunikuila House,
                            <br> Laucala Bay Road,, Honson St, Suva
                            <br> <br> Phone: (+679) 999-9999<br>Email: info@vtinsurance.com.fj
                        </p>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="text-left">
                        <h5 class="display-6">About Us</h5>
                        <p class="lead" style="font-size: 15px;"> VT Insurance is committed to providing our customers
                            with the best
                            possible car insurance
                            coverage at the lowest possible rates. Our experienced agents are available to answer any
                            questions you may have and help you choose the right policy for your needs.</p>
                    </div>
                </div>
            </div>
            <hr>
            <p class="text-center" style="font-size: 13px;">Copyright © 2023 vtinsurance.com
            </p>
        </div>
    </footer>
</body>

</html>
