@extends('layouts.admin-base')

@section('title','Events')

@section('content')

<div class="w-100 h-100 d-flex justify-content-center align-items-start">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Event</h4>
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
                                <form method="POST" action="{{ route('events.update',["event" => $event]) }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        <input type="text" id="title" name="title" required autofocus value="{{ $event->title }}"  class="form-control input-default " placeholder="Enter Title">
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
                                        @foreach ($programs as $program)
                                            @if ($program == $event->program)
                                                <option value="{{ $program }}" selected>{{ \Illuminate\Support\Str::title($program) }}</option>
                                            @else
                                                <option value="{{ $program }}">{{ \Illuminate\Support\Str::title($program) }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('program')
                                        <p class="text-danger mb-2">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                    <input type="text" value="{{ $event->is_one_time }}"  name="is_one_time" class="is_one_time" hidden>
                                    <div class="form-check form-switch my-3">
                                        <input class="form-check-input" type="checkbox" role="switch" id="one_time" {{ old('is_one_time', $event->is_one_time) == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="one_time">One Time</label>
                                    </div>

                                    @if ($event->is_one_time)
                                        <input id="datepicker" placeholder="Select Date" value="{{ $event->date }}"  name="date" class="d-block" />
                                        
                                        <div id="day-select" class="mb-3 d-none">
                                            <select class="form-select" id="multiple-select-field" placeholder="Select" class="w-100" name="day[]" value="{{ $event->day }}"  multiple>
                                                <option value="Monday" {{ in_array('Monday', json_decode($event->day)) ? 'selected' : '' }}>Monday</option>
                                                <option value="Tuesday" {{ in_array('Tuesday', json_decode($event->day)) ? 'selected' : '' }}>Tuesday</option>
                                                <option value="Wednesday" {{ in_array('Wednesday', json_decode($event->day)) ? 'selected' : '' }}>Wednesday</option>
                                                <option value="Thursday" {{ in_array('Thursday', json_decode($event->day)) ? 'selected' : '' }}>Thursday</option>
                                                <option value="Friday" {{ in_array('Friday', json_decode($event->day)) ? 'selected' : '' }}>Friday</option>
                                                <option value="Saturday" {{ in_array('Saturday', json_decode($event->day)) ? 'selected' : '' }}>Saturday</option>
                                                <option value="Sunday" {{ in_array('Sunday', json_decode($event->day)) ? 'selected' : '' }}>Sunday</option>
                                            </select>
                                        </div>
                                    @else
                                        <input id="datepicker" placeholder="Select Date" value="{{ $event->date }}"  name="date" class="d-none" />
                                        
                                        <div id="day-select" class="mb-3">
                                            <select class="form-select" id="multiple-select-field" placeholder="Select" class="w-100" name="day[]" value="{{ $event->day }}"  multiple>
                                                <option value="Monday" {{ in_array('Monday', json_decode($event->day)) ? 'selected' : '' }}>Monday</option>
                                                <option value="Tuesday" {{ in_array('Tuesday', json_decode($event->day)) ? 'selected' : '' }}>Tuesday</option>
                                                <option value="Wednesday" {{ in_array('Wednesday', json_decode($event->day)) ? 'selected' : '' }}>Wednesday</option>
                                                <option value="Thursday" {{ in_array('Thursday', json_decode($event->day)) ? 'selected' : '' }}>Thursday</option>
                                                <option value="Friday" {{ in_array('Friday', json_decode($event->day)) ? 'selected' : '' }}>Friday</option>
                                                <option value="Saturday" {{ in_array('Saturday', json_decode($event->day)) ? 'selected' : '' }}>Saturday</option>
                                                <option value="Sunday" {{ in_array('Sunday', json_decode($event->day)) ? 'selected' : '' }}>Sunday</option>
                                            </select>
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <input type="text" id="start_time" name="start_time" value="{{ $event->start_time }}"  required autofocus  class="form-control input-default " placeholder="Enter Start Time">
                                    </div>
                                    @error('start_time')
                                        <p class="text-danger mb-2">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                    <div class="form-group">
                                        <input type="text" id="end_time" name="end_time" required autofocus value="{{ $event->end_time }}"   class="form-control input-default " placeholder="Enter End Time">
                                    </div>
                                    @error('end_time')
                                        <p class="text-danger mb-2">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                    <div class="form-group mt-3">
                                        <input type="text" id="charges" name="charges"  value="{{ $event->charges }}"  class="form-control input-default " placeholder="Enter Charges">
                                    </div>

                                    @error('charges')
                                        <p class="text-danger mb-2">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                    <div class="form-group">
                                        <input type="text" id="location" name="location" value="{{ $event->location }}"   class="form-control input-default " placeholder="Enter Location">
                                    </div>
                                    @error('location')
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
