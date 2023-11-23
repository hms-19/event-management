@extends('layouts.base')
@section('title','Event')
@section('content')
<section class="section main-banner" style="min-height: 50vh !important;max-height: 50vh !important;" id="top" data-section="section1">
    <div id="bg-video" style="min-height: 80vh !important;max-height: 80vh !important;">
        <img src="https://umanitoba.ca/sites/default/files/styles/21x9_1100w/public/2023-08/Fall%20Orientation_Hero.jpg?itok=TtM0NVVI" style="width: 100%;height:100%;object-fit:cover;" alt="">
    </div>
    <div class="video-overlay header-text">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="caption">
                    <div class="d-flex align-items-start gap-3 flex-column">
                      <h2 class="text-left">{{ $event->title }}</h2>
                      @php
                          $days = json_decode($event->day);
                      @endphp
                      <h6 class="text-left">{{ $event->is_one_time ? $event->date : implode(",",$days) }}</h6>
                      <h6 class="text-left">{{ $event->start_time . ' - ' . $event->end_time }}</h6>
                    </div>
                </div>
              </div>
          </div>
        </div>
    </div>
  </section>
  <div class="container my-5">
    <div class="row">
        <div class="col-12">
            @auth
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Great !</strong>  {{ session('success') }}
                        </div>
                    @endif
                    @if (session('sorry'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Oops !</strong>  {{ session('sorry') }}
                        </div>
                    @endif
                    <form action="/register/event/{{ $event->id }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">User Name</label>
                                    <input type="text" class="form-control" id="name" value="{{ auth()->user()->name }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="email" value="{{ auth()->user()->email }}" disabled>
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
                            <p class="mb-3">
                                <strong>Note - </strong> {{ $event->note }}
                            </p>
                        </div>
                        </div>

                        <button type="submit" class="btn btn-secondary" style="background-color:#fdcc06;border : 1px solid #fdcc06; ">
                            Reister
                        </button>
                    </form>
                </div>
            </div>
            @else
                <h2 class="text-center text-white">Please Login First</h2>
                <a href="/login" class="btn btn-primary">Login</a>
            @endauth
        </div>
    </div>
</div>
@endsection
