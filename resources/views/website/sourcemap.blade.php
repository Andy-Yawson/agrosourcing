@extends('website.website-master')
@section('web-content')
    <main class="pt-5">
        <section class="section-pagetop bg-bread p-5">
            <div class="container">
                <div class="m-auto">
                    <h2 class="font-weight-light text-white mt-5">Source Maps</h2>
                </div>
            </div>
        </section>
        <!-- About Us-->
        <section class="pt-5 pb-5 mt-5 mb-5" id="about-us">
            <div class="container">
                <h3 class="font-weight-light pt-5" style="line-height: 1.6em">SourceMap by Agro Sourcing is a data driven web platform that captures the precise demographics of
                    various agricultural activities and estimates the generation of agricultural produce and residue.</h3>
            </div>
        </section>

        <!-- Categories -->
        <section class="py-5 mt-5" id="what-we-do" style="background-color: #f1f1f1">
            <div class="container">
                <h2 class="font-weight-light text-heading"><img src="{{ asset('img/help.svg') }}" alt="help icon" height="40px"/> Our Services</h2>
                <p class="mb-5 lead">A number of services are offered through the SourceMap platform. They include</p>

                <div class="row">
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                        <div class="shadow-sm mb-5 bg-white p-4">
                            <h4 class="card-title text-uppercase font-weight-normal p-2 text-uppercase text-heading">Commodity Supply Services</h4>
                            <p class="card-text lead">
                                Produce and Residue Sourcing: Agricultural Commodity retailers can source for commodities
                                from our extensive list of growers. Companies that use semi processed agricultural residue can
                                search on our platform to find listed produce and semi processed residues.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                        <div class="shadow-sm mb-5 bg-white p-4">
                            <h4 class="card-title text-uppercase font-weight-normal p-2 text-uppercase text-heading">Research Services</h4>
                            <p class="card-text lead">
                                Research Consultancy Services: Individuals, Organizations and Corporations who need to
                                compile or access data to complete their agricultural research work will find SourceMap as a
                                useful tool to serve their needs. Agro Sourcing Limited provides customised research
                                consultancy services in the agricultural sector
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                        <div class="shadow-sm mb-5 bg-white p-4">
                            <h4 class="card-title text-uppercase font-weight-normal p-2 text-uppercase text-heading">Management Services</h4>
                            <p class="card-text lead">
                                Out Grower Scheme Management: Commercial Farms, Agricultural Processing Companies and
                                other bulk buyers who need produce which meet specific standards can be connected to
                                validated growers in specific locations on our Platform to produce to their required standards
                                and quantities while monitoring the whole process virtually. This service can be customized to
                                fit the specific needs of your business.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('website.partials.banner')

    </main>
@endsection
