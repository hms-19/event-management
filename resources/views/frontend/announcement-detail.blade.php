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
                <div class="col-md-8 my-5">
                    <h3 class="mb-5">Comments</h3>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Great !</strong>  {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route("comments.store",['announcement_id' => $announcement->id]) }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <textarea name="content" id="" class="form-control" cols="30" rows="10" placeholder="What do you want to talk?"></textarea>
                            @error('content')
                                <i class="text-danger">{{ $message }}</i>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Submit</button>
                    </form>
                    <div class="row gap-2 mt-3">
                        <div class="col-12">
                            <div class="d-flex w-100 gap-2">
                                <img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" style="width:60px !important;height:60px!important;" class="object-fit-cover rounded-full" alt="">
                                <div class="card flex-1">
                                    <div class="card-body">
                                        <p class="text-dark fw-bold">Kyaw Kyaw</p>
                                        <p class="text-dark">
                                            Lorem ipsum dolor sit amet.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection