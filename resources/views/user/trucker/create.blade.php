@extends('user.master')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Trucker</h1>
    </div>



    <div class="card shadow mb-4 p-5">
        <h5 class="font-weight-lighter">PROVIDE TRUCK DETAILS</h5>
        <p class="font-weight-normal">All fields are required.</p>
        @include('flash._notify')
        <div class="card-body">
            <form action="{{ route('user.store.trucker') }}" method="post" >
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Capacity*</label>
                            <input type="number" class="form-control" name="capacity" value="{{ old('capacity') }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="unit">Unit*</label>
                            <select name="unit" id="unit" class="form-control">
                                <option value="Tons">Tons</option>
                                <option value="Cubic Feet">Cubic Feet</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
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
                            <label for="truck">Type*</label>
                            <select class="form-control" name="type" id="truck">
                                @foreach($trucks as $truck)
                                    <option value="{{$truck->id}}">{{ $truck->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="location">Location*</label>
                    <input type="text" name="location" class="form-control" value="{{ old('location') }}" id="location" required>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Add Truck Details <i class="fa fa-arrow-right"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection
