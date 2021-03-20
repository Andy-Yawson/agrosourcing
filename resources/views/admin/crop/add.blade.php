@extends('admin.master')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Crops</h1>
    </div>
    <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
            <div class="card shadow mb-4">
                @include('flash._notify')
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Manage All Crops</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Reg Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($crops as $crop)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $crop->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($crop->created_at)->format('dS M Y H:iA') }}</td>
                                    <td>
                                       <a class="btn btn-circle btn-danger" href="{{ route('admin.delete.crop',$crop->id) }}"><i class="fa fa-trash"></i></a>
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
                <h5 class="font-weight-light mb-3">Add New Crop</h5>
                <form action="{{ route('admin.post.crop') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Crop Name</label>
                        <input type="text" name="crop" class="form-control" required>
                    </div>
                    <button class="btn btn-primary" type="submit">Add Crop <i class="fa fa-plus"></i></button>
                </form>
            </div>
        </div>
    </div>

@endsection
