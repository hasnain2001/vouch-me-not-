<?php
header("X-Robots-Tag:index, follow");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/icons.png') }}" type="image/x-icon">

    <link rel="canonical" href="https://vouchmenot.com">
<title>VouchMeNot | Best Deals - Save Big on Top Brands!</title>

<meta name="description" content="Explore exclusive discounts and offers on top brands. Save money on your online shopping with Vouch Me Not.">

    <meta name="robots" content="index, follow">
    <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">
    <link rel="stylesheet" href="{{ asset('cssfile/home.css') }}">
    <link rel="stylesheet" href="{{asset('cssfile/welcome.css')}}">


</head>
<body>

    <x-navbar/>
    @if (Route::has('login'))
    <nav class="navbar navbar-expand-lg navbar-light bg-white p-3">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                <ul class="navbar-nav">
                    @auth('web')
                    <li class="nav-item">
                        <a href="{{ url('/dashboard') }}" class="nav-link btn btn-outline-primary mx-2">
                            Dashboard
                        </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link btn btn-outline-secondary mx-2">
                            Log in
                        </a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link btn btn-outline-success mx-2">
                            Register
                        </a>
                    </li>
                    @endif
                    @endauth

                    @auth('admin')
                    <li class="nav-item">
                        <a href="{{ url('/admin/dashboard') }}" class="nav-link btn btn-outline-primary mx-2">
                            Admin Dashboard
                        </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('admin.login') }}" class="nav-link btn btn-outline-secondary mx-2">
                            Admin Log in
                        </a>
                    </li>
                    @if (Route::has('admin.register'))
                    <li class="nav-item">
                        <a href="{{ route('admin.register') }}" class="nav-link btn btn-outline-success mx-2">
                            Admin Register
                        </a>
                    </li>
                    @endif
                    @endauth

                    @auth('teacher')
                    <li class="nav-item">
                        <a href="{{ url('/employe/dashboard') }}" class="nav-link btn btn-outline-primary mx-2">
                            Employee Dashboard
                        </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('employe.login') }}" class="nav-link btn btn-outline-secondary mx-2">
                            Employee Log in
                        </a>
                    </li>
                    @if (Route::has('employe.register'))
                    <li class="nav-item">
                        <a href="{{ route('employe.register') }}" class="nav-link btn btn-outline-success mx-2">
                            Employee Register
                        </a>
                    </li>
                    @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    @endif

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <!-- Carousel Indicators -->
        <ol class="carousel-indicators custom-indicators">
            <li data-bs-target="#carouselExampleControls" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleControls" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleControls" data-bs-slide-to="2"></li>
            <li data-bs-target="#carouselExampleControls" data-bs-slide-to="3"></li>
        </ol>
        
        <!-- Carousel Items -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/slider.png') }}" class="d-block w-100 slider-img img-thumbnail" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/caraosel-2.png.jpeg') }}" class="d-block w-100 slider-img img-thumbnail" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/caraosel-3.jpeg') }}" class="d-block w-100 slider-img img-thumbnail" alt="Slide 3">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/caraosel-4.jpeg') }}" class="d-block w-100 slider-img img-thumbnail" alt="Slide 4">
            </div>
        </div>
    
        <!-- Previous Button -->
        <button class="slider-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="slider-prev-icon"><i class="fa-solid fa-circle-left"></i></span>
            <span class="visually-hidden">Previous</span>
        </button>
    
        <!-- Next Button -->
        <button class="slider-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="slider-next-icon"><i class="fa-solid fa-circle-right"></i></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    
    
<br>

      {{-- Main Content Here --}}
      @yield('main-content')
      {{-- Main Content Here --}}

      <hr>
      <x-footer/>
      <script>
        // jQuery is required for Bootstrap's JavaScript plugins
        $(document).ready(function(){
            $('#carouselExampleControls').on('slide.bs.carousel', function (e) {
                var nextIndex = $(e.relatedTarget).index();
                $('.custom-indicators li').removeClass('active');
                $('.custom-indicators li').eq(nextIndex).addClass('active');
            });
        });


    function copyCoupon(code) {
        navigator.clipboard.writeText(code)
            .then(() => {
                alert("Coupon code copied!");
            })
            .catch((error) => {
                console.error("Failed to copy: ", error);
            });
    }

        function openCouponInNewTab(url, couponId) {
            window.open(url, '_blank');
            var modal = new bootstrap.Modal(document.getElementById('codeModal' + couponId));
            modal.show();
        }
</script>
</body>
</html>
