@extends('user.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Shopping Cart <i class="fa fa-shopping-cart"></i></h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <h2 class="font-weight-light p-4">All Cart</h2>
            @include('flash._notify')
            <div class="card shopping-cart">
                <div class="card-header bg-dark text-light">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    Shopping cart
                </div>
                @if(Cart::getContent()->count() > 0)
                    <div class="card-body">
                        <!-- PRODUCT -->
                        @foreach(Cart::getContent() as $item)
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-2 text-center">
                                    @if($item->attributes->type == 'farm')
                                    <img class="img-responsive"
                                         src="{{ asset('img/farms/'.$item->attributes->image) }}" alt="prewiew" width="120" height="80">
                                    @elseif($item->attributes->type == 'warehouse')
                                        <img class="img-responsive"
                                             src="{{ asset('img/warehouses/'.$item->attributes->image) }}" alt="prewiew" width="120" height="80">
                                    @elseif($item->attributes->type == 'processing company')
                                        <img class="img-responsive"
                                             src="{{ asset('img/products/'.$item->attributes->image) }}" alt="prewiew" width="120" height="80">
                                    @endif
                                </div>
                                <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                                    <h4 class="product-name"><strong>{{ $item->name }}</strong></h4>
                                    <h4>
                                        <small>{{$item->attributes->crop}}</small>
                                    </h4>
                                </div>
                                <div class=" col-sm-12 text-sm-center col-md-4 text-md-right row">
                                    <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                        <h6><strong>{{$item->attributes->currency}}{{ $item->price }} <span class="text-muted">x</span></strong></h6>
                                    </div>
                                    <div class="col-4 col-sm-4 col-md-4">
                                        <div class="quantity">
                                            <form action="{{ route('user.update.cart') }}" method="POST">
                                                @csrf
                                                <input type="number" max="99" min="1" value="{{$item->quantity}}" title="Qty" class="qty"
                                                       size="4" name="qty">
                                                <input type="hidden" name="rowId" value="{{ $item->id }}">
                                                <button class="btn" type="submit">update</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-2 col-sm-2 col-md-2 text-right">
                                        <a type="button" class="btn btn-outline-danger btn-xs" href="{{ route('user.remove.cart',$item->id) }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <div class="pull-right" style="margin: 10px">
                            <a href="{{ route('user.view.billing') }}" class="btn btn-success float-right ml-4">Checkout</a>
                            <div class="float-right" style="margin: 5px">
                                Total price: <b>GHS{{ Cart::getTotal() }}</b>
                            </div>
                        </div>
                    </div>
                @else
                    <h4 class="font-weight-bold text-center p-5">
                        Your cart is empty <i class="fa fa-box-open"></i>
                    </h4>
                @endif
            </div>
        </div>
    </div>
@endsection

