@extends('admin.master')
@section('styles')
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
<style>
    .select2-container{width: 100% !important;}
</style>
@endsection
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $user->name }} Profile Editing</h1>
    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow mb-4 p-5">
                @include('flash._notify')
                <form action="{{ route('admin.view.information.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" value="{{$user->name}}" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="name" value="{{$user->phone}}" name="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="name" value="{{$user->email}}" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="text" id="dob" value="{{$user->profile->dob}}" name="dob" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="ghana_card">Ghana Card</label>
                                <input type="text" id="ghana_card" value="{{$user->profile->card_no}}" name="card_no" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="company">Company</label>
                                <input type="text" id="company" value="{{$user->profile->company}}" name="company" class="form-control">
                            </div>
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                        </div>
                    </div>
                    <button class="btn btn-block btn-primary mt-4">Update Details</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.select2-multi').select2();
        })
    </script>
@endsection
