<?php
header("X-Robots-Tag:index, follow");?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="{{ asset('front/assets/images/icons.png') }}" type="image/x-icon">

@if(isset($blog) && is_object($blog))
   <!-- Your custom meta tags go here -->
   <title>{!! $blog->meta_title !!}</title>
    <link rel="canonical" href="https://deals69.com/blog-details/{{ Str::slug($blog->title) }}">
        <meta name="description" content="{!! $blog->meta_description !!}">

 <meta name="keywords" content="{!! $blog->meta_keyword !!}">
   <meta name="author" content="Najeeb-ullah khan">
 <meta name="robots" content="index, follow">
@else
    <!-- Handle the case where $store is not valid -->
    <!-- You can display a default canonical URL or handle it in another appropriate way -->
    <link rel="canonical" href="https://honeycombdeals.com">
@endif

  <!-- Bootstrap CSS -->
  <!-- Add Swiper CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<!-- Add Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  
  
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">
  <style>
    /* Custom styles */
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }
   
    .navbar-brand {
      color: #fff !important;
      font-weight: bold;
    }
    .blog-post {
      background-color: #fff;
      margin-bottom: 30px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }
    .blog-post:hover {
      transform: translateY(-5px);
    }
    .blog-post img {
      max-width: 100%;
      height: auto;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
    }
    .blog-post .post-content {
      padding: 20px;
    }
    .blog-post .post-content h2 {
      color: #333;
      margin-bottom: 10px;
    }
    .blog-post .post-content p {
      color: #666;
      margin-bottom: 20px;
    }
    .btn-read-more {
      background-color: #343a40;
      color: #fff;
      border: none;
      padding: 8px 20px;
      border-radius: 20px;
      text-transform: uppercase;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }
    .btn-read-more:hover {
      background-color: #23272b;
    }
    .sidebar {
      background-color: #343a40;
      color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .sidebar h3 {
      color: #fff;
      margin-bottom: 20px;
    }
    .sidebar ul {
      list-style-type: none;
      padding: 0;
    }
    .sidebar li {
      margin-bottom: 10px;
    }
    .sidebar a {
      color: #fff;
      text-decoration: none;
    }
    .sidebar a:hover {
      color: #ccc;
    }
    .img{
        width: 250px;
        height: 200;
        border-radius:5%;
    }
    nav{

  background-color:rgb(93, 25, 130);
}
section{
background-color:rgb(87, 18, 124);
}

  .container {
      display: flex;
      justify-content: center; /* Center contents horizontally */
      align-items: center;
    }
    .form-container {
      max-width: 600px; /* Adjust max-width as needed */
      width: 100%;
    }
    .form-container form {
        right:200px;
      display: flex;
      justify-content: center; /* Center contents horizontally */
      align-items: center;
    }
    .social-icons a {
      color:white; /* Change icon color as needed */
      margin-left: 10px; /* Adjust margin between icons as needed */
      font-size: 20px; /* Adjust icon size as needed */
    }
     .social-icons a hover {

    background-color:purple;
     }
  </style>
  
</head>
<body><div class="container">
  <div class="row">
      <div class="col-12 col-md-8 mb-4">
          <div class="blog-post card shadow rounded-lg border border-light">
              <img class="img-fluid" src="{{ asset($blog->category_image) }}" alt="Blog Image" style="width: 100%; height: auto;">
              <div class="card-body">
                  <h1 class="card-title text-3xl font-semibold text-gray-800 mb-4">{{ $blog->title }}</h1>
                  <p class=" ">{!! $blog->content !!}</p>
              </div>
          </div>
      </div>

      <div class="col-12 col-md-4 order-md-last">
          <aside class="sidebar p-3 bg-light">
              <h2 class="bold text-dark mb-3">latest  Stores</h2>
              <div class="row gx-2 gy-2">
                  @foreach ($chunks as $store)
                      <div class="col-6 col-md-12 col-sm-6 col-lg-6">
                          <a href="{{ route('store_details', ['slug' => Str::slug($store->slug)]) }}" class="text-dark text-decoration-none d-flex flex-column p-2 align-items-center">
                              <img src="{{ asset('uploads/stores/' . $store->store_image) }}" alt="{{ $store->name }}" class="mb-2 shadow" style="width: 100px; height: 100px; object-fit: cover;">
                              <p class="text-capitalize">{{ $store->name }}</p>
                          </a>
                      </div>
                  @endforeach
              </div>
          </aside>
      </div>
  </div>
</div>

  <script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 'auto',
        spaceBetween: 30,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
</script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
  <!-- Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
