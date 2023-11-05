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
            <div class="d-flex align-items-center gap-3">
            </div>
        </div>
            </div>
          </div>
        </div>
    </div>
  </section>
  <div id="calendar" class="container my-5"></div>
  
@endsection

@section('js')
    <script> 
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            slotMinTime: '01:00:00 am',
            slotMaxTime: '12:00:00 pm',
            events: @json($events),
        });
        calendar.render();
    });
  </script> 
@endsection