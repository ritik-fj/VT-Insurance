@extends('layouts.master')

@section('title', 'Home')

<!-- @section('sidebar')
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    @parent -->

    <!-- <p>This is appended to the master sidebar.</p> -->
<!-- @stop -->

@section('content')

    <!-- Carousel -->
    <div class="container-fluid">
        <div id="demo" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>

            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                    <img src="{{ asset('images/accident.jpg') }}" alt="Motor Vehile Accident" class="d-block"
                        style="width:100%">
                    <div class="carousel-caption">
                        <div class="bg-dark border rounded " style="opacity: 0.9;">
                            <h1 class="display-6 pt-2"><strong>MOTOR VEHICLE INSURANCE</strong></h1>
                            <p class="lead">Drive with confidence knowing that you and your car are protected with our
                                comprehensive car insurance. Don't let unexpected accidents ruin your journey, get insured
                                today..</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="{{ asset('images/car_insure.jpg') }}" alt="Happy Customer" class="d-block" style="width:100%">
                    <div class="carousel-caption">
                        <div class="bg-dark border rounded " style="opacity: 0.9;">
                            <h1 class="display-6  pt-2"><strong> GET INSURED NOW</strong></h1>
                            <p class="lead">Secure your ride and your peace of mind with our reliable car insurance
                                coverage. We've got you covered so you can enjoy the road ahead.</p>
                        </div>
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

        <div class="container">



            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">
            <br>
            <div class="row border align-items-center bg-white">
                <div class="col  p-3">
                    <h1 class="text-center display-5">We got you covered</h1>
                    <p class="lead">VT Insurance is a locally owned insurance company for FIjians.
                        Together we build this country we call our home and together we grow, for without you,
                        we would simply be a company without a soul. You are our soul. You make us tick.
                        You make us innovate to serve you better. And when we Fijians stand together, our strength as a
                        nation will be incomparable. Protecting yourself, your family, and your assets is important. We
                        offer a wide range of insurance options to help you find the coverage you need.</p>
                    <div class="text-center">
                        <a href="{{ route('viewpolicies') }}" class="btn btn-primary">
                            View Our Policies</a>
                    </div>

                </div>
                <div class="col p-2">
                    <img src="{{ asset('images/insurance.jpg') }}" alt="Insurance" class="img-fluid rounded-pill">
                </div>
            </div>
        </div>

        <div class="mt-4 p-5 rounded container">
            <div class="row border align-items-center bg-white">
                <div class="col p-2">
                    <img src="{{ asset('images/insure.jpg') }}" alt="Insurance" class="img-fluid rounded-pill">
                </div>
                <div class="col p-3">
                    <h1 class="display-5">Why Choose Us?</h1>
                    <ul class="lead">
                        <li>Flexible coverage options</li>
                        <li>Competitive pricing</li>
                        <li>Exceptional customer service</li>
                        <li>Easy claims process</li>
                    </ul>
                    <a href="#" class="btn btn-primary">Get a Quote</a>
                </div>
            </div>
        </div>
    </div>
@stop
