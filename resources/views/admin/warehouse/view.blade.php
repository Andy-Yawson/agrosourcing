@extends('admin.master')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Available Warehouses</h1>
    </div>

    <div class="card shadow mb-4 p-2">
        <div class="card-body">
            @include('flash._notify')
            <div class="mb-4">
                <div class="">
                    <a class="btn btn-circle btn-success" href="{{ route('admin.add.warehouse') }}"><i class="fa fa-plus"></i></a>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Created On</th>
                                <th>Name</th>
                                <th>Owner</th>
                                <th>Region</th>
                                <th>District</th>
                                <th>longitude</th>
                                <th>latitude</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($warehouses as $warehouse)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($warehouse->created_at)->format('dS M Y') }}</td>
                                    <td>{{  $warehouse->name }}</td>
                                    <td>@if ($warehouse->user_id != null){{$warehouse->user->name}}@else N/A @endif</td>
                                    <td>{{ $warehouse->region->name }}</td>
                                    <td>{{ $warehouse->district->name }}</td>
                                    <td>{{ $warehouse->longitude }}</td>
                                    <td>{{ $warehouse->latitude }}</td>
                                    <td>
                                        @if(auth()->user()->level == 1)
                                            <a class="btn btn-primary" href="{{ route('admin.view.warehouse.detail', $warehouse->id) }}">View</a>
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
