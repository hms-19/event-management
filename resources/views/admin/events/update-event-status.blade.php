@extends('layouts.admin-base')

@section('title','Events')

@section('content')

<div class="w-100 h-100 d-flex justify-content-center align-items-start">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Update Event Status</h4>
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
                                <form method="POST" action="{{ route('events.update-status',['event_user_id' => $event_user_id,'event' => $event]) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">User Name</label>
                                                <input type="text" class="form-control" id="name" value="{{ $username }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email address</label>
                                                <input type="email" class="form-control" id="email" value="{{ $email }}" disabled>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="event" class="form-label">Event Name</label>
                                                <input type="text" class="form-control" id="event" value="{{ $event->title }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="program" class="form-label">Program</label>
                                                <input type="text" class="form-control" id="program" value="{{ $event->program }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="start_time" class="form-label">Start Time</label>
                                                <input type="text" class="form-control" id="start_time" value="{{ $event->start_time }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="end_time" class="form-label">End Time</label>
                                                <input type="text" class="form-control" id="end_time" value="{{ $event->end_time }}" disabled>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="charges" class="form-label">Charge</label>
                                                <input type="text" class="form-control" id="charges" value="{{ $event->charges }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="location" class="form-label">Location</label>
                                                <input type="text" class="form-control" id="location" value="{{ $event->location }}" disabled>
                                            </div>
                                        </div>
                                    </div>
            
                                   <div class="row">
                                    @if ($event->is_one_time)
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="date" class="form-label">Date</label>
                                                <input type="text" class="form-control" id="date" value="{{ $event->date }}" disabled>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="day" class="form-label">Day</label>
                                                <input type="text" class="form-control" id="day" value="{{ $event->day }}" disabled>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-md-6">
                                        @php
                                            $statuses = [
                                                "pending",
                                                "approved",
                                                "rejected",
                                            ]
                                        @endphp
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" id="status" class="form-control default-select me-2 mb-3">
                                            @foreach ($statuses as $status)
                                                @if ($status == $event_status)
                                                    <option value="{{ $status }}" selected>{{ \Illuminate\Support\Str::title($status) }}</option>
                                                @else
                                                    <option value="{{ $status }}">{{ \Illuminate\Support\Str::title($status) }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                   </div>

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
