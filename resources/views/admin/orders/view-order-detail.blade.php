@extends('admin.master')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Order Details</h1>
    </div>

    <div class="card shadow mb-4 p-4">
        <div class="card-body">
            @include('flash._notify')
            <div class="row mb-5">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="list-group shadow-sm">
                        <button type="button" class="list-group-item list-group-item-action active">
                            Customer Personal Details
                        </button>
                        <button type="button" class="list-group-item list-group-item-action" disabled>Name: {{ $order->shipping->name }}</button>
                        <button type="button" class="list-group-item list-group-item-action" disabled>Phone: {{ $order->shipping->phone }}</button>
                        <button type="button" class="list-group-item list-group-item-action" disabled>Email: {{ $order->user->email }}</button>
                        <button type="button" class="list-group-item list-group-item-action" disabled>Payable Amount: GH₵{{ $order->total }}</button>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="list-group shadow-sm">
                        <button type="button" class="list-group-item list-group-item-action active">
                            Customer Shipping Details
                        </button>
                        <button type="button" class="list-group-item list-group-item-action" disabled>Company: {{ $order->shipping->company }}</button>
                        <button type="button" class="list-group-item list-group-item-action" disabled>Address: {{ $order->shipping->address }}</button>
                        <button type="button" class="list-group-item list-group-item-action" disabled>City: {{ $order->shipping->city }}</button>
                        <button type="button" class="list-group-item list-group-item-action" disabled>Payment Method: {{ $order->payment->method }}</button>
                    </div>
                </div>
            </div>

            <div class="pt-5">
                <h3 class="font-weight-light">Product Details</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Price</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Sub Total</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($order_details as $detail)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $detail->name }}</td>
                                <td>{{ $detail->type }}</td>
                                <td>GH₵{{ $detail->price }}</td>
                                <td>{{ $detail->qty }}</td>
                                <td>GH₵{{ $detail->price * $detail->qty }}</td>
                            </tr>
                        @endforeach
                        <tr>
                           <td colspan="5"></td>
                            <td>
                                <?php
                                    $amt = 0;
                                    foreach ($order_details as $detail){
                                        $amt += $detail->price * $detail->qty;
                                    }
                                ?>
                                <b>Total: GH₵<?php echo $amt; ?></b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td>
                                <a class="btn btn-success" href="{{ route('admin.orders.confirm',$order->id) }}">Confirm</a>
                                <a class="btn btn-danger" href="{{ route('admin.orders.decline',$order->id) }}">Decline</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
