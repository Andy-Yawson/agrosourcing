@extends('website.website-master')
@section('web-content')
    <main class="pt-5">
        <section class="section-pagetop bg-bread p-5">
            <div class="container">
                <div class="m-auto">
                    <h2 class="font-weight-light text-white mt-5">About Us</h2>
                </div>
            </div>
        </section>
        <!-- About Us-->
        <section class="pt-5 pb-5 mt-5 mb-5" id="about-us"mas>
            <div class="container">
                <h3 class="display-4 text-heading">About Agrosourcing Ltd</h3>
                <p class="lead pb-3">Our greatness has always supported our push.</p>
                <div class="row mt-4 mb-4">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        @include('website.partials.slider')
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <p class="font-weight-light about-text">
                            Agro Sourcing Limited is a Ghanaian based Agricultural enterprise that is leveraging on technology to
                            curtail agricultural wastage in Africa and subsequently work with other agricultural companies to offer
                            sustainable, cost effective and environmentally friendly alternatives to traditional waste disposal
                            methods.
                        </p>
                    </div>
                </div>
                <h2 class="font-weight-light pt-5">Our approach to achieving these objectives is two-fold, namely;</h2>
                <div class="row pt-4">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="shadow-sm mb-5 bg-white p-4">
                            <h4 class="card-title text-uppercase font-weight-normal p-2 text-heading">DEVELOPMENT OF SUPPLY CHAIN TECHNOLOGIES</h4>
                            <p class="card-text lead">
                                We develop and offer robust, efficient and innovative supply chain technologies in the
                                agricultural sector that are capable of eliminating the bottlenecks that exists between
                                agricultural production and consumption.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="shadow-sm mb-5 bg-white p-4">
                            <h4 class="card-title text-uppercase font-weight-normal p-2 text-heading">VALUE ADDITION/ UPCYCLING OF PRODUCE AND RESIDUE</h4>
                            <p class="card-text lead">
                                We develop business models around agriculturally based waste as an alternative to traditional
                                waste disposal. We transform by-products and waste materials of agricultural production and
                                processing into new materials which can be used as inputs of other production activities.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Categories -->
        @include('website.partials.what_we_offer')


        @include('website.partials.partners')

    </main>
@endsection
