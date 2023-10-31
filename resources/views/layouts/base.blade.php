<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="title" content="T2Ks">
    <meta name="description" content="Money Exchange Website">
    <meta name="keywords" content="t2ks,usdt,money exchange">
    <meta name="language" content="English">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/frontend/images/logo.png') }}">

    <title>@yield('title')</title>

    <!-- Custom Bootstrap Links -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/custom.min.css')}}">

    <!-- Custom Style Links -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css')}}">

    <!-- Font awesome Links -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/frontend/css/all.min.css')}}"> --}}

</head>
<body>


    <!-- Navbar Start -->

    <nav id="navbar" class="navbar navbar-expand-lg  bg-white">
        <div class="container">
            <a class="navbar-brand flex-grow-1" href="/">Event Management</a>

            <div class="collapse navbar-collapse flex-grow-0" id="navbarToggle">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link mx-4" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  mx-4" href="/">Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-4" href="/">Announcement</a>
                    </li>
                    <li class="nav-item login">
                        <a class="nav-link mx-4" href="/login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Navbar End -->

        @yield('content')

        <!-- Footer Start -->

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 my-auto">
                        <h2 class="text-primary">Event Management</h2>
                    </div>
                    <div class="col-md-8 my-5">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <p class="text-primary">
                            Copyright &copy; Event Management
                        </p>
                    </div>
                </div>
            </div>
        </footer>

    <!-- Footer End -->

    <!-- Jquery -->
    <script src="{{ asset('assets/frontend/js/jquery-3.6.0.min.js')}}"></script>

    <!-- Bootstrap link -->
    <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js')}}"></script>

    <!-- font awesome link -->
    <script src="{{ asset('assets/frontend/js/all.min.js')}}"></script>

    <!-- DD SLick -->
    <script src="{{  asset('assets/frontend/js/jquery.ddslick.min.js')  }}"></script>

    <!-- Clipboard CDN -->
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.10/dist/clipboard.min.js"></script>

    {{--Validate js --}}
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script> --}}

    <!-- main js file -->
    <script src="{{ asset('assets/frontend/js/main.js')}}"></script>

    @stack('scripts')
    <script>

    </script>

</body>
</html>


