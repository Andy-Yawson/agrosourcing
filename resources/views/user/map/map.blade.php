@extends('user.master')
@section('styles')
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
<script src="https://api.mapbox.com/mapbox-gl-js/v1.10.0/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v1.10.0/mapbox-gl.css" rel="stylesheet" />
<style>
    #map { height: 500px;top: 0;
        bottom: 0; }
    .mapboxgl-canvas{
        width: 767px !important;
        height: 500px !important;
    }
    .marker {
        background-image: url('{{asset('img/marker-icon.png')}}');
        background-size: cover;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        cursor: pointer;
    }
    .mapboxgl-popup {
        max-width: 200px;
    }

    .mapboxgl-popup-content {
        text-align: center;
        font-family: 'Open Sans', sans-serif;
    }
</style>
@endsection
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Access Map</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            @include('flash._notify')
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Number of Related Farms
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ count($farms) }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file-archive fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Size of Related Farms (Acres)
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        @if(count($farms) > 0)
                                            <?php $total = 0; ?>
                                            @foreach($farms as $farm)
                                                <?php $total += $farm->size; ?>
                                            @endforeach
                                            {{ $total }}
                                        @else
                                            0
                                        @endif
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file-archive fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Number of Related Warehouses
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ count($warehouses) }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file-archive fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Number of Related Processing Companies
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ count($products) }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file-archive fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4">
                    <div class="shadow-sm p-3">
                        <h4 class="font-weight-light mb-4">Farm Waste(s) Generated</h4>
                        @if(count($farms) > 0)
                            @foreach($farms as $farm)
                                @foreach($farm->crop->wastes as $waste)
                                    <p class="font-weight-bold">- {{ $waste->name }}</p>
                                @endforeach
                            @endforeach
                        @else
                            <p>No wastes found</p>
                        @endif
                    </div>
                </div>
                <div class="col-4">
                    <div class="shadow-sm p-3">
                        <h4 class="font-weight-light mb-4">Warehouse Waste(s) Generated</h4>
                        @if(count($warehouses) > 0)
                            @foreach($warehouses as $warehouse)
                                @foreach($warehouse->crops as $crop)
                                    @foreach($crop->wastes as $waste)
                                        <p class="font-weight-bold">- {{ $waste->name }}</p>
                                    @endforeach
                                @endforeach
                            @endforeach
                        @else
                            <p>No wastes found</p>
                        @endif
                    </div>
                </div>
                <div class="col-4">
                    <div class="shadow-sm p-3">
                        <h4 class="font-weight-light mb-4">Processing Waste(s) Generated</h4>
                        @if(count($products) > 0)
                            @foreach($products as $product)
                                <p>- {{ $product->wastes }}</p>
                            @endforeach
                        @else
                            <p>No wastes found</p>
                        @endif
                    </div>
                </div>
            </div>
{{--            <div class="col-4 offset-4 mt-5">--}}
{{--                <div class="form-group">--}}
{{--                    <a class="btn btn-primary btn-block" href="#" data-toggle="modal" data-target="#mapModal">--}}
{{--                        View Map--}}
{{--                        <i class="fa fa-map-marker-alt"></i>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
    <div class="modal fade" id="mapModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Map View</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="map" class="w-100 mw-100"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiYW5keTA1NCIsImEiOiJjazVmOHlvMzYwNXJ4M2tvNmV4dDlkYmJqIn0.lSHrnADHWaRsb08uqECHRg';
        let map = new mapboxgl.Map({
            container: 'map', // container id
            style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
            center: [-0.020000, 5.550000], // starting position [lng, lat]
            zoom: 9 // starting zoom
        });
        var geojson = [];
        /*let marker1 = new mapboxgl.Marker()
            .setLngLat([-0.020000, 5.550000])
            .addTo(map);*/
        @foreach($farms as $farm)
        let _geoFarm_{{$loop->iteration}} = {
            type: 'FeatureCollection',
            features:[
                {
                    type: 'Feature',
                    geometry: {
                        type: 'Point',
                        coordinates: [{{ $farm->latitude }}, {{ $farm->longitude }}]
                    },
                    properties: {
                        title: @if($farm->user_id == null)"Agrosourcing Support"@else"{{ $farm->user->name }}'s Farm"@endif,
                        description: 'Need to add some description here.',
                        _id: '{{ $farm->id }}',
                        type: 'farm',
                    }
                }
            ]
        };
        geojson.push(_geoFarm_{{$loop->iteration}});
        @endforeach
        @foreach($warehouses as $warehouse)
        let _geoWarehouse_{{$loop->iteration}} = {
            type: 'FeatureCollection',
            features:[
                {
                    type: 'Feature',
                    geometry: {
                        type: 'Point',
                        coordinates: [{{ $warehouse->latitude }}, {{ $warehouse->longitude }}]
                    },
                    properties: {
                        title: @if($warehouse->user_id == null)"Agrosourcing support"@else"{{ $warehouse->user->name }}'s Warehouse"@endif,
                        description: 'Need to add some description here.',
                        _id: '{{ $warehouse->id }}',
                        type: 'warehouse',
                    }
                }
            ]
        };
        geojson.push(_geoWarehouse_{{$loop->iteration}});
        @endforeach
        @foreach($products as $product)
        let _geoProd_{{$loop->iteration}} = {
            type: 'FeatureCollection',
            features:[
                {
                    type: 'Feature',
                    geometry: {
                        type: 'Point',
                        coordinates: [{{ $product->latitude }}, {{ $product->longitude }}]
                    },
                    properties: {
                        title: "{{ $product->name }}",
                        description: 'Click checkout to add to cart',
                        _id: '{{ $product->id }}',
                        type: 'product',
                    }
                }
            ]
        };
        geojson.push(_geoProd_{{$loop->iteration}});
        @endforeach
        //console.log("YOLO",geojson);
        // add markers to map
        geojson.map((feature,index) =>
            feature.features.forEach(function(marker) {
                // create a HTML element for each feature
                var el = document.createElement('div');
                el.className = 'marker';
                let link = `/user/product/${marker.properties._id}/order/${marker.properties.type}`;
                // make a marker for each feature and add to the map
                new mapboxgl.Marker(el)
                    .setLngLat(marker.geometry.coordinates)
                    .setPopup(new mapboxgl.Popup({ offset: 25 }) // add popups
                        .setHTML('<h5>' + marker.properties.title + '</h5>' +
                            '<p>' + marker.properties.description + '</p>'+"<a href='"+link+"'>Go to Checkout</a>"))
                    .addTo(map);
            })
        );
    </script>
@endsection
