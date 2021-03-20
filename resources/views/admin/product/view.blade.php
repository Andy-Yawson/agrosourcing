@extends('admin.master')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View Products</h1>
    </div>

    <div class="card shadow mb-4 p-2">
        <div class="card-body">
            @include('flash._notify')
            <div class=" mb-4">
                <div class="">
                    <a class="btn btn-circle btn-success" href="{{ route('admin.add.product') }}"><i class="fa fa-plus"></i></a>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Created On</th>
                                <th>Name</th>
                                <th>longitude</th>
                                <th>latitude</th>
                                <th>Region</th>
                                <th>Products</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($product->created_at)->format('dS M Y') }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->longitude }}</td>
                                    <td>{{ $product->latitude }}</td>
                                    <td>{{ $product->region->name }}</td>

                                    <td><a href="{{ route('admin.view.processing.product',$product->id) }}" class="btn btn-primary">View</a></td>
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
