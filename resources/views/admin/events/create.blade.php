@extends('layouts.admin-base')

@section('title','Events')

@section('content')

<div class="w-100 h-100 d-flex justify-content-center align-items-start">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add New Event</h4>
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
                                <form method="POST" action="{{ route('events.store') }}">
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
                                        $programs = [
                                            "all",
                                            "pre-foundation",
                                            "foundation",
                                            "hd-bachelor"
                                        ]
                                    @endphp
                                    <select name="program" id="program" class="form-control default-select me-2 mb-3">
                                        <option value="">Select Program</option>
                                        @foreach ($programs as $program)
                                            <option value="{{ $program }}">{{ \Illuminate\Support\Str::title($program) }}</option>
                                        @endforeach
                                    </select>
                                    @error('program')
                                        <p class="text-danger mb-2">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                    <input type="text" value="0" name="is_one_time" class="is_one_time" hidden>
                                    <div class="form-check form-switch my-3">
                                        <input class="form-check-input" type="checkbox" role="switch" id="one_time">
                                        <label class="form-check-label" for="one_time">One Time</label>
                                    </div>

                                    <input id="datepicker" placeholder="Select Date" name="date" class="d-none" />
                                    
                                    <div id="day-select" class="mb-3">
                                        <select class="form-select" id="multiple-select-field" placeholder="Select" class="w-100" name="day[]" multiple>
                                            <option>Sunday</option>
                                            <option>Monday</option>
                                            <option>Tursday</option>
                                            <option>Wednesday</option>
                                            <option>Thursday</option>
                                            <option>Friday</option>
                                            <option>Saturday</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="timePicker" name="start_time" placeholder="Start time">
                                    </div>
                                    @error('start_time')
                                        <p class="text-danger mb-2">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="timePicker" name="end_time" placeholder="End time">
                                    </div>
                                    @error('end_time')
                                        <p class="text-danger mb-2">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                    <div class="form-group mt-3">
                                        <input type="text" id="charges" name="charges"   class="form-control input-default " placeholder="Enter Charges">
                                    </div>

                                    @error('charges')
                                        <p class="text-danger mb-2">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                    <div class="form-group">
                                        <input type="text" id="location" name="location"   class="form-control input-default " placeholder="Enter Location">
                                    </div>
                                    @error('location')
                                        <p class="text-danger mb-2">
                                            {{ $message }}
                                        </p>
                                    @enderror


                                    <div class="form-group">
                                        <textarea name="note" id="note" class="form-control" placeholder="Note" rows="10"></textarea>
                                    </div>
                                    @error('note')
                                        <p class="text-danger mb-2">
                                            {{ $message }}
                                        </p>
                                    @enderror


                                    <button class="btn btn-info float-right" type="submit">Create</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection
