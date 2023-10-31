@extends('layouts.base')
@section('title','Home')
    
@section('content')
    <div id="banner-slider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://cdn.getyourguide.com/img/location/5c10eb21206c9.jpeg/99.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://www.brookes.ac.uk/getmedia/cbe3eb1e-7606-44da-a777-3e2f5ac87c5d/Learning-10.jpg?width=800&height=450&ext=.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://conference-oxford.com/content/images/venues/71/harvard_style_lecture_theatre__1600x700.jpg" class="d-block w-100" alt="...">
        </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#banner-slider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#banner-slider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        </button>
  </div>
@endsection