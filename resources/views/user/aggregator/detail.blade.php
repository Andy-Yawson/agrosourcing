@extends('user.master')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Warehouse Detail</h1>
    </div>

    <div class="card shadow mb-4 p-4">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <p class="font-weight-light"><span class="font-weight-bold">Loaction:</span> {{ $warehouse->region->name }}</p>
                    <p class="font-weight-light"><span class="font-weight-bold">Type of warehouse:</span> {{ $warehouse->type_of_warehouse }}</p>
                    <p class="font-weight-light"><span class="font-weight-bold">Storage capacity:</span> {{ $warehouse->storage_capacity }}</p>
                    <p class="font-weight-light"><span class="font-weight-bold">Warehouse Certification:</span> {{ $warehouse->warehouse_certification }}</p>
                    <p class="font-weight-light"><span class="font-weight-bold">Created:</span> {{ \Illuminate\Support\Carbon::parse($warehouse->created_at)->diffForHumans() }}</p>
                    <a class="w-75 btn btn-primary" href="{{ route('user.warehouse.addCrop',['warehouse'=>$warehouse->id]) }}">Add Crop</a>
                </div>
                <div class="col-6">
                    <div style="width: 50%">
                        <img src="{{ asset('img/warehouses/'.$warehouse->image) }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        @include('flash._notify')
        <div class="card shadow mb-4 p-3">
            <h3 class="lead">Crops stored in warehouse</h3>
            <div class="card-body">
                <a class="btn btn-circle btn-success" href="{{ route('user.warehouse.addCrop',['warehouse'=>$warehouse->id]) }}"><i class="fa fa-plus"></i></a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Created On</th>
                            <th>Crop</th>
                            <th>Organic</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($farmCrops as $crop)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($crop->created_at)->format('dS M Y') }}</td>
                                <td>{{ $crop->crop->name }}</td>

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
                                        <a class="btn btn-success" href="{{ route('user.warehouse.crop.open', $crop->id) }}">Offer for sale</a>
                                    @elseif($crop->visible == 1)
                                        <a class="btn btn-warning text-white" disabled>Pending Approval</a>
                                    @elseif($crop->visible == 2)
                                        <a class="btn btn-danger" href="{{ route('user.warehouse.crop.close', $warehouse->id) }}">Remove from live</a>
                                    @endif
                                    <a class="btn btn-success" href="{{ route('user.warehouse.crop.detail', $crop->id) }}">Details</a>
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
