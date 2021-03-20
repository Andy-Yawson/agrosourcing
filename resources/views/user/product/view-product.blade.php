@extends('user.master')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View Processing Sites</h1>
    </div>

    <div class="card shadow mb-4 p-4">
        <div class="card-body">
            @include('flash._notify')
            <div class="card shadow mb-4">
                <div class="card-body">
                    <a class="btn btn-circle btn-success" href="{{ route('user.add.product') }}"><i class="fa fa-plus"></i></a>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Created On</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Materials</th>
                                <th>Waste</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($product->created_at)->format('dS M Y') }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->currency }}{{$product->price}} per {{ $product->quantity }}</td>
                                    <td>{{ $product->materials }}</td>
                                    <td>{{ $product->wastes }}</td>
                                    <td>
                                        <a href="{{ asset('img/products/'.$product->image) }}" target="_blank" title="view image">
                                            <img src="{{ asset('img/products/'.$product->image) }}" alt="crop image" class="img-fluid" height="100px" width="60px">
                                        </a>
                                    </td>
                                    <td>
                                        @if($product->visible == 0)
                                            <a class="btn btn-success" href="{{ route('user.open.sale.product', $product->id) }}">Offer for sale</a>
                                        @elseif($product->visible == 1)
                                            <a class="btn btn-warning text-white" disabled>Pending Approval</a>
                                        @elseif($product->visible == 2)
                                            <a class="btn btn-danger" href="{{ route('user.close.sale.product', $product->id) }}">Remove from live</a>
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
    </div>
@endsection
