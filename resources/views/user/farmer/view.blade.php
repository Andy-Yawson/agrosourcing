@extends('user.master')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Available Farms</h1>
    </div>

    <div class="card shadow mb-4 p-4">
        <div class="card-body">
            @include('flash._notify')
            <div class="card shadow mb-4">
                <div class="card-body">
                    <a class="btn btn-circle btn-success" href="{{ route('user.add.farm') }}"><i class="fa fa-plus"></i></a>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Created On</th>
                                <th>Longitude</th>
                                <th>Latitude</th>
                                <th>Size</th>
                                <th>Region</th>
                                <th>Community</th>
                                <th>Code</th>
                                <th>Farm Crops</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($farms as $farm)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($farm->created_at)->format('dS M Y') }}</td>
                                    <td>{{ $farm->longitude }}</td>
                                    <td>{{ $farm->latitude }}</td>
                                    <td>{{ $farm->size }}</td>
                                    <td>{{ $farm->region->name }}</td>
                                    <td>{{ $farm->community == null ? "N/A" : $farm->community}}</td>
                                    <td>{{ $farm->code}}</td>
                                    <td><a href="{{ route('user.view.farm.crop',$farm->id) }}" class="btn btn-primary">View</a></td>
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
