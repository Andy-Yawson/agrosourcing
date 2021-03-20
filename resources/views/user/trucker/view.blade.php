@extends('user.master')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Available Truckers</h1>
    </div>

    <div class="card shadow mb-4 p-4">
        <div class="card-body">
            @include('flash._notify')
            <div class="card shadow mb-4">
                <div class="card-body">
                    <a class="btn btn-circle btn-success" href="{{ route('user.add.trucker') }}"><i class="fa fa-plus"></i></a>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Created On</th>
                                <th>Truck</th>
                                <th>Capacity</th>
                                <th>Unit</th>
                                <th>Region</th>
                                <th>Location</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($truckers as $trucker)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($trucker->created_at)->format('dS M Y') }}</td>
                                    <td>{{ $trucker->truck->name }}</td>
                                    <td>{{ $trucker->capacity }}</td>
                                    <td>{{ $trucker->unit }}</td>
                                    <td>{{ $trucker->region->name }}</td>
                                    <td>{{ $trucker->location }}</td>
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
