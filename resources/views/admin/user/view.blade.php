@extends('admin.master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Active Users</h1>
    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                @include('flash._notify')
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Manage All Users</h6>
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
                                <th>Phone</th>
                                <th>Verified</th>
                                <th>Status</th>
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
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        @if($user->email_verified == 1)
                                            <p class="text-success font-weight-bold">Verified</p>
                                        @elseif($user->email_verified == 0)
                                            <p class="text-danger font-weight-bold">Unverified</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->status == 1)
                                            <p class="text-success font-weight-bold">Approved</p>
                                        @elseif($user->status == 2)
                                            <p class="text-warning font-weight-bold">Unapproved</p>
                                        @elseif($user->status == 0)
                                            <p class="text-danger font-weight-bold">Suspended</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->status == 1)
                                            <a class="btn btn-danger" href="{{route('admin.suspend.user',$user->id)}}">
                                                <i class="fa fa-pause"></i>
                                                Suspend
                                            </a>
                                        @elseif($user->status == 0)
                                            <a class="btn btn-success" href="{{route('admin.unsuspend.user',$user->id)}}">
                                                <i class="fa fa-play-circle"></i>
                                                Unsuspend
                                            </a>
                                        @elseif($user->status == 2)
                                            <a class="btn btn-success" href="{{route('admin.approve.user',$user->id)}}">
                                                <i class="fa fa-play-circle"></i>
                                                Approve
                                            </a>
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
@endsection
