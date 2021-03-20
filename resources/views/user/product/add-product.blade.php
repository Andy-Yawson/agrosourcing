@extends('user.master')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product</h1>
    </div>

    <div class="card shadow mb-4 p-3">
        <div class="card-body">
            @include('flash._notify')
            <form action="{{ route('user.store.processing.product') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Processing Site*</label>
                    <select name="product"  class="form-control">
                        @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Name of Product</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Description of Product</label>
                            <textarea class="form-control" name="description" required rows="5"></textarea>
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Generated Wastes (Separate with comma if you have more than one)</label>
                            <input type="text" name="wastes" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Raw materials used (Separate with comma if you have more than one)</label>
                            <textarea class="form-control" name="materials" required rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Choose a picture for Product</label>
                    <input type="file" class="form-control" name="image" required>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="">Currency*</label>
                        <select name="currency"  class="form-control" required>
                            <option value="GHS">GHS</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Price*</label>
                            <input type="number" class="form-control" name="price" value="{{ old('price') }}" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="">Quantity*</label>
                        <select name="quantity"  class="form-control">
                            <option value="Ton">Ton</option>
                            <option value="Kilogram">Kilogram</option>
                            <option value="Cubic feet">Cubic feet</option>
                            <option value="Cubic Meters">Cubic Meters</option>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <button class="btn btn-primary btn-block" type="submit">
                        <i class="fa fa-plus"></i> Add Product
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            var $select1 = $( '#region' ),
                $select2 = $( '#district' ),
                $options = $select2.find( 'option' );

            $select1.on( 'change', function() {
                $select2.html( $options.filter( '[id="' + this.value + '"]' ) );
            } ).trigger( 'change' );
        })
    </script>
@endsection
