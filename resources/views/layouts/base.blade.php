<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Event Management</title>

    <!-- Bootstrap core CSS -->
    {{-- <link href="{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/template.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/lightbox.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />
    <style>
      #calendar tr th a{
          color: #000 !important; 
      }

      .fc-event {
        background-color: #ff8c00;
        color: #fff;
        border: 1px solid #ff8c00;
        transition: .4s;
      }

      .fc-event:hover{
        background-color: #bf6f0e;
      }

      .fc-toolbar h2{
        font-size: 25px;
      }

      .fc-view-harness {
        height: auto !important;
      }

      .fc-event-time{
        display: none;
      }
    </style>
    @yield('css')
  </head>

<body>

  <!-- Sub Header -->
  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8">
          <div class="left-content">
            <p>This is an educational <em>HTML CSS</em> template by TemplateMo website.</p>
          </div>
        </div>
        <div class="col-lg-4 col-sm-4">
          <div class="right-icons">
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="/" class="logo">
                         <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="" width="100px" height="100px" class="object-fit-cover">
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                    
                      <ul class="nav">
                          <li><a href="/" class="{{ request()->segment(1) == null ? 'active' : '' }}">Home</a></li>
                          <li><a href="/events" class="{{ request()->segment(1) == 'events' ? 'active' : '' }}">Event</a></li>
                          <li><a href="/announcements" class="{{ request()->segment(1) == 'announcements' ? 'active' : '' }}">Announcement</a></li> 
                          @auth
                            @if (auth()->user()->role == 'admin')
                                <li><a href="/admin" class="bg-warning px-3">Dashboard</a></li>   
                            @else
                                <li><a href="/profile" class="bg-warning px-3">Profile</a></li>    
                            @endif
                          @else
                            <li><a href="/login" class="bg-warning px-3">Login</a></li>
                          @endauth
                      </ul>     
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <!-- ***** Header Area End ***** -->

  @yield('content')

  <section class="contact-us" id="contact">
    @yield('contact')
    <div class="footer">
      <p>Copyright © 2022 Edu Meeting Co., Ltd. All Rights Reserved. 
          <br>
          Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a>
          <br>
          Distibuted By: <a href="https://themewagon.com" target="_blank" title="Build Better UI, Faster">ThemeWagon</a>
        </p>
    </div>
  </section>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('assets/frontend/vendor/jquery/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/frontend/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/lightbox.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/tabs.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/video.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/slick-slider.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/custom.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>


    @yield('js')

</body>
</html>