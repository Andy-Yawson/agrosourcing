@extends('user.master')
@section('styles')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Warehouse</h1>
    </div>

    <div class="card shadow mb-4 p-3">
        <div class="card-body">
            @include('flash._notify')
            <form action="{{ route('user.store.warehouse') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Longitude">Longitude*</label>
                            <input type="text" name="longitude" class="form-control"  value="{{ old('longitude') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Latitude">Latitude*</label>
                            <input type="text" name="latitude" class="form-control"  value="{{ old('latitude') }}">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="region">Select Region*</label>
                            <select name="region" class="form-control" id="region">
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="district">Select District</label>
                            <select name="district" id="district" class="form-control">
                                @foreach($districts as $district)
                                    <option value="{{ $district->id }}" id="{{ $district->region_id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Select Crop Types*</label>
                            <select class="form-control select2-multi"
                                    name="crops[]" multiple="multiple" id="crops" required>
                                @foreach($crops as $crop)
                                    <option value="{{$crop->id}}">{{$crop->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="image">Warehouse Image*</label>
                            <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Type of warehouse*</label>
                            <select name="type_of_warehouse" class="form-control">
                                <option value="Certified Seed Storage">Certified Seed Storage</option>
                                <option value="Harvested Crop Storage">Harvested Crop Storage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <label>Warehouse Storage Capacity (cu ft)</label>
                        <input type="number" class="form-control" name="storage_capacity" required>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Other services*</label>
                            <select name="other_services" class="form-control">
                                <option value="Aflatoxin Testing">Aflatoxin Testing</option>
                                <option value="Grain Threshing">Grain Threshing</option>
                                <option value="Moisture Testing">Moisture Testing</option>
                                <option value="Weighing">Weighing</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Warehouse Certifications*</label>
                            <select name="warehouse_certification" class="form-control">
                                <option value="HACCP - (Hazard Analysis Critical Control Point)">HACCP - (Hazard Analysis Critical Control Point)</option>
                                <option value="GLOBAL GAP">GLOBAL GAP</option>
                                <option value="NOP USDA -Organic Certification">NOP USDA -Organic Certification</option>
                                <option value="EU BIO - Organic Certification">EU BIO - Organic Certification</option>
                                <option value="ISL Certification">ISL Certification</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <label>Other Certifications</label>
                        <input type="text" class="form-control" name="other_certification">
                        <small>Please Add any other Certifications you have that are not listed in the options and <b>separate with a comma</b></small>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-plus"></i> Add Warehouse
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.select2-multi').select2();

            var $select1 = $( '#region' ),
                $select2 = $( '#district' ),
                $options = $select2.find( 'option' );

            $select1.on( 'change', function() {
                $select2.html( $options.filter( '[id="' + this.value + '"]' ) );
            } ).trigger( 'change' );

        })
    </script>
@endsection
