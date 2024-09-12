<?php
header("X-Robots-Tag:index, follow");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>VouchMeNot - Best Deals and Discounts |Stores</title>
     <meta name="description" content="Score incredible savings on top brands with Deals69! Electronics, fashion, home goods & more. Start saving today!">
 <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">

  <meta name="author" content="John Doe">
 <meta name="robots" content="index, follow">

<link rel="canonical" href="https://vouchmenot.com/stores">
     <link rel="icon" href="{{ asset('images/icons.png') }}" type="image/x-icon">
    <!-- Styles -->

        <link rel="stylesheet" href="{{ asset('cssfile/store.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
           <style>

</style>
</head>
<body >

    <x-navbar/>


    <ul class="pagination justify-content-center my-pagination">
        @foreach(range('A', 'Z') as $letter)
            <li class="page-item">
                <a class="page-link" href="{{ route('stores', ['letter' => $letter]) }}">{{ $letter }}</a>
            </li>
        @endforeach
    </ul>



<div class="container">
    <p class="h5 m-0">Total stores: <span class="fw-bold">{{ $stores->total() }}</span></p>

    <div class="card-list">
        @if ($stores->isEmpty())
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Sorry!</h4>
                <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                <hr>
                <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
            </div>
        @else
            @foreach ($stores as $store)
                <div class="store-card shadow-sm mb-4">
                    <a href="{{ route('store_details', ['slug' => Str::slug($store->slug)]) }}" class="text-decoration-none">
                        @if ($store->store_image)
                        <img src="{{ asset('uploads/stores/' . $store->store_image) }}" class="card-img-top" alt="{{ $store->name }} Image">
                    @else
                        @if ($store->previous_image)
                            <img src="{{ asset('uploads/stores/' . $store->previous_image) }}" class="card-img-top" alt="{{ $store->name }} Image">
                        @else
                            <div class="d-flex align-items-center justify-content-center vh-100 bg-light text-muted">
                                <i class="fas fa-store fa-3x"></i> <p class="ms-2">No image available</p>
                            </div>
                        @endif
                    @endif
                        <div class="store-info p-3">
                            <h5 class="store-name text-white">{{ $store->name ?: "Title not found" }}</h5>

                        </div>
                    </a>
                </div>
            @endforeach
        @endif
    </div>

{{ $stores->links('vendor.pagination.bootstrap-5') }}
</div>
<x-footer/>
<!-- Add JavaScript for touch events -->
<script src="{{ asset('bootstrap-4.6.2-dist/js/bootstrap.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const storeCards = document.querySelectorAll('.store-card');

        storeCards.forEach(card => {
            card.addEventListener('touchstart', function() {
                storeCards.forEach(c => c.classList.remove('active'));
                card.classList.add('active');
            });
        });

        document.addEventListener('touchstart', function(e) {
            if (!e.target.closest('.store-card')) {
                storeCards.forEach(card => card.classList.remove('active'));
            }
        });
    });
    </script>



</body>
</html>
