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
                        <div class="bg-dark container fluid border rounded" style="opacity: 0.9;">
                            <h1 class="display-6 pt-2">BEST VEHICLE INSURANCE</h1>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="{{ asset('images/car_insure.jpg') }}" alt="Happy Customer" class="d-block img-fluid"
                        style="width:100%">
                    <div class="carousel-caption">
                        <div class="bg-dark border rounded " style="opacity: 0.9;">
                            <h1 class="display-6  pt-2">GET INSURED NOW</h1>
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

        <div class="container p-1">

            <div class="container pt-3">
                <div class="row align-items-center">
                    <div class="col-md text-center">
                        <h1 class="text-center display-5"><strong>We got you covered
                                <hr>
                            </strong> </h1>
                        <p class="lead">VT Insurance is a locally owned insurance company for Fijians. Together we build
                            this country we call our home and together we grow, for without you, we would simply be a
                            company without a soul. You are our soul. You make us tick. You make us innovate to serve you
                            better. And when we Fijians stand together, our strength as a nation will be incomparable.
                            Protecting yourself, your family, and your assets is important. We offer a wide range of
                            insurance options to help you find the coverage you need.</p>
                    </div>
                    <div class="col-md text-center">
                        <a href="{{ route('viewpolicies') }}" class="btn"
                            style="position: relative; display: inline-block;">
                            <img src="{{ asset('images/insurance.jpg') }}" alt="Insurance" class="img-fluid rounded-3"
                                style="filter: brightness(0.5);">
                            <span class="display-5"
                                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; z-index: 1;">View
                                Our Policies</span>
                        </a>
                    </div>

                </div>
            </div>


            <hr>
            <div class="row justify-content-center align-items-center g-2 ">

                <div class="col-md m-2">
                    <img src="{{ asset('images/insure.jpg') }}" alt="Insurance" class="img-fluid rounded-3">
                </div>
                <div class="col-md px-4">
                    <h1 class="display-5 text-center pt-3"> <strong> Why Choose Us?
                            <hr>
                        </strong></h1>
                    <ul class="lead text-center">
                        <li>Flexible coverage options</li>
                        <li>Competitive pricing</li>
                        <li>Exceptional customer service</li>
                        <li>Easy claims process</li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
@stop
