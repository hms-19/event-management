@extends('layouts.base')
@section('title','Home')
    
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

    <!-- ***** Main Banner Area Start ***** -->
    <section class="section main-banner" id="top" data-section="section1">
      <video autoplay muted loop id="bg-video">
          <source src="{{ asset('assets/frontend/images/course-video.mp4') }}" type="video/mp4" />
      </video>
  
      <div class="video-overlay header-text">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="caption">
              <h6>Hello Austonian!</h6>
              <h2>Welcome to Auston Student Community </h2>
              <p>The Auston Student Community website offers a centralized platform for students, providing essential features such as an interactive event calendar, enabling easy access to upcoming activities. Students can seamlessly register for various events and activities and join clubs through the user-friendly interface. Additionally, the website hosts a rich multimedia section, showcasing vibrant photos and videos captured during events and club </p>
              <div class="main-button-red">
                  <div><a href="/event">See Calendar</a></div>
              </div>
          </div>
              </div>
            </div>
          </div>
      </div>
    </section>
    <!-- ***** Main Banner Area End ***** -->
    
  <section class="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-service-item owl-carousel">
            @foreach ($oneTimeEvents as $event)
              <div class="event-card">
                <a href="/events/{{ $event->id }}" class="text-decoration-none">
                  <h3 class="mb-3 fs-5 text-center">{{ $event->title }}</h3>
                  <p><strong>Date:</strong> {{ $event->date }}</p>
                  <p><strong>Time:</strong> {{ $event->start_time.' - '.$event->end_time }}</p>
                  <p><strong>Location:</strong> {{ $event->location ?? '-' }}</p>
                  <p><strong>Charges:</strong> {{ $event->charges == 0.00 ? 'Free' : $event->charges}}</p>
                </a>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="upcoming-meetings" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Latest Announcements</h2>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="categories">
            <h4>Announcements categories</h4>
            <ul class="d-flex flex-column">
              @php
                    $caretories = [
                                  "Events",
                                  "Activities",
                                  "Sports Tournaments",
                                  "E-Sport Tournaments",
                                  "Football Club",
                                  "Badminton Club",
                                  "Basketball Club",
                                  "Art Club",
                                  "Dance Club",
                                  "Music Club",
                                            "Blog Posts"
                              ]
                @endphp
              @foreach ($caretories as $category)
                <li class="d-block"><a class="d-block" href="/announcements/?name={{ $category }}">{{ $category }}</a></li>
              @endforeach
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
                            <a href="/announcements/{{ $announcement->id }}#comment">
                              <i class="icon fa fa-comment"></i>
                            </a>
                          </div>
                        </div>
                    </div>
                  </div>
                @endforeach
            @else
                <h3 class="text-center">There ios no announcements</h3>
            @endif

          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- <section class="apply-now" id="apply">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <div class="item">
                <h3>APPLY FOR BACHELOR DEGREE</h3>
                <p>You are allowed to use this edu meeting CSS template for your school or university or business. You can feel free to modify or edit this layout.</p>
                <div class="main-button-red">
                  <div class="scroll-to-section"><a href="#contact">Join Us Now!</a></div>
              </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="item">
                <h3>APPLY FOR BACHELOR DEGREE</h3>
                <p>You are not allowed to redistribute the template ZIP file on any other template website. Please contact us for more information.</p>
                <div class="main-button-yellow">
                  <div class="scroll-to-section"><a href="#contact">Join Us Now!</a></div>
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="accordions is-first-expanded">
            <article class="accordion">
                <div class="accordion-head">
                    <span>About Edu Meeting HTML Template</span>
                    <span class="icon">
                        <i class="icon fa fa-chevron-right"></i>
                    </span>
                </div>
                <div class="accordion-body">
                    <div class="content">
                        <p>If you want to get the latest collection of HTML CSS templates for your websites, you may visit <a rel="nofollow" href="https://www.toocss.com/" target="_blank">Too CSS website</a>. If you need a working contact form script, please visit <a href="https://templatemo.com/contact" target="_parent">our contact page</a> for more info.</p>
                    </div>
                </div>
            </article>
            <article class="accordion">
                <div class="accordion-head">
                    <span>HTML CSS Bootstrap Layout</span>
                    <span class="icon">
                        <i class="icon fa fa-chevron-right"></i>
                    </span>
                </div>
                <div class="accordion-body">
                    <div class="content">
                        <p>Etiam posuere metus orci, vel consectetur elit imperdiet eu. Cras ipsum magna, maximus at semper sit amet, eleifend eget neque. Nunc facilisis quam purus, sed vulputate augue interdum vitae. Aliquam a elit massa.<br><br>
                        Nulla malesuada elit lacus, ac ultricies massa varius sed. Etiam eu metus eget nibh consequat aliquet. Proin fringilla, quam at euismod porttitor, odio odio tempus ligula, ut feugiat ex erat nec mauris. Donec viverra velit eget lectus sollicitudin tincidunt.</p>
                    </div>
                </div>
            </article>
            <article class="accordion">
                <div class="accordion-head">
                    <span>Please tell your friends</span>
                    <span class="icon">
                        <i class="icon fa fa-chevron-right"></i>
                    </span>
                </div>
                <div class="accordion-body">
                    <div class="content">
                        <p>Ut vehicula mauris est, sed sodales justo rhoncus eu. Morbi porttitor quam velit, at ullamcorper justo suscipit sit amet. Quisque at suscipit mi, non efficitur velit.<br><br>
                        Cras et tortor semper, placerat eros sit amet, porta est. Mauris porttitor sapien et quam volutpat luctus. Nullam sodales ipsum ac neque ultricies varius.</p>
                    </div>
                </div>
            </article>
            <article class="accordion last-accordion">
                <div class="accordion-head">
                    <span>Share this to your colleagues</span>
                    <span class="icon">
                        <i class="icon fa fa-chevron-right"></i>
                    </span>
                </div>
                <div class="accordion-body">
                    <div class="content">
                        <p>Maecenas suscipit enim libero, vel lobortis justo condimentum id. Interdum et malesuada fames ac ante ipsum primis in faucibus.<br><br>
                        Sed eleifend metus sit amet magna tristique, posuere laoreet arcu semper. Nulla pellentesque ut tortor sit amet maximus. In eu libero ullamcorper, semper nisi quis, convallis nisi.</p>
                    </div>
                </div>
            </article>
        </div>
        </div>
      </div>
    </div>
  </section> --}}

  <section class="our-courses" id="courses">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Clubs</h2>
          </div>
        </div>
        <div class="col-lg-12">
          @if (count($longTimeEvents) > 0)
          <div class="owl-courses-item owl-carousel">
            @foreach ($longTimeEvents as $event)
            @php
                  $days = json_decode($event->day);
            @endphp
            <div class="event-card">
              <a href="/events/{{ $event->id }}" class="text-decoration-none">
                <h3 class="mb-3 fs-5 text-center">{{ $event->title }}</h3>
                <p><strong>Days:</strong> {{ implode(",",$days) }}</p>
                <p><strong>Time:</strong> {{ $event->start_time.' - '.$event->end_time }}</p>
                <p><strong>Location:</strong> {{ $event->location ?? '-' }}</p>
                <p><strong>Charges:</strong> {{ $event->charges == 0.00 ? 'Free' : $event->charges}}</p>
              </a>
            </div>
            @endforeach
          @else
              <h3 class="text-center">There is no events !</h3>
          @endif
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="our-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-12">
              <h2>A Few Facts About Our University</h2>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div class="col-12">
                  <div class="count-area-content percentage">
                    <div class="count-digit">94</div>
                    <div class="count-title">Succesed Students</div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="count-area-content">
                    <div class="count-digit">126</div>
                    <div class="count-title">Current Teachers</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div class="col-12">
                  <div class="count-area-content new-students">
                    <div class="count-digit">2345</div>
                    <div class="count-title">New Students</div>
                  </div>
                </div> 
                <div class="col-12">
                  <div class="count-area-content">
                    <div class="count-digit">32</div>
                    <div class="count-title">Awards</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <div class="col-lg-6 align-self-center">
          <div class="video">
            <a href="https://www.youtube.com/watch?v=HndV87XpkWg" target="_blank"><img src="{{ asset('assets/frontend/images/play-icon.png') }}" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <button type="button" class="position-fixed p-3" style="background-color: #fdcc06;border: none;outline:none; border-radius: 10px;right:10px;bottom: 20px;z-index:1000" data-bs-toggle="modal" data-bs-target="#notification">
    <div class="position-relative">
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger z-50" style="z-index: 3 !important;">
        3
      </span>  
      <i class="fa fa-bell text-white fs-4"></i>
    </div>
  </button>

  <div class="modal fade" id="notification" tabindex="-1" aria-labelledby="notificationLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="notificationLabel">Latest Messages</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @if (count($announcements) > 0)
            @foreach($announcements as $announcement)
              <div class="col-lg-12">
                <a href="/announcements/{{ $announcement->id }}" class="text-decoration-none">
                  <div class="d-flex py-2 gap-3 align-items-center">
                    <img src="{{ asset($announcement->image) }}" style="width:100px;height: 80px; object-fit:cover;border-radius:15px" alt="New Lecturer Meeting">
                    <div>
                      <h6 class="text-dark fw-bolder fs-5">{{ $announcement->title }}</h6>
                      <div class="price">
                        <span class="text-secondary">{{ $announcement->category }}</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            @endforeach
        @else
            <h3 class="text-center">There ios no announcements</h3>
        @endif
        </div>
      </div>
    </div>
  </div>
@endsection

@section('contact')
  <div class="container">
      <div class="row">
        <div class="col-lg-9 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <form id="contact" action="" method="post">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Let's get in touch</h2>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <input name="name" type="text" id="name" placeholder="YOURNAME...*" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="YOUR EMAIL..." required="">
                  </fieldset>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <input name="subject" type="text" id="subject" placeholder="SUBJECT...*" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" type="text" class="form-control" id="message" placeholder="YOUR MESSAGE..." required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="button">SEND MESSAGE NOW</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="right-info">
            <ul>
              <li>
                <h5>Ma Miho, Executive Admin</h5>
                <br>
                <p class="fw-bold">Phone Number</p>
                <p>09783112369</p>
                <br>
                <p class="fw-bold">Email Address</p>
                <p>miho@st.auston.edu.mm</p>
              </li>
              <li>
                <h5>Ma Thinn Yu, Executive Admin</h5>
                <br>
                <p class="fw-bold">Phone Number</p>
                <p>09763109030</p>
                <br>
                <p class="fw-bold">Email Address</p>
                <p>thinnyu@st.auston.edu.mm</p>
              </li>
              
            </ul>
          </div>
        </div>
      </div>
    </div>
@endsection

