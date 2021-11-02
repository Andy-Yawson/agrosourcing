@extends('website.website-master')
@section('web-content')
    <main class="pt-5">
        <section class="section-pagetop bg-bread p-5">
            <div class="container">
                <div class="m-auto">
                    <h2 class="font-weight-light text-white mt-5">All Products</h2>
                </div>
            </div>
        </section>
        <!-- About Us-->
        <section class="pt-5 pb-5 mt-5 mb-5" id="about-us">
            <div class="container">
                <div class="">
                    @if(count($farms) > 0 or count($warehouses) > 0 or count($products) > 0)
                        <div class="row">
                            @foreach($farms as $farm)
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 mb-3">
                                    <div class="card shadow-sm">
                                        <img class="card-img-top" src="{{ asset('img/farms/'.$farm->image) }}" alt="warehouse image" height="200px">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fa fa-dot-circle text-success"></i> Farm</h5>
                                            <h6 class="card-text">{{ $farm->farm->user->name }}'s Farm</h6>
                                            <p class="card-text">Crop Type: {{ $farm->crop->name }}</p>
                                            <p class="card-text">Farm Size: {{ $farm->size }}</p>
                                            <p class="card-text">Price: {{$farm->currency}}{{ $farm->price }} per {{$farm->package_quantity}}{{$farm->quantity}}</p>
                                            <a href="{{ route('user.view.orderList.detail',['id'=>$farm->id,'type'=>'farm']) }}" class="btn btn-circle btn-primary"><i class="fa fa-cart-plus"></i></a>
                                            <p class="card-text"><small class="text-muted">Last updated {{\Carbon\Carbon::parse($farm->updated_at)->diffForHumans()}}</small></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @foreach($warehouses as $crop)
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 mb-3">
                                    <div class="card shadow-sm">
                                        <img class="card-img-top" src="https://via.placeholder.com/150" alt="warehouse image" height="200px">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fa fa-dot-circle text-warning"></i> Warehouse Crop</h5>
                                            <h6 class="card-text">
                                                @if($crop->user_id != null)
                                                    {{ $crop->user->name }}'s Warehouse
                                                    @if($crop->user->profile->company !== null) - {{ $crop->user->profile->company }}@endif
                                                @else
                                                    Agrosourcing Support
                                                @endif
                                            </h6>
                                            <p class="card-text">Variety: {{ $crop->crop_variety }}</p>
                                            <p class="card-text">Price: {{$crop->currency . $crop->price }} </p>
                                            <p class="card-text">Quantity: {{$crop->package_quantity . ' ' . $crop->quantity }} </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @foreach($products as $product)
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 mb-3">
                                    <div class="card shadow-sm">
                                        <img class="card-img-top" src="{{ asset('img/products/'.$product->image) }}" alt="product image" height="200px">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fa fa-dot-circle text-info"></i> Processing Company</h5>
                                            <h6 class="card-text">{{$product->name}}</h6>
                                            <p class="card-text">{{ $product->product->region->name }}</p>
                                            <p class="card-text">Material(s): {{$product->materials}} </p>
                                            <p class="card-text">Price: {{$product->currency}}{{ $product->price }} per {{$product->quantity}} </p>
                                            <a href="{{ route('user.view.orderList.detail',['id'=>$product->id,'type'=>'product']) }}" class="btn btn-circle btn-primary"><i class="fa fa-cart-plus"></i></a>
                                            <p class="card-text"><small class="text-muted">Last updated {{\Carbon\Carbon::parse($product->updated_at)->diffForHumans()}}</small></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <h3 class="font-weight-light">No items available to order</h3>
                    @endif
                </div>
            </div>
        </section>

    </main>
@endsection
