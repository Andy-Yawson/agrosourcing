@extends('admin.master')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Available Farm Animals</h1>
    </div>

    <div class="card shadow mb-4 p-4">
        <div class="card-body">
            @include('flash._notify')
            <div class="card shadow mb-4">
                <div class="card-body">
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
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
