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
                                <h3 class="login-heading mb-4">Welcome to {{ config('app.name', 'Laravel') }}!</h3>
                                <form method="post" action="{{ route('user.register.submit') }}">
                                    @csrf
                                    @honeypot
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="inputFname" class="form-control"  name="f_name"
                                                       placeholder="Email address" required autofocus value="{{ old('f_name') }}">
                                                <label for="inputFname">First Name</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="inputLname" class="form-control" name="l_name"
                                                       placeholder="Email address" required autofocus value="{{ old('l_name') }}">
                                                <label for="inputLname">Last Name</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address"
                                               required autofocus name="email" value="{{ old('email') }}">
                                        <label for="inputEmail">Email address</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="phone" id="inputPhone" class="form-control" placeholder="Phone Number"
                                               required autofocus name="phone" value="{{ old('phone') }}">
                                        <label for="inputPhone">Phone</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" id="inputPassword" class="form-control"  name="password"
                                               placeholder="Password" required>
                                        <label for="inputPassword">Password</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="password" id="inputPasswordCon" class="form-control"
                                               placeholder="Password" required name="password_confirmation">
                                        <label for="inputPasswordCon">Confirm Password</label>
                                    </div>

                                    <div class="form-group">
                                        <label>Choose Role</label>
                                        <select class="form-control select2-multi"
                                                name="roles[]" multiple="multiple" id="roles">
                                            @foreach($roles as $role)
                                                @if($role->id != 5)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <button class="btn btn-lg btn-primary btn-block btn-login
                                     text-uppercase font-weight-bold mb-2" type="submit">Create new account</button>
                                </form>
                                <a class="btn btn-lg btn-info btn-block btn-login btn-primary
                                     text-uppercase font-weight-bold mb-2" type="submit" href="{{ route('user.login') }}">
                                    Already have an account? Login here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
       $(document).ready(function () {
           $('.select2-multi').select2();
       })
    </script>
@endsection
