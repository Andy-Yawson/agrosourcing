@extends('user.master')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product</h1>
    </div>

    <div class="card shadow mb-4 p-3">
        <div class="card-body">
            @include('flash._notify')
            <form action="{{ route('user.store.product') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="container">
                        <div class="form-group">
                            <label for="name">Name of Business</label>
                            <input type="text" class="form-control" name="business" required>
                        </div>
                        <div class="form-group">
                            <label for="region">Select Region</label>
                            <select name="region" class="form-control" id="region">
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="district">Select District</label>
                            <select name="district" id="district" class="form-control">
                                @foreach($districts as $district)
                                    <option value="{{ $district->id }}" id="{{ $district->region_id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Longitude</label>
                                    <input type="text" class="form-control" name="longitude">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Latitude</label>
                                    <input type="text" class="form-control" name="latitude">
                                </div>
                            </div>
                        </div>

                    <div class="form-group mt-4">
                        <button class="btn btn-primary btn-block" type="submit">
                            <i class="fa fa-plus"></i> Add Product
                        </button>
                    </div>
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
