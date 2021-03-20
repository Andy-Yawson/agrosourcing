@extends('website.website-master')
@section('web-content')
    <main class="pt-5">
        <section class="section-pagetop bg-bread p-5">
            <div class="container">
                <div class="m-auto">
                    <h2 class="font-weight-light text-white mt-5">UpCycling</h2>
                </div>
            </div>
        </section>
        <!-- About Us-->
        <section class="pt-5 pb-5 mt-5 mb-5" id="about-us"mas>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs 12">
                        <img src="{{ asset('img/recycle.svg') }}" alt="help icon" class="img-fluid" />
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs 12">
                        <h3 class="font-weight-light pt-5" style="line-height: 1.6em">Value Addition or Upcycling is one of the very effective ways in tackling the whole phenomenon of
                            agricultural wastage. For this reason, Agro Sourcing Limited actively forges useful collaborations with
                            researchers, Academic Institutions, Government and other Private sector players to build business
                            models around generated agricultural waste.</h3>
                    </div>
                </div>
            </div>
        </section>

        <!-- Categories -->
        <section class="py-5 mt-5" id="what-we-do" style="background-color: #f1f1f1">
            <div class="container">
                <p class="font-weight-light lead">
                    Currently, we have a number of value-added products in various stages of development which are being
                    formed from several agricultural by-products and residues. These include</p>
                    <ul class="mt-3" style="list-style-type: square;list-style-position: outside;">
                        <li class="pt-3 font-weight-normal lead text-heading">Crude Potassium Carbonate from Cocoa Pod Husks</li>
                        <li class="pt-3 font-weight-normal lead text-heading">Compost from fruit and vegetable waste</li>
                        <li class="pt-3 font-weight-normal lead text-heading">Essential Oils from some plant residue</li>
                    </ul>
            </div>
        </section>

        <section class="py-5 mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs 12">
                        <h3 class="font-weight-light pt-5" style="line-height: 1.6em">Agro Sourcing Limited will continue to form useful partnerships to research into and develop more
                            value-added products from agricultural waste with the aim of protecting our physical environment and
                            also creating economic opportunities of people dwelling in rural agricultural communities.</h3>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs 12">
                        <img src="{{ asset('img/environment.svg') }}" alt="help icon" class="img-fluid"style="transform: scaleX(-1);-webkit-transform: scaleX(-1);"/>
                    </div>
                </div>
            </div>
        </section>

        @include('website.partials.banner')

    </main>
@endsection
