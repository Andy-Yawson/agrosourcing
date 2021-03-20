@extends('user.master')
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
                    <h5 class="card-header">Change Details</h5>
                    <div class="card-body">
                        <form action="{{ route('user.change.detail') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="number" name="phone" id="phone" class="form-control" value="{{ old('phone',auth()->user()->phone) }}">
                            </div>
                            <div class="form-group">
                                <label for="company">Company Name</label>
                                <input type="text" name="company" id="company" class="form-control" value="{{ old('company',auth()->user()->profile->company) }}">
                            </div>
                            <div class="form-group">
                                <div class="row align-items-center">
                                    <div class="col-3">
                                        <img src="{{ asset('img/profile/'.auth()->user()->profile->pic) }}"
                                             class="avatar rounded-circle" alt="avatar" height="100px" width="100px">
                                    </div>
                                    <div class="col-8">
                                        <input type="file" class="file-upload form-control" name="pic">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-spinner"></i> Update Details</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <h5 class="card-header">Change Password</h5>
                    <div class="card-body">
                        <form action="{{ route('user.change.password') }}" method="post">
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

        <div class="mt-5">
            <div class="card">
                <h5 class="card-header">Update Company Bio</h5>
                <div class="card-body">
                    <form method="post" action="{{ route('user.change.bio') }}">
                        @csrf
                        <div class="form-group">
                            <label>Short Story About Your Works</label>
                            <textarea name="bio" class="form-control" rows="7"
                                      required>{{auth()->user()->profile->bio}}</textarea>
                        </div>

                        <button class="btn btn-primary" type="submit">
                            Update Bio
                            <i class="fa fa-arrow-right"></i>
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.avatar').attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            };
            $(".file-upload").on('change', function(){
                readURL(this);
            });
        });
    </script>
@endsection
