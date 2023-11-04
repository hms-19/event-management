@extends('layouts.base')
@section('title','Announcement')
    
@section('content')
    <!-- ***** Main Banner Area Start ***** -->
    <section class="section main-banner" style="min-height: 60vh !important;max-height: 60vh !important;" id="top" data-section="section1">
        <video autoplay muted loop id="bg-video" style="min-height: 60vh !important;max-height: 60vh !important;">
            <source src="{{ asset('assets/frontend/images/course-video.mp4') }}" type="video/mp4" />
        </video>
        <div class="video-overlay header-text">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="caption">
                <h6>Hello Students</h6>
                <h2>Announcements List</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam nihil earum doloribus ex. Id hic nisi doloribus sint perferendis ducimus?</p>
            </div>
                </div>
              </div>
            </div>
        </div>
      </section>
      <!-- ***** Main Banner Area End ***** -->
    <section class="upcoming-meetings" id="meetings" style="padding-top: 90px !important">
        <div class="container">
        <div class="row">
            <div class="col-lg-4">
            <div class="categories">
                <h4>Announcements categories</h4>
                <ul class="d-flex flex-column">
                <li class="d-block"><a class="d-block" href="/announcements/?name=Category 1">Category 1</a></li>
                <li class="d-block"><a class="d-block" href="/announcements/?name=Category 2">Category 2</a></li>
                <li class="d-block"><a class="d-block" href="/announcements/?name=Category 3">Category 3</a></li>
                <li class="d-block"><a class="d-block" href="/announcements/?name=Category 4">Category 4</a></li>
                </ul>
                <div class="main-button-red">
                    <a href="/announcements">All Announcements</a>
                </div>
            </div>
            </div>
            <div class="col-lg-8">
            <div class="row"> 
                @if (count($announcements) > 0)
                    @foreach($announcements as $announcement)
                    <div class="col-lg-6">
                        <div class="meeting-item">
                        <div class="thumb">
                            <div class="price">
                            <span>{{ $announcement->category }}</span>
                            </div>
                            <a href="/announcements/{{ $announcement->id }}"><img src="{{ asset($announcement->image) }}" style="height: 200px; object-fit:cover;" alt="New Lecturer Meeting"></a>
                        </div>
                        <div class="down-content d-flex flex-wrap justify-content-between">
                            <div>
                              <div class="date">
                                <h6>{{ Carbon\Carbon::parse($announcement->created_at)->format('M') }}<span>{{ Carbon\Carbon::parse($announcement->created_at)->format('d') }}</span></h6>
                              </div>
                              <a href="/announcements/{{ $announcement->id }}"><h4>{{ $announcement->title }}</h4></a>
                            </div>
                            <div class="">
                              <a href="">
                                <i class="icon fa fa-comment"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                    </div>
                    @endforeach

                    {{ $announcements->links() }}
                @else
                    <h3 class="text-center">There ios no announcements</h3>
                @endif

            </div>
            </div>
        </div>
        </div>
    </section>
@endsection