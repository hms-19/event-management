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

    <nav id="navbar" class="navbar navbar-expand-lg fixed-top bg-white">
        <div class="container">
            <a class="navbar-brand flex-grow-1" href="/">T2Ks Exchange</a>

            <div class="">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <!-- Search modal -->
                <button type="button" style="width: 40px;height: 40px; border-radius: 50%; border: none;" class="bg-primary text-light" data-bs-toggle="modal" data-bs-target="#filterModal">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
            <div class="collapse navbar-collapse flex-grow-0" id="navbarToggle">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link mx-4" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link  mx-4" href="/buy">Buy</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link mx-4" href="/sell">Sell</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Modal -->
    <div class="modal fade" id="filterModal" aria-labelledby="filterModalLabel">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex flex-column justify-content-start align-items-start gap-3">
                    <form class="w-100">
                        <label for="search" class="form-label">Find your order by your address</label>
                        <input class="form-control w-100 text-primary" style="border-radius: 0px !important;" type="text" id="search" name="address" placeholder="Search By Address" aria-label="Search">
                    </form>
                    <div class="alert alert-warning alert-dismissible fade show">
                        {{ App\Models\DeliverWarning::find(1)->warning }}
                        <button type="button" class="btn text-warning" data-bs-dismiss="alert" aria-label="Close"><span><i class="fas fa-x"></i></span>
                        </button>
                    </div>
            </div>
            <div class="modal-body" id="filterResult">

            </div>
        </div>
        </div>
    </div>

    <!-- Navbar End -->

        @yield('content')

        <!-- Footer Start -->

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 my-auto">
                        <img src="{{ asset('assets/frontend/images/logo.png')}}" class="img-fluid w-75 h-75" alt="">
                    </div>
                    <div class="col-md-8 my-5">
                        <ul style="list-style-type: none;" class="d-flex flex-column justify-content-between align-items-start gap-5">
                            <li>
                                <h2 class="text-primary">T2Ks Exchange Service</h2>
                            </li>
                            <li>
                                <a href="/user-guide" class="text-primary text-decoration-none">User Guide</a>
                            </li>
                            <li>
                                <a href="/contact" class="text-primary text-decoration-none">Contact us</a>
                            </li>
                            <li class="d-flex gap-4">
                                <a href="#" class="text-primary text-decoration-none">
                                    <i style="font-size: 18px;" class="fa-brands fa-facebook"></i>
                                </a>
                                <a href="#" class="text-primary text-decoration-none">
                                    <i style="font-size: 18px;" class="fa-brands fa-telegram"></i>
                                </a>
                                <a href="mailto:admin@t2ks.com" class="text-primary text-decoration-none">
                                    <i style="font-size: 18px;" class="fa-solid fa-envelope"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <p class="text-primary">
                            Copyright &copy; T2Ks Exchange Service
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
        $("#slick").ddslick({
                width : '100%',
                imagePosition : 'left',
                onSelected : data => {
                    $("#currencyTitle").html(data.selectedData.data)
                }
            })
    </script>

    <script>

        // Copy Clipboard

        var clipboard = new ClipboardJS('.btn-copy');

        clipboard.on('success', function(e) {
            e.clearSelection();
        });

    </script>

    <script>
        $("#search").on('input',() => {
            $("#filterResult").html('')
            let search = $("#search").val()
            $.ajax({
                url : '/search',
                type : 'GET',
                data : {
                    search
                },
                success : response => {

                    console.log(response.result)
                    if(response.resultlength == 0){
                        $("#filterResult").html('')
                    }
                    //map not work
                    response.result.forEach(order => {
                        $("#filterResult").append(`
                            <div class="card my-3">
                                <div class="card-body">
                                    <a href="/search/details/${order.id}" class="text-decoration-none text-dark">
                                        <div class="d-flex flex-md-row flex-column justify-content-md-between align-items-md-center justify-content-start align-items-start">
                                            <h3 class="text-primary">${order.status}</h3>
                                            <p class="text-muted">
                                                <strong>${order.created_at}</strong>
                                            </p>
                                        </div>
                                        <p>
                                            Amount : <strong>${order.amount} </strong>
                                        </p>
                                        <p>
                                            <h4 class="">${order.name.slice(0,1)}****</h4>
                                            ${order.email.slice(0,1)}*****
                                        </p>
                                    </a>
                                </div>
                            </div>
                            `)
                        })

                     }
            })
        })
    </script>

    <script>

        let navLinks = Array.from(document.querySelectorAll('.nav-link'));

        window.addEventListener('load' ,() => {
            if(location.pathname === '/buy' || location.pathname === '/buy/checkout'){
                navLinks[1].classList.toggle('active')
            }
            else if(location.pathname === '/sell' || location.pathname === '/sell/checkout'){
                navLinks[2].classList.toggle('active')
            }
            else{
                navLinks[0].classList.toggle('active')
            }
        })



</script>



</body>
</html>


