@extends('website.website-master')
@section('web-content')
    <main class="pt-5">
        <section class="section-pagetop bg-bread p-5">
            <div class="container">
                <div class="m-auto">
                    <h2 class="font-weight-light text-white mt-5">Our Research</h2>
                </div>
            </div>
        </section>
        <!-- About Us-->
        <section class="pt-5 pb-5 mt-5 mb-5" id="about-us"mas>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs 12">
                        <img src="{{ asset('img/user_flow.svg') }}" alt="help icon" class="img-fluid" />
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs 12">
                        <h3 class="font-weight-light" style="line-height: 1.6em">
                            A major part of our work has to do with Research and Development. As at now, there is still a significant
                            disconnect between Academia and Industry. Our company therefore places emphasis on creating
                            opportunities for student researchers in Academic institutions who are involved in agricultural research
                            work that has the potential to provide solutions to the perennial problem of wastage in the agricultural
                            sector in Africa.
                        </h3>
                    </div>
                </div>
            </div>
        </section>

        <!-- Categories -->
        <section class="py-5 mt-5" id="what-we-do" style="background-color: #f1f1f1">
            <div class="container">
                <h2 class="font-weight-light" style="line-height: 1.6em">
                    It is our vision to set up state of the art, well equipped product research and development centers in
                    strategic locations to serve as a platform to enhance agricultural research in Africa.</h2>
            </div>
        </section>

        <section class="py-5 mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs 12">
                        <h3 class="font-weight-light pt-5" style="line-height: 1.6em">We invite Organizations, Governments and other Private sector players who share a similar vision in
                            curtailing agricultural wastage and ensuring food security to collaborate with us in building systems and
                            structures that will promote agricultural innovation in Africa.</h3>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs 12">
                        <img src="{{ asset('img/mission.svg') }}" alt="help icon" class="img-fluid" style="transform: scaleX(-1);-webkit-transform: scaleX(-1);"/>
                    </div>
                </div>
            </div>
        </section>

        @include('website.partials.banner')

    </main>
@endsection
