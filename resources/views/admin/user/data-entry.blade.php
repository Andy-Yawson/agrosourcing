@extends('admin.master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Administrators</h1>
    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                @include('flash._notify')
                <div class="card-header py-3">
                    @if(auth()->user()->level == 1)<button class="btn btn-primary btn-circle" data-toggle="modal" data-target="#entry_user_modal"><i class="fa fa-plus"></i></button>@endif
                    <h6 class="m-0 font-weight-bold text-primary">Manage All Data Entry Account</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Reg Date</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Account Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Carbon\Carbon::parse($user->created_at)->format('dS M Y H:iA') }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->level == 1)
                                            <p class="text-success font-weight-bold">Super Admin</p>
                                        @elseif($user->level == 2)
                                            <p class="text-info font-weight-bold">Data Entry User</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if(auth()->user()->level == 1)
                                            @if($user->status == 1)
                                                <a class="btn btn-danger" href="{{route('admin.suspend.admin',$user->id)}}">
                                                    <i class="fa fa-pause"></i>
                                                    Suspend
                                                </a>
                                            @elseif($user->status == 0)
                                                <a class="btn btn-success" href="{{route('admin.unsuspend.admin',$user->id)}}">
                                                    <i class="fa fa-play-circle"></i>
                                                    Unsuspend
                                                </a>
                                            @endif
                                        @else
                                            <button class="btn btn-info" disabled>No Action</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="entry_user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.store.data-users') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="district">District</label>
                            <select class="form-control" id="district" name="district" required>
                                <option value="">===== Select District ===== </option>
                                @foreach($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save Details</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
