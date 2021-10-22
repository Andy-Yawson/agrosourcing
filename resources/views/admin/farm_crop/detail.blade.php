@extends('admin.master')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">More Info</h1>
    </div>

    <div class="card shadow mb-4 p-4">
        <div class="card-body">
            @include('flash._notify')
            <div class="mb-4 p-5">
                <div class="row">
                    <div class="col-6">
                        <p class="font-weight-light"><span class="font-weight-bold">Price</span>: {{ $farmCrop->currency.' '.$farmCrop->price }}</p>
                        <p class="font-weight-light"><span class="font-weight-bold">Quantity</span>: {{ $farmCrop->package_quantity . '/' . $farmCrop->quantity }}</p>
                        <p class="font-weight-light"><span class="font-weight-bold">Organic</span>: {{ $farmCrop->organic == 0 ? 'No':'Yes' }}</p>
                        <p class="font-weight-light"><span class="font-weight-bold">Crop Variety</span>: {{ $farmCrop->crop_variety}}</p>
                        <p class="font-weight-light"><span class="font-weight-bold">Moisture Content</span>: {{ $farmCrop->moisture_content}}</p>
                        <p class="font-weight-light"><span class="font-weight-bold">Available to Start</span>: {{ \Carbon\Carbon::parse($farmCrop->available_start)->format('dS M Y') }}</p>
                        <p class="font-weight-light"><span class="font-weight-bold">End Availability</span>: {{ \Carbon\Carbon::parse($farmCrop->available_end)->format('dS M Y') }}</p>
                        <p class="font-weight-light"><span class="font-weight-bold">Stock Available</span>: {{ $farmCrop->total_stock_available . '/ ' . $farmCrop->total_stock_available_unit }}</p>
                        <p class="font-weight-light"><span class="font-weight-bold">Minimum Quantity</span>: {{ $farmCrop->minimum_order_quantity . '/ ' . $farmCrop->minimum_order_quantity_unit }}</p>
                        <p class="font-weight-light"><span class="font-weight-bold">Delivery cost desc</span>: {{ $farmCrop->delivery_cost_description }}</p>
                        <p class="font-weight-light"><span class="font-weight-bold">Created</span>: {{ \Carbon\Carbon::parse($farmCrop->created_at)->diffForHumans() }}</p>
                    </div>
                    <div class="col-6">
                        <img src="{{ asset('img/farms/'.$farmCrop->image) }}" alt="crop image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
