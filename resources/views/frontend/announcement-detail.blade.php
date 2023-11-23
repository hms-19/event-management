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
    <section class="upcoming-meetings" style="padding-top: 0px !important;" id="comment">
        <div class="container">
            <div class="row">
                <div class="col-md-8 my-5">
                    <div class="d-flex gap-3 mb-5">
                        <h3 class="">Comments</h3>
                        <button type="button" class="text-white p-2" style="background-color: #fdcc06;border: none;outline:none; border-radius: 10px;" data-bs-toggle="modal" data-bs-target="#comments">
                            Add New Comment
                        </button>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Great !</strong>  {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="modal fade" id="comments" tabindex="-1" aria-labelledby="commentsLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title text-dark" id="commentsLabel">Add Comment</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
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
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="row gap-2 mt-3 w-100">
                        @if (count($announcement->comments) > 0)
                            @foreach ($announcement->comments as $comment)
                                <div class="col-12">
                                    <div class="d-flex gap-2">
                                        <img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" style="width:40px !important;height:40px!important;" class="object-fit-cover rounded-full" alt="">
                                        <div class="card flex-1 w-100">
                                            <div class="card-body bg-secondary">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="text-white fw-bold">{{ $comment->user->name }}</p>
                                                    <p class="text-white fw-light">
                                                        {{$comment->created_at->shortRelativeDiffForHumans()}}
                                                    </p>
                                                </div>
                                                <p class="text-white">
                                                    {{ $comment->content }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection