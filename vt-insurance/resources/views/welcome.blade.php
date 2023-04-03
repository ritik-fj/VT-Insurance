@extends('layouts.master')

@section('title', 'Home')

<!-- @section('sidebar')
@parent -->

<!-- <p>This is appended to the master sidebar.</p> -->
<!-- @stop -->

@section('content')

<!-- Carousel -->
<div class="container-fluid">
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/accident.jpg') }}" alt="Los Angeles" class="d-block" style="width:100%">
                <div class="carousel-caption">
                    <h3>MOTOR VEHICLE INSURANCE</h3>
                    <p>Accidents happen. Get your motor vehicle insured with us.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/fire.jpg') }}" alt="Chicago" class="d-block" style="width:100%">
                <div class="carousel-caption">
                    <h3>HOUSE INSURANCE</h3>
                    <p>We will always be there to provide a shelter over your head. </p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/c3.jpg') }}" alt="New York" class="d-block" style="width:100%">
                <div class="carousel-caption">
                    <h3>INSURANCES MATTER</h3>
                    <p>It's better to be safe and insured from uncertain events, make your life easier. </p>
                </div>
            </div>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <hr class="featurette-divider">

    <div class="container">
        <!-- Three columns of text below the carousel -->

        <div class="position-relative">
            <div class="row ">
                <div class="col">
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                    </svg>

                    <h2>Heading</h2>
                    <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
                    <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col">
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                    </svg>

                    <h2>Heading</h2>
                    <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
                    <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col">
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                    </svg>

                    <h2>Heading</h2>
                    <p>And lastly this, the third column of representative placeholder content.</p>
                    <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
            </div>
        </div>



        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">
        <br>
        <div class="row">
            <div class="col">
                <h2>Get the Right Insurance for You</h2>
                <p>VT Insurance is a locally owned insurance company for FIjians.
                    Together we build this country we call our home and together we grow, for without you,
                    we would simply be a company without a soul. You are our soul. You make us tick.
                    You make us innovate to serve you better. You have an uncompromising requirement for the best
                    and this drives us to be the best. And when we Fijians stand together, our strength as a nation
                    will be incomparable. Protecting yourself, your family, and your assets is important. We offer
                    a wide range of insurance options to help you find the coverage you need.</p>
                <a href="#" class="btn btn-primary">Get a Quote</a>
            </div>
            <div class="col">
                <img src="{{ asset('images/insurance.jpg') }}" alt="Insurance" class="img-fluid rounded-pill">
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Auto Insurance</h2>
                        <p class="card-text">Get coverage for your car or other vehicles.</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Home Insurance</h2>
                        <p class="card-text">Protect your home and belongings.</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Life Insurance</h2>
                        <p class="card-text">Provide for your loved ones when you're gone.</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 p-5 rounded">
        <div class="container">
            <h1>Why Choose Us?</h1>
            <ul>
                <li>Flexible coverage options</li>
                <li>Competitive pricing</li>
                <li>Exceptional customer service</li>
                <li>Easy claims process</li>
            </ul>
            <a href="#" class="btn btn-primary">Get a Quote</a>
        </div>
    </div>
</div>
<p>This is my body content.</p>
@stop