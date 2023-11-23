@extends('layouts.base')
@section('title','Event')
  
@section('css')
    <style>
.event-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 30px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
        }

        .event-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .event-card h3 {
            color: #333;
        }

        .event-card p {
            color: #555;
        }
    </style>
@endsection
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
                      <h2 class="text-left">Event History</h2>
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

  <section class="upcoming-meetings" id="meetings" style="padding-top: 90px !important">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-heading">
            <h2>Event History</h2>
          </div>
        </div>
        @if (count($events) > 0)
        @foreach($events as $event)
        @php
              $days = json_decode($event->day);
        @endphp
          <div class="col-md-3">
              <div class="meeting-item">
                <div class="event-card">
                  <a href="/events/{{ $event->id }}" class="text-decoration-none">
                    <h3 class="mb-3 fs-5 text-center">{{ $event->title }}</h3>
                    @if ($event->is_one_time)
                      <p><strong>Date:</strong> {{ Carbon\Carbon::parse($event->date)->format('M d , Y') }}</p>
                    @else
                      <p><strong>Days:</strong> {{ implode(",",$days) }}</p>
                    @endif
                    <p><strong>Time:</strong> {{ $event->start_time.' - '.$event->end_time }}</p>
                    <p><strong>Location:</strong> {{ $event->location ?? '-' }}</p>
                    <p><strong>Charges:</strong> {{ $event->charges == 0.00 ? 'Free' : $event->charges}}</p>
                    <p><strong>Status:</strong> {{ $event->pivot->status}}</p>
                  </a>
                </div>
            </div>
          </div>
          @endforeach
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