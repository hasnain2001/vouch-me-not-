<?php
header("X-Robots-Tag:index, follow");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @if(isset($store) && is_object($store))
  <title>{!! $store->title !!}</title>
  <link rel="canonical" href="https://https://vouchmenot.com/stores/{{ Str::slug($store->name) }}">
  <meta name="description" content="{!! $store->meta_description !!}">
  <meta name="keywords" content="{!! $store->meta_keyword !!}">
  <meta name="author" content="Najeeb">
  <meta name="robots" content="index, follow">
  @else
  <link rel="canonical" href="https://vouchmenot.com/stores">
  @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/icons.png') }}" type="image/x-icon">

    <style>
.card-hover,
.coupon-card {
    flex-direction: column;
    display: flex;
}
.container,
.custom-font {
    font-family: viga, sans-serif;
}
.container {
    font-weight: 500;
    color: #868686;
}
.card-hover {
    border: 2px solid #ddd;
    transition: border-color 0.3s;
    height: 100%;
    justify-content: space-between;
}
.card-hover:hover {
    border-color: #7c3ac7;
}

.btn-hover {

    transition: background-color 0.3s, color 0.3s;
}
.btn-hover:hover {
    background-color: #0056b3;
    color: #fff;
}
.coupon-image-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100px;
    margin: auto;
}
.store-image {
    max-width: 100px;
    height: 100px;
}
.coupon-card {
    height: 100%;
}
.coupon-content {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    flex-grow: 1;
}
.coupon-details {
    flex-grow: 1;
}
.coupon-action {
    display: flex;
    justify-content: center;
    align-items: center;
}
.buttm {
    width: 10px;
    height: 5px;
    padding: 5px;
}
.copy-btn {
    margin-top: 10px;
}
.copy-confirmation {
    margin-top: 30px;
    color: green;
}
.custom-font {
    font-weight: 700;
    color: #878787;
}
.des-font,
.used {
    font-family: "Open Sans", sans-serif;
}
.des-font {
    font-weight: 500;
    color: #999;
}
.used {
    font-weight: 800;
    font-size: 12px;
}
.btn-sort a {
    background-color: #7c3ac7;
    color: #ffffff;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.3), -3px -3px 10px rgba(0, 0, 0, 0.3);
    transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
    margin-right: 10px; /* Add margin between buttons */
}

.btn-sort a:last-child {
    margin-right: 0; /* Remove margin from the last button */
}

.btn-sort a:hover {
    background-color: purple;
    color: black;
    box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.5), -5px -5px 15px rgba(0, 0, 0, 0.5);
}
.get {
    background: linear-gradient(135deg, #7c3ac7, #9d50bb);
    color: #ffffff;
    padding: 5px 15px;
    border-radius: 5px;
    text-decoration: none;
    box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.3), -3px -3px 10px rgba(0, 0, 0, 0.3);
    transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
    margin-right: 10px; /* Add margin between buttons */
    display: inline-block;
    font-size: 16px;
}

.get:hover {
    background: linear-gradient(135deg, #9d50bb, #e9e6ec);
    color: wheat;
    transform: scale(1.05);
    box-shadow: 0 0 15px rgba(124, 58, 199, 0.7), 0 0 30px rgba(124, 58, 199, 0.5);
}
.getcode {
    background: linear-gradient(100deg, #3a0874, #c8c3ca);
    color: #ffffff;
    padding: 5px 15px ;
    border-radius: 25px 25px 25px 25px ;
    text-decoration: none;


    margin-right: 10px; /* Add margin between buttons */
    display: inline-block;
    font-size: 16px;
}

.getcode:hover {
    background: linear-gradient(135deg, #9d50bb, #56189c);
    color: white;
    transform: scale(1.05);
    box-shadow: 0 0 15px rgba(124, 58, 199, 0.7), 0 0 30px rgba(124, 58, 199, 0.5);
}
.ending-date{
    font-size: 10px;
    color: rgb(184, 177, 177);
}
.coupon-description{
    font-size: 15px;
    color: rgb(134, 123, 123);
}

    </style>
</head>
<body>
<nav>
    @include('components.navbar')
</nav>

<br>


@if(session('success'))
<div class="alert alert-light alert-dismissable">
    <b>{{ session('success') }}</b>
</div>
@endif


<!-- Store Information and Coupons Section -->
<div class="container mt-5">
    <div class="container d-flex h-100 align-items-end">
        @if ($store)
        <h1 class="text-left">{{ $store->name }}</h1>
        @else
        <h5 style="margin-top: 0;">Store name not available</h5>
        @endif
    </div>
 <hr style="border:2px black dotted;">
    <div class=" btn-sort " role="group" aria-label="Sort Coupons">
            <a href="{{ url()->current() }}" class="btn  ">All</a>
            <a href="{{ url()->current() }}?sort=codes" class="btn ">Codes</a>
            <a href="{{ url()->current() }}?sort=deals" class="btn ">Deals</a>
        </div>

    <div class="row">
        <div class="col-lg-3 mb-3">
            @if ($store)
            <div class="cpn card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-2 text-center">
                            <div class="coupon-image-container">
                                <img src="{{ asset('uploads/stores/' . $store->store_image) }}" alt="{{ $store->name }}" class="store-image">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="col-md" style="padding-left: 0;">
                                @if ($store)
                                <h5 style="margin-top: 0;">{{ $store->name }}</h5>
                                @else
                                <h5 style="margin-top: 0;">Store name not available</h5>
                                @endif
                                <div class="rating-stars text-warning text-center">
                                    <i class="fas fa-star" data-rating="1"></i>
                                    <i class="fas fa-star" data-rating="2"></i>
                                    <i class="fas fa-star" data-rating="3"></i>
                                    <i class="fas fa-star" data-rating="4"></i>
                                    <i class="fas fa-star text-dark" data-rating="5"></i>
                                </div>
                                    <!--<a href="{{ $store->url }}" target="_blank" class="get ">Visit Website</a>-->
                                @if ($store->description)
                            
                                <p class="mt-2 mx-2 store_detail_description d-none d-md-block">{!! $store->description !!}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="col-lg-9">
      <div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($coupons as $coupon)
    <div class="col-lg-4 col-md-6 col-sm-12 mb-5">
        <div class="coupon-card cpn card-hover">
            <div class="coupon-content p-3 flex-grow-1 d-flex flex-column justify-content-between">
                <div class="coupon-details">
         <h6 class="card-title coupon-title text-center custom-font">{{ $coupon->name }}</h6>

                    <br>
                    <p class="coupon-description des-font">{{ $coupon->description }}</p>
                     <hr style="border:2px black dotted;">
                 

<p class="ending-date" style="color: {{ \Carbon\Carbon::parse($coupon->ending_date)->isPast() ? 'red' : 'inherit' }};">
    Ending Date: {{ \Carbon\Carbon::parse($coupon->ending_date)->format('d M, Y') }}
</p>


                </div>
                <div class="coupon-action text-center">
                    @if ($coupon->code)
                    <a href="{{ $coupon->destination_url }}" target="_blank" class="getcode " id="getCode{{ $coupon->id }}" onclick="toggleCouponCode('{{ $coupon->id }}')">Coupon Code</a>
                    <div class="coupon-card d-flex flex-column">
                        <span class="codeindex text-dark scratch" style="display: none;" id="codeIndex{{ $coupon->id }}">{{ $coupon->code }}</span>
                        <button class="btn btn-info text-white btn-sm copy-btn btn-hover d-none mt-2" id="copyBtn{{ $coupon->id }}" onclick="copyCouponCode('{{ $coupon->id }}')">Copy Code</button>
                        <p class="text-success copy-confirmation d-none mt-3" id="copyConfirmation{{ $coupon->id }}">Code copied!</p>
                    </div>
                    @else
  <a href="{{ $coupon->destination_url }}" onclick="updateClickCount('{{ $coupon->id }}')" class="get " target="_blank">Get Deal</a>
                    @endif
                    <form method="post" action="{{ route('update.clicks') }}" id="clickForm">
                        @csrf
                        <input type="hidden" name="coupon_id" id="coupon_id">
                    </form>
                </div>
                       <p class="used font-weight-bold mt-2" id="output_{{ $coupon->id }}">Used By: {{ $coupon->clicks }}</p>

            </div>

        </div>
    </div>
    @endforeach
</div>

        </div>
    </div>


</div>



<footer>
    @include('components.footer')
</footer>

<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
// Function to toggle coupon code visibility and copy button
function toggleCouponCode(couponId) {
    // Set the coupon ID in localStorage to remember the state
    localStorage.setItem('copiedCouponId', couponId);

    const codeElement = document.getElementById(`codeIndex${couponId}`);
    const copyButton = document.getElementById(`copyBtn${couponId}`);

    if (codeElement.style.display === 'none') {
        codeElement.style.display = 'inline';
        copyButton.classList.remove('d-none');
    } else {
        codeElement.style.display = 'none';
        copyButton.classList.add('d-none');
    }

    // Update the click count via AJAX
    updateClickCount(couponId);
}

// Check localStorage on page load to restore the state
document.addEventListener('DOMContentLoaded', function() {
    const copiedCouponId = localStorage.getItem('copiedCouponId');
    if (copiedCouponId) {
        const codeElement = document.getElementById(`codeIndex${copiedCouponId}`);
        const copyButton = document.getElementById(`copyBtn${copiedCouponId}`);

        codeElement.style.display = 'inline';
        copyButton.classList.remove('d-none');
    }
});

// Clear localStorage on refresh
window.addEventListener('beforeunload', function () {
    localStorage.removeItem('copiedCouponId');
});

// Function to copy coupon code to clipboard
function copyCouponCode(couponId) {
    const codeElement = document.getElementById(`codeIndex${couponId}`);
    const code = codeElement.innerText.trim();

    navigator.clipboard.writeText(code)
        .then(() => {
            // Show success message
            const copyMessage = document.getElementById(`copyConfirmation${couponId}`);
            copyMessage.classList.remove('d-none');
            setTimeout(() => {
                copyMessage.classList.add('d-none');
            }, 1500);
        })
        .catch(err => {
            console.error('Failed to copy: ', err);
        });
}

// Function to update click count via AJAX
function updateClickCount(couponId) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '{{ route("update.clicks") }}', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log('Click count updated successfully.');
        }
    };

    xhr.send('coupon_id=' + couponId);
}

// Function to count clicks (fallback if not using AJAX)
function countClicks(couponId) {
    document.getElementById('coupon_id').value = couponId;
    document.getElementById('clickForm').submit();
}

</script>
</body>
</html>
