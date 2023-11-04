@extends('layouts.base')
@section('title','Announcement')

@section('css')
    <style>
        p,h1,h2,h3,h4,h5,h6,ul,li,a,i,b{
            color: #fff !important;
        }
    </style>
@endsection
    
@section('content')
    <!-- ***** Main Banner Area Start ***** -->
    <section class="section main-banner" style="min-height: 80vh !important;max-height: 80vh !important;" id="top" data-section="section1">
        <div id="bg-video" style="min-height: 80vh !important;max-height: 80vh !important;">
            <img src="{{ asset($announcement->image) }}" style="width: 100%;height:100%;object-fit:cover;" alt="">
        </div>
        <div class="video-overlay header-text">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="caption">
                <h2>{{ $announcement->title }}</h2>
                <div class="d-flex align-items-center gap-3">
                    <h6 class="text-warning">{{ $announcement->category }}</h6>
                    <p>{{ Carbon\Carbon::parse($announcement->created_at)->format('M d , Y') }}</p>
                </div>
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
                <div class="col-md-8">
                    <p>
                        {!! $announcement->content !!}
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection