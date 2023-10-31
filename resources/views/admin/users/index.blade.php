@extends('layouts.admin-base')

@section('title','Currency')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Users</h4>
                    <a href="{{ route("users.create") }}" class="btn btn-primary">Add New</a>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Updated at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    @if ($user->role == 'admin')
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <div class="badge badge-danger">{{ $user->role }}</div>                                                                                                     
                                        </td>
                                        <td>{{ Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}</td>
                                        <td>
                                        </td>
    
                                    </tr>

                                    @else

                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->role == 'pre-foundation')
                                                <div class="badge badge-info">{{ $user->role }}</div>                                                                                                     
                                            @else
                                                @if ($user->role == 'foundation')
                                                    <div class="badge badge-warning">{{ $user->role }}</div>                                                                                                            
                                                @else
                                                    <div class="badge badge-success">{{ $user->role }}</div>                                                                                                            
                                                @endif
                                            @endif
                                        </td>
                                        <td>{{ Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}</td>
                                        <td>
                                            <a href="{{ route("users.edit",['user'=> $user]) }}" class="btn btn-primary shadow btn-xs sharp ">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a onclick="if(confirm('Are you Sure?')) document.getElementById('deleteUser{{ $user->id }}').submit();" href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp ">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form id="deleteUser{{ $user->id }}" action="{{ route('users.delete',['user' => $user]) }}">
                                            </form>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>

                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
