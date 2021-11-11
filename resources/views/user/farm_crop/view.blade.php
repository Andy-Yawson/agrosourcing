@extends('user.master')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Production Activities On Farms</h1>
    </div>

    <div class="card shadow mb-4 p-4">
        <div class="card-body">
            @include('flash._notify')
            <div class="card shadow mb-4">
                <div class="card-body">
                    <a class="btn btn-outline-success" href="{{ route('user.add.crop') }}"><i class="fa fa-plus"></i> Add Crop</a>
                    <a class="btn btn-primary" href="{{ route('user.farm.animal',['id'=>request('farm')]) }}"><i class="fa fa-plus"></i> Add Farm Animal</a>
                    <div class="table-responsive mt-2">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Created On</th>
                                <th>Crop</th>
                                <th>Waste</th>
                                <th>Organic</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($crops as $crop)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($crop->created_at)->format('dS M Y') }}</td>
                                    <td>{{ $crop->crop->name }}</td>
                                    <td>
                                        @foreach($crop->crop->wastes as $waste)
                                            <p>{{$waste->name}}</p>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if($crop->organic == 1)
                                            <p class="text-success">Yes</p>
                                        @else
                                            <p class="text-danger">No</p>
                                        @endif
                                    </td>
                                    <td>{{ $crop->currency }}{{ $crop->price }}</td>
                                    <td>{{ $crop->package_quantity }} {{ $crop->quantity }}</td>
                                    <td>
                                        @if($crop->visible == 0)
                                            <a class="btn btn-success" href="{{ route('user.open.sale.farm', $crop->id) }}">Offer for sale</a>
                                        @elseif($crop->visible == 1)
                                            <a class="btn btn-warning text-white" disabled>Pending Approval</a>
                                        @elseif($crop->visible == 2)
                                            <a class="btn btn-danger" href="{{ route('user.close.sale.farm', $crop->id) }}">Remove from marketplace</a>
                                        @endif
                                        <a class="btn btn-success" href="{{ route('user.detail.farm.crop', $crop->id) }}">Details</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body shadow mt-4">
        <div class="card shadow mb-4">
            <div class="card-body">
                <h4>All available animals on farm</h4>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Created On</th>
                            <th>No of Stock</th>
                            <th>Min Order Qty</th>
                            <th>Price</th>
                            <th>Delivery Desc</th>
                            <th>Animal</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($animals as $animal)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($animal->created_at)->format('dS M Y') }}</td>
                                <td>{{ $animal->no_of_stock }}</td>
                                <td>{{ $animal->min_order_qty }}</td>
                                <td>{{ $animal->currency . ' ' . $animal->unit_price }}</td>
                                <td>{{ $animal->delivery_desc }}</td>
                                <td>{{ $animal->animal->name }}</td>
                                <td>
                                    @if($animal->status == 0)
                                        <a class="btn btn-success" href="{{ route('user.open.sale.animal', $animal->id) }}">Offer for sale</a>
                                    @elseif($animal->status == 1)
                                        <a class="btn btn-warning text-white" disabled>Pending Approval</a>
                                    @elseif($animal->status == 2)
                                        <a class="btn btn-danger" href="{{ route('user.close.sale.animal', $animal->id) }}">Remove from sale</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
