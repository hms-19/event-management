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
	<meta name="format-detection" content="telephone=no">
    <title>Event Management Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/frontend/images/logo.png') }}">

    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet">

</head>
<body>

        <!--*******************
        Preloader start
    ********************-->
    {{-- <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div> --}}
    <!--*******************
        Preloader end
    ********************-->


        <div class="w-100 vh-100 d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                            <div class="card" style="height: 100% !important">
                                <div class="card-body d-flex flex-column gap-5 justify-content-center align-items-start w-100">
                                    <x-jet-validation-errors class="mb-4 text-danger" />
                                    <div class="basic-form w-100">
                                        <form method="POST" action="{{ route('login') }}" class="w-100">
                                            @csrf
                                            <h2 class="text-center text-black mb-5">
                                                Auston Student Community
                                            </h2>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" id="email" name="email" :value="old('email')" required autofocus  class="form-control input-default " placeholder="Enter Your Email">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control input-default" id="password" name="password" required autocomplete="current-password" placeholder="Enter Your Password">
                                            </div>
                                            <div class="d-flex my-3 justify-content-between align-items-center">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                                                </div>
                                                <div class="text-center">
                                                    @if (Route::has('password.request'))
                                                        <a href="">{{ __('Forgot Your Password?') }}</a>
                                                    @endif
                                                </div>    
                                            </div>                    
                                            <button class="btn btn-secondary d-block mx-auto w-100" type="submit">Login</button>

                                            <div class="card-footer text-muted">
                                                <div class="text-center">
                                                    <a href="">Privacy Policy</a> |
                                                    <a href="">Cookie Policy</a> |
                                                    <a href="">Terms of Use</a>
                                                </div>
                                                <p class="mt-2 text-center">&copy; {{ date('Y') }} Auston Student Community . All rights reserved.</p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{asset('assets/frontend/images/logo.png')}}" alt="" class="w-100 h-100 object-cover">
                    </div>
                </div>
            </div>
        </div>


	<!-- Chart piety plugin files -->
    <script src="{{ asset('assets/backend/vendor/peity/jquery.peity.min.js') }}"></script>

	<!-- Dashboard 1 -->
	<script src="{{ asset('assets/backend/js/dashboard/dashboard-1.js') }}"></script>

	<script src="{{ asset('assets/backend/vendor/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom.min.js') }}"></script>
	<script src="{{ asset('assets/backend/js/deznav-init.js') }}"></script>
    <script src="{{ asset('assets/backend/js/demo.js') }}"></script>
    <script src="{{ asset('assets/backend/js/styleSwitcher.js') }}"></script>

</body>
</html>
