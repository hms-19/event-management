
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
    <meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="T2K Exchange Admin Dashboard">
	<meta property="og:title" content="T2K Exchange Admin Dashboard">
	<meta property="og:description" content="T2K Exchange Admin Dashboard">
	{{-- <meta property="og:image" content="https://zenix.dexignzone.com/xhtml/social-image.png"> --}}
	<meta name="format-detection" content="telephone=no">
    <title>Event Management Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/frontend/images/logo.png') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/vendor/chartist/css/chartist.min.css') }}">

    <link href="{{ asset('assets/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/backend/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet">
    <!-- Daterange picker -->
    <link href="{{ asset('assets/backend/vendor/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/pickadate/themes/default.date.css') }}">

    <style>
        /* preview img */

        #preview-image-before-upload{
        width: 70px;
        height: 70px;
        position: absolute;
        z-index: 2 !important;
        left: -1px;
        top: -1px;
        object-fit: cover;
        border-radius: 10px;
       }
    </style>
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="/admin/dashboard" class="brand-logo">
                <h2 class="text-primary fw-bold fs-5 text-center">Event</h2>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->


		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">

                        </div>
                        <ul class="navbar-nav header-right main-notification">
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-theme-mode" href="#">
									<i id="icon-light" class="fa fa-sun-o"></i>
                                    <i id="icon-dark" class="fa fa-moon-o"></i>
                                </a>
							</li>
                           
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <img src="{{ asset('assets/backend/images/avatar/1.png') }}" width="20" alt="">
									<div class="header-info">
										<span>{{ Auth::user()->name ?? '' }}</span>
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <form method="POST" id="logout" action="{{ route('logout') }}">
                                        @csrf

                                    </form>
                                    <a  href="javascript:void(0)" onclick="document.getElementById('logout').submit();" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
			</div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
					<li class="nav-label first">Main Menu</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-144-layout"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="">Dashboard</a></li>
                            <li><a href="">Order</a></li>
						</ul>

                    </li>

                </ul>
				<div class="copyright">
					<p><strong>Event Management Admin Dashboard</strong> © 2023 All Rights Reserved</p>
					<p class="fs-12">Made with <span class="heart"></span> by Webhub</p>
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            @yield('content')
		</div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="../index.htm" target="_blank">DexignZone</a> 2021</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->





		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
        <script src="{{ asset('assets/backend/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('assets/backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

	<!-- Chart piety plugin files -->
    <script src="{{ asset('assets/backend/vendor/peity/jquery.peity.min.js') }}"></script>

	<!-- Dashboard 1 -->
	{{-- <script src="{{ asset('assets/backend/js/dashboard/dashboard-1.js') }}"></script> --}}

	<script src="{{ asset('assets/backend/vendor/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom.min.js') }}"></script>
	<script src="{{ asset('assets/backend/js/deznav-init.js') }}"></script>
    <script src="{{ asset('assets/backend/js/demo.js') }}"></script>
    {{-- <script src="{{ asset('assets/backend/js/styleSwitcher.js') }}"></script> --}}

    <!-- Daterangepicker -->
    <script src="{{ asset('assets/backend/vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/backend/js/plugins-init/bs-daterange-picker-init.js') }}"></script>
    <script type="text/javascript">


        $(document).ready(function (e) {

           $('#file').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {
              $('#preview-image-before-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

           });

        });
        $("#filter-btn").on("click",function(){
            let formData = new FormData($("#filter-form")[0]);
            $.ajax({
                type : 'POST',
                url : 'ordercount/search',
                cache: false,
                contentType: false,
                processData: false,
                data : formData,
                beforeSend:function(){
                    $("#buy-order-count").html("<small>Calculating...</small>");
                    $("#buy-total-prices").html("<small>Calculating...</small>");
                    $("#sell-order-count").html("<small>Calculating...</small>");
                    $("#sell-total-prices").html("<small>Calculating...</small>");

                },
                success : (response) => {
                    console.log(response);

                    $("#buy-order-count").html('<h4 class="mb-0">'+response.buy_count+'</h4>');
                    $("#buy-total-prices").html('<h4 class="mb-0">'+response.buy_total_price.toFixed(2)+" $"+'</h4>');
                    $("#sell-order-count").html('<h4 class="mb-0">'+response.sell_count);
                    $("#sell-total-prices").html('<h4 class="mb-0">'+response.sell_total_price.toFixed(2)+" MMK"+'</h4>');
                }
            })
        });
    </script>
    <script>
        if($("#statusChange")[0].value == 3){
            $(".fail_message").removeClass('d-none')
        }
        $("#statusChange").on('change', (e) => {
            if(e.target.value == '3'){
                $(".fail_message").removeClass('d-none')
            }
            else{
                $(".fail_message").addClass('d-none')
            }
        })
    </script>
</body>
</html>
