@extends('user.master')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Your Selected Product</h1>
    </div>

    <div class="shadow mb-4 p-4">
        <h3 class="font-weight-light p-3">Product Details</h3>
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <img class="card-img-top" src="{{ asset('img/farms/'.$farm->image) }}" alt="farm image" height="400px">
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <h2 class="font-weight-bold mb-3">
                    Project By - {{ $farm->farm->user->name }} Farms
                </h2>
                @if($farm->user_id != null)
                    @if($farm->user->profile->company !== null)
                        <h3 class="font-weight-light mb-3">{{ $farm->user->profile->company }}</h3>
                    @endif
                @endif
                <h4 class="font-weight-light mb-3">Crop Type: {{ $farm->crop->name }}</h4>
                <h4 class="font-weight-light mb-3">Price: {{ $farm->currency }}{{ $farm->price }} per {{$farm->package_quantity}}{{ $farm->quantity }}</h4>
                <h4 class="font-weight-light mb-3">Land Size: {{ $farm->size }} Acres</h4>
{{--                <h4 class="font-weight-light mb-3">Location: {{ $farm->region->name }}</h4>--}}
                <div class="col-4 mt-4">
                    <div class="form-group">
                        <label for="">Product Quantity</label>
                        <input type="number" class="form-control" min="1" value="1" id="cartQty">
                    </div>
                    <button class="btn btn-primary" id="cartBtn"><i class="fa fa-cart-plus"></i> Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
    <div class="shadow mb-4 p-4">
        @include('flash._notify')
        <h3 class="font-weight-light p-3">Product Reviews</h3>
        <div class="row">
            <div class="col-md-8 col-lg-8 col-sm-12">
                @if(count($reviews) > 0)
                    @foreach($reviews as $review)
                        <div class="media mb-4">
                            <img class="align-self-start mr-3 rounded" src="https://www.gravatar.com/avatar/{{md5($review->user->email)}}"
                                 alt="email placeholder image" width="50px" height="50px">
                            <div class="media-body">
                                <h5 class="mt-0">{{$review->user->name}}</h5>
                                <p class="mb-0">{{ $review->comment }}</p>
                                <small>Posted - {{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</small>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h3>No reviews found for this</h3>
                @endif
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <form action="{{ route('user.review.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" value="{{auth()->user()->name}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" class="form-control" value="{{auth()->user()->email}}" readonly>
                    </div>
                    <input type="hidden" name="product_id" value="{{ $farm->id }}">
                    <input type="hidden" name="type" value="farm">
                    <div class="form-group">
                        <label for="name">Comment</label>
                        <textarea class="form-control" rows="5" required name="comment"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Item Added</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="font-weight-light">Your Item is Successfully Added To Cart</h3>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('user.view.orderList') }}" class="btn btn-secondary">Continue Shopping</a>
                    <a href="{{ route('user.view.cart') }}" class="btn btn-primary">Checkout</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        var btn = $('#cartBtn');
        btn.click(function () {
            var qty = $('#cartQty').val();
            if (qty < 1){
                alert("Quantity has to be more than one")
            }else{
                $.ajax({
                    method: "GET",
                    url: "{{ route('user.add.cart',['id'=>$farm->id,'type'=>'farm']) }}?qty="+qty,
                    success: function (data) {
                        if (data.success){
                            $('#successModal').modal('show');
                        }
                    },
                    error: function (err) {
                        console.log(err)
                    }
                })
            }
        })
    })
</script>
@endsection
