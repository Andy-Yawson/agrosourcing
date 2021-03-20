@extends('website.website-master')

@section('web-content')
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active" style="background-image: url('{{ asset('web/img/slider1.jpg') }}')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="display-4">Curtailing Agricultural Wastage</h3>
                        <p class="lead">By Innovative Supply Chain Technologies and Value Addition.</p>
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('{{ asset('web/img/slider2.jpg') }}')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="display-4">Brief Research and Management</h3>
                        <p class="lead">Form useful partnerships to research into and develop more value-added products from agricultural waste.</p>
                    </div>
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('{{ asset('web/img/slider3.jpg') }}')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="display-4">We invite Organizations, Governments and other Private sectors</h3>
                        <p class="lead">Ensuring food security to collaborate with us in building systems and structures that will promote agricultural innovation in Africa.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>
    <!-- Page Content -->
    <main class="pt-5">
        <!-- What we do-->
        <section class="pt-5 pb-5" id="our-skills">
            <div class="container">
                <h3 class="display-4 text-heading">Get The Best Of Us</h3>
                <p class="lead">Agro Sourcing Limited is working to curtail Agricultural wastage in Sub- Saharan Africa</p>
                <div class="row mt-4">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-2">
                        <div class="shadow">
                            <div class="card-body text-center">
                                <img src="{{ asset('web/img/location.svg') }}" alt="agric" height="100px" width="70px"/>
                                <h4 class="card-title text-uppercase font-weight-bold text-heading">ACCESS MAPS</h4>
                                <p class="card-text lead">Are you a researcher, policy maker, bulk buyer or agricultural Processing company?
                                    Access maps showing the precise quantities of agricultural produce/residue in specified geographic zones.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-2">
                        <div class="shadow">
                            <div class="card-body text-center">
                                <img src="{{ asset('web/img/order.svg') }}" alt="agric" height="100px" width="70px"/>
                                <h4 class="card-title text-uppercase font-weight-bold text-heading">MAKE AN ORDER</h4>
                                <p class="card-text lead">Make an instant order for specified agricultural produce/residue for convenient, timely delivery.Or schedule an order for future delivery (terms and conditions apply)
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-2">
                        <div class="shadow">
                            <div class="card-body text-center">
                                <img src="{{ asset('web/img/tractor.svg') }}" alt="agric" height="100px" width="70px"/>
                                <h4 class="card-title text-uppercase font-weight-bold text-heading">ADD A FARM </h4>
                                <p class="card-text lead">Get your farm found by bulk buyers, Processing companies, and other stakeholders with ease and convenience.It's time to get digitally included. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-2">
                        <div class="shadow">
                            <div class="card-body text-center">
                                <img src="{{ asset('web/img/delivery.svg') }}" alt="agric" height="100px" width="70px"/>
                                <h4 class="card-title text-uppercase font-weight-bold text-heading">ADD A WAREHOUSE </h4>
                                <p class="card-text lead">
                                    Do you have an existing Warehouse for agricultural storage?
                                    Or do you own a space that can be converted into an agricultural storage space?
                                    Get it listed here and play your in ensuring future food security</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('website.partials.banner')
        <!-- About Us-->
        <section class="pt-5 pb-5 mt-5 mb-5" id="about-us">
            <div class="container">
                <h3 class="display-4 text-heading">About Agrosourcing Ltd</h3>
                <p class="lead pb-3">Our greatness has always supported our push.</p>
                <div class="row mt-4">
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
            </div>
        </section>

        <!-- Categories -->
       @include('website.partials.what_we_offer')

        @include('website.partials.partners')

        <section class="py-5 mt-5" id="our-team" style="background-color: #f1f1f1">
            <div class="container">
                <h2 class="font-weight-light text-heading" >Our Team</h2>
                <p class="mb-5 lead">Below are the capable hands behind Agro Sourcing Limited</p>
                <div class="row mt-4">
                    <div class="col-xl-4 col-md-4 col-lg-4 mb-4">
                        <div class="card border-0 shadow">
                            <img src="{{ asset('web/img/team1.jpg') }}"
                                 class="card-img-top">
                            <div class="card-body text-center">
                                <h5 class="card-title mb-0">Richmond Zissu Nutsuglo</h5>
                                <div class="card-text text-black-50 pb-2 text-heading">CHIEF EXECUTIVE OFFICER</div>
                                <p class="lead">Studied Agricultural Science at the University of Ghana and majored in Post Harvest Technology. He worked as a farm advisor at the Tema Naval Base of the Ghana Armed Forces. Afterwards, Richmond became a farm manager for 2 private Greenhouse farms at Asesewa-Akateng in the Eastern Region of Ghana. In 2016 he began work at the British Council Ghana as a project assistant. Richmond's vast knowledge on post harvest technologies has been invaluable to the Agro Sourcing team</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 col-lg-4 mb-4">
                        <div class="card border-0 shadow">
                            <img src="{{ asset('web/img/team3.jpeg') }}"
                                 class="card-img-top">
                            <div class="card-body text-center">
                                <h5 class="card-title mb-0">Isaac Danso Asiedu</h5>
                                <div class="card-text text-black-50 pb-2 text-heading">CHIEF TECHNICAL OFFICER</div>
                                <p class="lead">Isaac Danso Asiedu is a trained Aerospace Engineer from the Kwame Nkrumah University of Science and Technology. He received a certificate from the Ghana Air Force School of Trade Training for his Aircraft Systems training. Isaac developed a love for software development and nurtured a dream of building scalable solutions to the many problems in the Ghanaian society. Isaac's experience in systems design and product development has been of immense benefit to the Agro Sourcing team.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
