@extends('layouts.admin-base')

@section('title','Announcements')

@section('content')

<div class="w-100 h-100 d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add New Announcement</h4>
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
                                <form method="POST" action="{{ route('announcements.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="form-group">
                                        <input type="text" id="title" name="title" required autofocus  class="form-control input-default " placeholder="Enter Title">
                                    </div>
                                    @error('title')
                                        <p class="text-danger mb-2">
                                            {{ $message }}
                                        </p>
                                    @enderror


                                    @php
                                        $caretories = [
                                            "Events",
                                            "Activities",
                                            "Futsal Tournaments",
                                            "E-Sport Tournaments",
                                            "Football Club",
                                            "Badminton Club",
                                            "Basketball Club",
                                            "Art Club",
                                            "Dance Club"
                                        ]
                                    @endphp
                                    <select name="category" id="category" class="form-control default-select me-2 mb-3">
                                        @foreach ($caretories as $category)
                                            <option value="{{ $category }}">{{ \Illuminate\Support\Str::title($category) }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <p class="text-danger mb-2">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                    
                                    <textarea id="content" name="content" placeholder="Write Content Here..." class="my-3"></textarea>
                                    @error('content')
                                        <p class="text-danger mb-2">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                    
                                    <div class="form-group mt-3">
                                        <input type="file" class="form-control-file" name="image" id="image">
                                    </div>
                                    @error('image')
                                        <p class="text-danger mb-2">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                    <button class="btn btn-info float-right mt-3" type="submit">Create</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection
