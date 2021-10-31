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
                                    <td>{{ $warehouse->region->name }}</td>
                                    <td>{{ $warehouse->longitude }}</td>
                                    <td>{{ $warehouse->latitude }}</td>
                                    <td>
                                        @if($warehouse->visible == 0)
                                            <a class="btn btn-success" href="{{ route('user.open.sale.warehouse', $warehouse->id) }}">Offer for sale</a>
                                        @elseif($warehouse->visible == 1)
                                            <a class="btn btn-warning text-white" disabled>Pending Approval</a>
                                        @elseif($warehouse->visible == 2)
                                            <a class="btn btn-danger" href="{{ route('user.close.sale.warehouse', $warehouse->id) }}">Remove from live</a>
                                        @endif
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
