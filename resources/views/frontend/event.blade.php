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
                      <h2 class="text-left">Calendar</h2>
                      <p>
                        Explore our dynamic calendar to stay informed about upcoming events, activities, and extracurricular clubs. Easily register your own events and clubs, creating a vibrant community hub for everyone to connect and participate. Join us in making each day an opportunity for new experiences and connections.
                      </p>
                    </div>
                </div>
              </div>
            </div>
          </div>
      </div>
  </section>

  <div class="container" style="margin-top: 50px">
    <div class="row">
      <div class="col-12">
        <a href="/events/history" class="btn btn-primary"  style="background-color: #fdcc06;border: 1px solid #fdcc06;">
          History
        </a>
      </div>
    </div>
  </div>

  <div id="calendar" class="container my-5"></div>
  
  <section class="upcoming-meetings" id="meetings" style="padding-top: 90px !important">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-heading">
            <h2>Clubs</h2>
          </div>
        </div>
        @if (count($longTimeEvents) > 0)
        @foreach($longTimeEvents as $longTimeEvent)
          <div class="col-md-3">
              <div class="meeting-item">
                <div class="bg-white card p-4">
                        <a href="/events/{{ $longTimeEvent->id }}">
                          <h5 class="text-dark fw-bold mb-3">
                            {{ $longTimeEvent->title }}
                          </h5>
                        </a>
                        <div class="d-flex gap-3">
                          <strong>Time</strong> 
                          <p class="text-dark">
                            {{ $longTimeEvent->start_time . ' - ' . $longTimeEvent->end_time }}
                          </p>
                        </div>

                        <div class="d-flex gap-3">
                          <strong>Date</strong> 
                          <p class="text-dark">
                            @php
                                $days = json_decode($longTimeEvent->day) ?? [];
                            @endphp
                            {{ implode(',', $days) }}
                          </p>
                        </div>
                </div>
            </div>
          </div>
          @endforeach

          {{ $longTimeEvents->links() }}
      @else
          <h3 class="text-center">There is no long time events</h3>
      @endif
      </div>
      </div>
  </section>
@endsection

@section('js')
    <script> 
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: @json($events),
            eventClick: function(info) {
              if (info.event.url) {
                window.open(info.event.url, '_self'); 
              }
            }
        });
        calendar.render();
    });
  </script> 
@endsection