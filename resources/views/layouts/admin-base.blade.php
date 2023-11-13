
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

    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

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

       .gj-datepicker button{
        display: none !important;
       }

       #datepicker{
        width: 100% !important;
       }

       .select2-container--bootstrap-5 .select2-selection {
            min-height: calc(2em + 0.75rem + 2px) !important;
            padding: -5.625rem .75rem !important;
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
            <a href="/" class="brand-logo">
                <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="" width="100px" height="100px" class="object-fit-cover">
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
                                    <a  href="/profile" class="dropdown-item ai-icon">
                                        {{-- <svg id="icon-profile" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> --}}
                                        <span class="ml-2">Profile</span>
                                    </a>
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
                            <span class="nav-text">Dashboard & Users</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('users.index') }}">User Management</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-077-menu-1"></i>
                        <span class="nav-text">Event Management</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('events.index') }}">Event</a></li>
                    </ul>

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-077-menu-1"></i>
                        <span class="nav-text">Announcement Management</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('announcements.index') }}">Announcement</a></li>
                    </ul>
                </li>
                </ul>
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
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    

    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

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

    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap5'
        });

        $( '#multiple-select-field' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            closeOnSelect: false,
        } );
    </script>

    <script>
        
        
        $("#one_time").on('change', function() {
            
            let togBtn = $(this);
            togBtn.val(togBtn.prop('checked'));
            
            if(togBtn.val() == 'true'){
                $(".is_one_time").val(1);
                $("#datepicker").addClass('d-block')
                $("#datepicker").removeClass('d-none')

                $("#day-select").addClass('d-none')
                $("#day-select").removeClass('d-block')
            }
            else{
                $(".is_one_time").val(0);

                $("#datepicker").addClass('d-none')
                $("#datepicker").removeClass('d-block')

                $("#day-select").addClass('d-block')
                $("#day-select").removeClass('d-none')   
            }
        })
    </script>

    <script>
        tinymce.init({
        selector: 'textarea#content',
        plugins: 'powerpaste advcode table lists checklist',
        toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table'
        });
    </script>


    <script>
    const fileInput = document.getElementById('image');
  
    fileInput.addEventListener('change', function() {
        if (fileInput.files.length > 0) {
            document.getElementById("edit-image").style.display = 'none'
        } else {
          document.getElementById("edit-image").style.display = 'block'
        }
    });
  
  </script>
</body>
</html>
