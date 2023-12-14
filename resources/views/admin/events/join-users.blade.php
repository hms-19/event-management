@extends('layouts.admin-base')

@section('title','Event')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List of Users</h4>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                            <strong>Success!</strong> {{ session('success') }}
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($event->users as $key => $user)
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->pivot->status == 'pending')
                                            <div class="badge badge-info">{{ $user->pivot->status }}</div>                                                                                                     
                                        @elseif ($user->pivot->status == 'rejected')
                                            <div class="badge badge-danger">{{ $user->pivot->status }}</div> 
                                        @else
                                            <div class="badge badge-success">{{ $user->pivot->status }}</div>                                                                                                            
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route("events.edit-status",['event'=> $event,'user_id' => $user->id]) }}" class="btn btn-primary shadow btn-xs sharp ">
                                            <i class="fa fa-pencil"></i>
                                        </a>
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
</div>


@endsection
