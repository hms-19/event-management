@extends('layouts.admin-base')

@section('title','Users')

@section('content')

<div class="w-100 h-100 d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit User</h4>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                    <strong>Success!</strong> {{ session('success') }}
                                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
                                </div>
                            @endif
                            <div class="basic-form">
                                <form method="POST" action="{{ route('users.update',['user' => $user]) }}">
                                    @csrf
                                    @method('PATCH')

                                    <div class="form-group">
                                        <input type="text" id="name" name="name" value="{{ $user->name }}" required autofocus  class="form-control input-default " placeholder="Enter Name">
                                    </div>
                                    @error('name')
                                        <p class="text-danger mb-2">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                    <div class="form-group">
                                        <input type="email" id="email" name="email" value="{{ $user->email }}" required autofocus  class="form-control input-default " placeholder="Enter Email">
                                    </div>
                                    @error('email')
                                        <p class="text-danger mb-2">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                    @php
                                        $roles = [
                                            "admin",
                                            "pre-foundation",
                                            "foundation",
                                            "hd-bachelor"
                                        ]
                                    @endphp
                                    <select name="role" id="role" value="{{ $user->role }}" class="form-control default-select me-2 mb-3">
                                        @foreach ($roles as $role)
                                            @if ($role == $user->role)
                                                <option value="{{ $role }}" selected>{{ \Illuminate\Support\Str::title($role) }}</option>
                                            @else
                                                <option value="{{ $role }}">{{ \Illuminate\Support\Str::title($role) }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <p class="text-danger mb-2">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                    <button class="btn btn-info float-right" type="submit">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection
