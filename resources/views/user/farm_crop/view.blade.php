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
                    <a class="btn btn-circle btn-success" href="{{ route('user.add.crop') }}"><i class="fa fa-plus"></i></a>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Created On</th>
                                <th>Crop</th>
                                <th>Size(Acres)</th>
                                <th>Waste</th>
                                <th>Organic</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($crops as $crop)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($crop->created_at)->format('dS M Y') }}</td>
                                    <td>{{ $crop->crop->name }}</td>
                                    <td>{{ $crop->size }}</td>
                                    <td>
                                        @foreach($crop->crop->wastes as $waste)
                                            <p>{{$waste->name}}</p>
                                        @endforeach
                                    </td>
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
                                        <a href="{{ asset('img/farms/'.$crop->image) }}" target="_blank" title="view image">
                                            <img src="{{ asset('img/farms/'.$crop->image) }}" alt="crop image" class="img-fluid" height="100px" width="60px">
                                        </a>
                                    </td>
                                    <td>
                                        @if($crop->visible == 0)
                                            <a class="btn btn-success" href="{{ route('user.open.sale.farm', $crop->id) }}">Offer for sale</a>
                                        @elseif($crop->visible == 1)
                                            <a class="btn btn-warning text-white" disabled>Pending Approval</a>
                                        @elseif($crop->visible == 2)
                                            <a class="btn btn-danger" href="{{ route('user.close.sale.farm', $crop->id) }}">Remove from marketplace</a>
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
