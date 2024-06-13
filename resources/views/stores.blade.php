<?php
header("X-Robots-Tag:index, follow");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Deals69 - Best Deals and Discounts |Stores</title>
     <meta name="description" content="Score incredible savings on top brands with Deals69! Electronics, fashion, home goods & more. Start saving today!">
 <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">

  <meta name="author" content="John Doe">
 <meta name="robots" content="index, follow">

<link rel="canonical" href="https://deals69.com/stores">
     <link rel="icon" href="{{ asset('images/.png') }}" type="image/x-icon">
    <!-- Styles -->

        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
           <style>
.card-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}
.store-card {
    position: relative;
    width: calc(33% - 20px);
    margin: 10px;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.2s, box-shadow 0.2s;
}
.store-card:hover, .store-card.active {
    transform: translateY(-10px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.store-image {
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    max-height: 200px;
    object-fit: cover;
    width: 100%;
}
.store-info {
    padding: 15px;
    background-color: #fff;
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    opacity: 0;
    transition: opacity 0.2s;
}
.store-card:hover .store-info, .store-card.active .store-info {
    opacity: 1;
}
.store-name {
    margin-bottom: 10px;
    font-size: 18px;
    font-weight: bold;
}
.store-description {
    font-size: 14px;
    margin: 0;
}
@media (max-width: 768px) {
    .store-card {
        width: calc(50% - 20px);
    }
    .store-info {
        padding: 10px;
        font-size: 14px;
    }
    .store-name {
        font-size: 16px;
    }
    .store-description {
        font-size: 12px;
    }
}
@media (max-width: 576px) {
    .store-card {
        width: calc(50% - 20px); /* Ensures two columns on smaller screens */
    }
    .store-info {
        padding: 8px;
        font-size: 12px;
    }
    .store-name {
        font-size: 14px;
    }
    .store-description {
        font-size: 10px;
    }
}  </style>
</head>
<body >
    
    <x-navbar/>
<div class="container bg-light">
    <div class="row mt-3 justify-content-end">
        <div class="col-12">
            <ul class="pagination justify-content-center">
                @foreach(range('A', 'Z') as $letter)
                    <li class="page-item"><a class="page-link" href="{{ route('stores', ['letter' => $letter]) }}">{{ $letter }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <p class="h5 m-0">Total stores: <span class="fw-bold">{{ $stores->total() }}</span></p>
</div>
<div class="container">
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
                        <img class="store-image img-fluid" src="{{ $store->store_image ? asset('uploads/stores/' . $store->store_image) : asset('front/assets/images/no-image-found.jpg') }}" alt="{{ $store->name }}">
                        <div class="store-info p-3">
                            <h5 class="store-name">{{ $store->name ?: "Title not found" }}</h5>
                            <p class="store-description text-muted">Click to explore more about {{ $store->name }} and discover exciting deals and offers.</p>
                        </div>
                    </a>
                </div>
            @endforeach
        @endif
    </div> 
</div>

<!-- Add JavaScript for touch events -->
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


</body>
</html>