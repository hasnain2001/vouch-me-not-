
<?php
header("X-Robots-Tag:index, follow");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/icons.png') }}" type="image/x-icon">
   
          <title>Deals69 - Best Deals and Discounts |Categories</title>
    <!-- Your custom meta tags go here -->
     <meta name="description" content="Find the best deals, discounts, and coupons on Honeycomb Deals. Save money on your favorite products from top brands.">

 <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">

  <meta name="author" content="John Doe">
 <meta name="robots" content="index, follow">

<link rel="canonical" href="https://deals69.com/categories">
<link rel="stylesheet" href="{{ asset('bootstrap-4.6.2-dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('cssfile/home.css') }}">
<link rel="stylesheet" href="{{asset('cssfile/categories.css')}}">
<style>
         .category-card {
            height: 320px;
            max-height: 350px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .category-card img {
            width: 100%;
            max-width: 200px;
            height: auto;
            border-radius: 50%;
        }
        .category-card h5 {
            margin-top: 15px;
        }
        @media (min-width: 768px) {
            .col-lg-3 {
                flex: 1 0 48%; /* Take 48% of the width with a small gap */
                max-width: 48%;
            }
        }
        @media (min-width: 992px) {
            .col-lg-3 {
                flex: 1 0 23%; /* Adjust to fit more cards per row on larger screens */
                max-width: 23%;
            }
        }
        .card-title{
            color: black;
        font-size: 15px;
        font-family:sans-serif;
        }

</style>

</head>
       <body>
        <x-navbar/>
<main>
<br>
        <h1 class="text-center">Categories</h1>
  
 
        <main class="main_content">
            <div class="container">
                <div class="row">
                    @foreach ($categories as $category)
                    <div class="col-12 col-md-6 col-lg-3 mb-3">
                        <div class="card shadow p-3 category-card">
                            <div class="card-body">
                                <a href="{{ route('related_category', ['title' => Str::slug($category->title)]) }}" class="text-decoration-none">
                                    @if ($category->category_image)
                                    <img class="rounded-circle" src="{{ asset('uploads/categories/' . $category->category_image) }}" alt="{{ $category->title }} Image">
                                    @else
                                    <p>No image available</p>
                                    @endif
                                    <p class="card-title mt-3 mx-2">{{ $category->slug }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>


<x-footer/>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>

