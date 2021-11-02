@extends('user.master')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Available Warehouses</h1>
    </div>

    <div class="card shadow mb-4 p-4">
        <div class="card-body">
            @include('flash._notify')
            <div class="card shadow mb-4">
                <div class="card-body">
                    <a class="btn btn-circle btn-success" href="{{ route('user.add.warehouse') }}"><i class="fa fa-plus"></i></a>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Created On</th>
                                <th>Name</th>
                                <th>Region</th>
                                <th>longitude</th>
                                <th>latitude</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($warehouses as $warehouse)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($warehouse->created_at)->format('dS M Y') }}</td>
                                    <td>{{ $warehouse->name }}</td>
                                    <td>{{ $warehouse->region->name }}</td>
                                    <td>{{ $warehouse->longitude }}</td>
                                    <td>{{ $warehouse->latitude }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('user.view.warehouse.detail', $warehouse->id) }}">View</a>
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
