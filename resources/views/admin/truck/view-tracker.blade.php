@extends('admin.master')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Available Truckers</h1>
    </div>

    <div class="card shadow mb-4 p-4">
        <div class="card-body">
            @include('flash._notify')
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Manage All Truckers</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Created On</th>
                                <th>Truck</th>
                                <th>Capacity</th>
                                <th>Region</th>
                                <th>Location</th>
                                <th>Owner</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($truckers as $trucker)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Carbon\Carbon::parse($trucker->created_at)->format('dS M Y') }}</td>
                                    <td>{{ $trucker->truck->name }}</td>
                                    <td>{{ $trucker->capacity }}</td>
                                    <td>{{ $trucker->region->name }}</td>
                                    <td>{{ $trucker->location }}</td>
                                    <td>{{ $trucker->user->name }}</td>
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
