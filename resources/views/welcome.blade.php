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

    <style>

  .slider-img {
    padding: 15px;
    width: 100%;
    flex: 1;
    border: 4px solid transparent; /* Transparent border for gradient effect */
    border-radius: 16px;
    height: 500px;
    max-height: 600px;

    /* Gradient border effect */
    background: linear-gradient(to right, #da46d2, #d483e9); /* Border gradient */
    background-clip: padding-box; /* Clips gradient to just the border */
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2); /* Add depth with shadow */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transition */
}




  .custom-indicators li {
    background-color:white;
    border-radius: 50%;
    width: 18px;
    height: 18px;
}

.custom-indicators li.active {
    background-color: #333;
}


    </style>
</head>
<body>

    <x-navbar/>


    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
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
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


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
