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
                                <h3 class="login-heading mb-3">Reset Your Password!</h3>
                                <form method="post" action="{{ route('user.password.reset.post') }}">
                                    @csrf
                                    <div class="form-label-group">
                                        <input type="email" id="inputEmail" class="form-control" name="email"
                                               placeholder="Email address" required autofocus value="{{ $email }}">
                                        <label for="inputEmail">Email address</label>
                                    </div>
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="form-label-group">
                                        <input type="password" id="inputPassword" class="form-control"
                                               placeholder="Password" required name="password">
                                        <label for="inputPassword">Password</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" id="inputPasswordCon" class="form-control"
                                               placeholder="Password" required name="password_confirmation">
                                        <label for="inputPasswordCon">Confirm Password</label>
                                    </div>

                                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"
                                            type="submit">Reset Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
