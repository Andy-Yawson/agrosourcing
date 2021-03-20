@extends('user.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
@endsection
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Billing and Checkout</h1>
    </div>

    <div class="mb-4 p-4">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 card p-5">
                <h3 class="font-weight-light mb-3">Billing / Delivery Details</h3>
                <div class="">
                    <form action="{{ route('user.checkout') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control" name="first_name" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Company Name</label>
                            <input type="text" class="form-control" name="company_name">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Delivery Address</label>
                                    <input type="text" class="form-control" name="address" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Town/City</label>
                                    <input type="text" class="form-control" name="city" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Ghana Post GPS</label>
                                    <input type="text" class="form-control" name="ghana_post">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Phone Number</label>
                                    <input type="number" class="form-control" name="phone" required>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-weight-light mt-4 mb-4">Choose Payment Option</h3>
                            <div>
                                <div class="paymentCont">
                                    <div class="paymentWrap">
                                        <div class="paymentBtnGroup btn-group-justified" data-toggle="buttons">
                                            <label class="btn paymentMethod active">
                                                <div class="method visa"></div>
                                                <input type="radio" name="options" checked value="visa">
                                            </label>
                                            <label class="btn paymentMethod">
                                                <div class="method master-card"></div>
                                                <input type="radio" name="options" value="master">
                                            </label>
                                            <label class="btn paymentMethod">
                                                <div class="method mobile-money"></div>
                                                <input type="radio" name="options" value="mobile">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-5">
                            <button class="btn btn-success btn-block">
                                Place Order
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="container p-4 card">
                    <h3 class="font-weight-light mb-3">Your Order</h3>
                    <div class="row mb-3 subtotal">
                        <div class="col-6">
                            <h5 class="font-weight-bold">Subtotal</h5>
                        </div>
                        <div class="col-6">
                            <h5 class="font-weight-light text-dark">GHS {{ Cart::getSubTotal() }}</h5>
                        </div>
                    </div>
                    <div class="row mb-3 shipping">
                        <div class="col-6">
                            <h5 class="font-weight-bold">Delivery</h5>
                        </div>
                        <div class="col-6">
                            <h5 class="font-weight-light text-danger">GHS 0</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3 total">
                        <div class="col-6">
                            <h5 class="font-weight-bold">Total</h5>
                        </div>
                        <div class="col-6">
                            <h5 class="font-weight-bold text-success">GHS {{ Cart::getTotal() }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
