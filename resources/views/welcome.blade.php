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


    <div id="carouselExampleControls" class="carousel slide carousel-container" data-bs-ride="carousel">
        <!-- Carousel Indicators -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="d-flex align-items-center slider-content">
                    <img src="{{ asset('images/caraosel-1.png.jpeg') }}" class="d-block w-100 slider-img" alt="...">
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/caraosel-2.png.jpeg') }}" class="d-block w-100 slider-img" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/caraosel-3.jpeg') }}" class="d-block w-100 slider-img" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/caraosel-4.jpeg') }}" class="d-block w-100 slider-img" alt="...">
            </div>
        </div>
        <ol class="custom-indicators">
            <li data-bs-target="#carouselExampleControls" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleControls" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleControls" data-bs-slide-to="2"></li>
            <li data-bs-target="#carouselExampleControls" data-bs-slide-to="3"></li>
        </ol>
        <!-- Previous Button -->
        <button class="slider-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="slider-prev-icon" aria-hidden="true"><i class="fa-solid fa-circle-left"></i></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <!-- Next Button -->
        <button class="slider-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="slider-next-icon" aria-hidden="true"><i class="fa-solid fa-circle-right"></i></span>
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
