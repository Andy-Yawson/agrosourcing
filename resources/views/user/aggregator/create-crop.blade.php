@extends('user.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
@endsection
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Farm Crop</h1>
    </div>



    <div class="card shadow mb-4 p-5">
        <h5 class="font-weight-lighter">PROVIDE FARM DETAILS</h5>
        <p class="font-weight-normal">Choose a crop type, the wastes will be generated for you.</p>
        @include('flash._notify')
        <div class="card-body">
            <form action="{{ route('user.warehouse.addCrop.store',['warehouse'=>$id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Select Crop*</label>
                    <select name="crop" class="form-control">
                        @foreach($crops as $crop)
                            <option value="{{$crop->id}}">{{$crop->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="col-3">
                        <label for="">Currency*</label>
                        <select name="currency"  class="form-control">
                            <option value="GHS">GHS</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Price*</label>
                            <input type="number" class="form-control" name="price" value="{{ old('price') }}" required>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Package Quantity*</label>
                            <input type="number" class="form-control" name="package_quantity" value="{{ old('package_quantity') }}" required>
                        </div>
                    </div>
                    <div class="col-3">
                        <label for="">Quantity*</label>
                        <select name="quantity"  class="form-control">
                            <option value="Ton">Ton</option>
                            <option value="Kilogram">Kilogram</option>
                            <option value="Cubic feet">Cubic feet</option>
                            <option value="Cubic Meters">Cubic Meters</option>
                            <option value="Crate">Crate</option>
                            <option value="Bag">Bag</option>
                            <option value="Bottle">Bottle</option>
                            <option value="Unit">Unit</option>
                            <option value="Box">Box</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Crop Variety*</label>
                            <input type="text" class="form-control" name="crop_variety" value="{{ old('crop_variety') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Dryness/ Moisture Content*</label>
                            <input type="number" class="form-control" name="moisture_content" value="{{ old('moisture_content') }}">
                            <small>g/m³ (grams of water per cubic meter)</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Availability Period</label>
                            <div class="row">
                                <div class="col">
                                    <small>Start date</small>
                                    <input type="date" class="form-control" name="available_start" value="{{ old('available_start') }}">
                                </div>
                                <div class="col">
                                    <small>End date</small>
                                    <input type="date" class="form-control" name="available_end" value="{{ old('available_end') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Total Stock Available</label>
                            <div class="row">
                                <div class="col">
                                    <small>Quantity</small>
                                    <input type="number" class="form-control" name="total_stock_available" value="{{ old('total_stock_available') }}">
                                </div>
                                <div class="col">
                                    <small>Units</small>
                                    <select class="form-control" name="total_stock_available_unit">
                                        <option value="kg">kg</option>
                                        <option value="li">li</option>
                                        <option value="ton">ton(s)</option>
                                        <option value="bag">bag(s)</option>
                                        <option value="box">box(es)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Minimum Order Quantity</label>
                            <div class="row">
                                <div class="col">
                                    <small>Quantity</small>
                                    <input type="number" class="form-control" name="minimum_order_quantity" value="{{ old('minimum_order_quantity') }}">
                                </div>
                                <div class="col">
                                    <small>Units</small>
                                    <select class="form-control" name="minimum_order_quantity_unit">
                                        <option value="kg">kg</option>
                                        <option value="li">li</option>
                                        <option value="ton">ton(s)</option>
                                        <option value="bag">bag(s)</option>
                                        <option value="box">box(es)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="">Delivery Cost Description</label>
                        <textarea name="delivery_cost_description" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group mt-4 mb-4">
                    <p>Enable this if farm is organic</p>
                    <label class="switch">
                        <input type="checkbox" name="organic">
                        <span class="slider"></span>
                    </label>
                </div>
                <div class="form-group mt-4">
                    <button class="btn btn-primary w-50" type="submit">Add Farm Crop To Warehouse <i class="fa fa-arrow-right"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection
