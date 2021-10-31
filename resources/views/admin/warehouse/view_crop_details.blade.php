@extends('admin.master')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-5 mr-5">
        <h1 class="h3 mb-0 text-gray-800">Warehouse Crop Detail</h1>
    </div>

    <div class="card shadow mb-4 m-5 p-4">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <p class="lead"><span class="font-weight-bold">Price:</span> {{ $detail->currency . '' .$detail->price }}</p>
                    <p class="lead"><span class="font-weight-bold">Package:</span> {{ $detail->package_quantity . '' .$detail->quantity }}</p>
                    <p class="lead"><span class="font-weight-bold">Crop Variety:</span> {{ $detail->crop_variety }}</p>
                    <p class="lead"><span class="font-weight-bold">Moisture Content:</span> {{ $detail->moisture_content }}</p>
                    <p class="lead"><span class="font-weight-bold">Start Date:</span> {{ $detail->available_start }}</p>
                    <p class="lead"><span class="font-weight-bold">End Date:</span> {{ $detail->available_end }}</p>
                </div>
                <div class="col-6">
                    <p class="lead"><span class="font-weight-bold">Total Stock Available:</span> {{ $detail->total_stock_available . '/' .$detail->total_stock_available_unit }}</p>
                    <p class="lead"><span class="font-weight-bold">Minimum Order Quantity:</span> {{ $detail->minimum_order_quantity . '/' . $detail->minimum_order_quantity_unit}}</p>
                    <p class="lead"><span class="font-weight-bold">Delivery Cost Description:</span> {{ $detail->delivery_cost_description }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
