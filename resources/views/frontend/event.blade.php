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
                    <h2 class="text-left">Event Calendar</h2>
                    <p>
                      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo modi fuga unde aut doloribus ipsam reiciendis qui quos, saepe facilis!
                    </p>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </section>
  <div id="calendar" class="container my-5"></div>
  
  <section class="upcoming-meetings" id="meetings" style="padding-top: 90px !important">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-heading">
            <h2>Long Time Events</h2>
          </div>
        </div>
        @if (count($longTimeEvents) > 0)
        @foreach($longTimeEvents as $longTimeEvent)
          <div class="col-md-3">
              <div class="meeting-item">
                <div class="bg-white card p-4">
                        <a href="/events/{{ $longTimeEvent->id }}">
                          <h3>
                            {{ $longTimeEvent->title }}
                          </h3>
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
                window.open(info.event.url, '_blank'); 
              }
            }
        });
        calendar.render();
    });
  </script> 
@endsection