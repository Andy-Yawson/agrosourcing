@extends('admin.master')
@section('styles')

@endsection
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ auth()->user()->name }}'s Profile</h1>
    </div>

    <div class="card shadow mb-4 p-4">
        @include('flash._notify')
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <h5 class="card-header">Change Password</h5>
                    <div class="card-body">
                        <form action="{{ route('admin.change.password') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="pass">Old Password</label>
                                <input type="password" name="old_password" id="pass" class="form-control" value="{{ old('old_password') }}">
                            </div>
                            <div class="form-group">
                                <label for="pass1">New Password</label>
                                <input type="password" name="password" id="pass1" class="form-control" value="{{ old('password') }}">
                            </div>
                            <div class="form-group">
                                <label for="pass2">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="pass2" class="form-control" value="{{ old('password_confirmation') }}">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-spinner"></i> Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
