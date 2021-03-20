@extends('layouts.auth')

@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                @include('flash._notify')
                                <h3 class="login-heading mb-3">Forgot Password!</h3>
                                <h3 class="small login-heading mb-4">You will be sent an email for password reset.</h3>
                                <form method="post" action="{{ route('user.reset.post') }}">
                                    @csrf
                                    <div class="form-label-group">
                                        <input type="email" id="inputEmail"
                                               class="form-control" placeholder="Email address"
                                               required autofocus name="email" value="{{ old('email') }}">
                                        <label for="inputEmail">Email address</label>
                                    </div>

                                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"
                                            type="submit">Send Reset Email</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
