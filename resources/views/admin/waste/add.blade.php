@extends('admin.master')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Crop Wastes</h1>
    </div>
    <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
            <div class="card shadow mb-4">
                @include('flash._notify')
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Manage All Waste</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Reg Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($wastes as $waste)
                                <tr>
                                    <td>{{ $waste->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($waste->created_at)->format('dS M Y H:iA') }}</td>
                                    <td>
                                       <a class="btn btn-circle btn-danger" href="{{ route('admin.delete.waste',$waste->id) }}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
            <div class="card shadow p-4">
                <h5 class="font-weight-light mb-3">Add New Waste</h5>
                <form action="{{ route('admin.post.waste') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Waste Name</label>
                        <input type="text" name="waste" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Select a crop type</label>
                        <select name="crop"  class="form-control">
                            <option value="">==== Select crop ====</option>
                            @foreach($crops as $crop)
                                <option value="{{ $crop->id }}">{{ $crop->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Add Waste <i class="fa fa-plus"></i></button>
                </form>
            </div>
        </div>
    </div>

@endsection
