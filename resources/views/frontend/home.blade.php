@extends('layouts.base')
@section('title','Home')
    
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
              <h6>Hello Students</h6>
              <h2>Welcome to Education</h2>
              <p>This is an edu meeting HTML CSS template provided by <a rel="nofollow" href="https://templatemo.com/page/1" target="_blank">TemplateMo website</a>. This is a Bootstrap v5.1.3 layout. The video background is taken from Pexels website, a group of young people by <a rel="nofollow" href="https://www.pexels.com/@pressmaster" target="_blank">Pressmaster</a>.</p>
              <div class="main-button-red">
                  <div><a href="#contact">Join Us Now!</a></div>
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
              <div class="item">
                <div class="icon">
                  <img src="{{ asset('assets/frontend/images/service-icon-01.png') }}" alt="">
                </div>
                <div class="down-content">
                  <a href="/events/{{ $event->id }}">
                    <h4>{{ $event->title }}</h4>
                  </a>
                  <h5 class="text-warning fw-bold">{{ $event->date }}</h5>
                  <p>{{ $event->start_time.' - '.$event->end_time }}</p>
                  <p>
                    <i>{{ $event->location ?? 0 }}</i>
                  </p>
                  <p>
                    <strong class="fs-4 fw-bold">{{ $event->charges == 0.00 ? 'Free' : $event->charges}}</strong>
                  </p>
                </div>
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
            @else
                <h3 class="text-center">There ios no announcements</h3>
            @endif

          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="apply-now" id="apply">
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
  </section>

  <section class="our-courses" id="courses">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>You should check it out</h2>
          </div>
        </div>
        <div class="col-lg-12">
          @if (count($randomAnnouncements) > 0)
          <div class="owl-courses-item owl-carousel">
            @foreach ($randomAnnouncements as $announcement)
              <div class="item">
                  <a href="/announcements/{{ $announcement->id }}">
                    <img src="{{ asset($announcement->image) }}" alt="Course One" style="height: 200px; object-fit:cover;">
                    <div class="down-content">
                      <h4>{{ $announcement->title }}</h4>
                      <div class="info">
                        <div class="d-flex justify-content-between">
                          <div class="">
                            <span>{{ $announcement->category }}</span>
                          </div>
                          <div class="">
                              <a href="">
                                <i class="icon fa fa-comment"></i>
                              </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
              </div>
            @endforeach
          @else
              <h3 class="text-center">There is no announcement !</h3>
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
                <h6>Phone Number</h6>
                <span>010-020-0340</span>
              </li>
              <li>
                <h6>Email Address</h6>
                <span>info@meeting.edu</span>
              </li>
              <li>
                <h6>Street Address</h6>
                <span>Rio de Janeiro - RJ, 22795-008, Brazil</span>
              </li>
              <li>
                <h6>Website URL</h6>
                <span>www.meeting.edu</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
@endsection

