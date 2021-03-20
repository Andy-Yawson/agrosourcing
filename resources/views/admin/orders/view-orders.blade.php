@extends('admin.master')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Available Orders</h1>
    </div>

    <div class="card shadow mb-4 p-4">
        <div class="card-body">
            @include('flash._notify')
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Manage All Orders</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Date Placed</th>
                                <th>Customer</th>
                                <th>Order Code</th>
                                <th>Payable Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('dS M Y') }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->code }}</td>
                                    <td>GH₵{{ $order->total }}</td>
                                    <td>
                                        @if($order->status == 1)
                                            <p class="text-warning font-weight-bold">Pending</p>
                                        @elseif($order->status == 2)
                                            <p class="text-success font-weight-bold">Confirmed</p>
                                        @elseif($order->status == 3)
                                            <p class="text-danger font-weight-bold">Declined</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('admin.orders.detail',['order_id'=>$order->id,'code'=>$order->code]) }}"><i class="fa fa-box-open"></i> View Details</a>
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
