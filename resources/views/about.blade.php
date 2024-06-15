<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vouchmenot - Best Deals and Discounts |About Us</title>
  <meta name="description" content="Find amazing deals, discounts & tips to stretch your budget further. We're your ultimate shopping sidekick!">

  <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">
 
   <meta name="author" content="John Doe">
  <meta name="robots" content="index, follow">

  <link rel="icon" href="{{ asset('images/icons.png') }}" type="image/x-icon">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body>
  <x-navbar/>

<main>
  <section class="hero bg-light py-5">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-md-6">
          <h1>Unlock Savings & Shopping Sprees at Vouchmenot</h1>
          <p class="lead">Find amazing deals, discounts & tips to stretch your budget further. We're your ultimate shopping sidekick!</p>
          <a href="coupons" class="btn btn-primary">Explore Deals Now</a>
        </div>
        <div class="col-md-6">
          <img src="{{ asset('images/about.jpg') }}" alt="Vouchmenot Welcome Image" class="img-fluid rounded-3">
        </div>
      </div>
    </div>
  </section>

  <section class="about py-5">
    <div class="container">
      <h2>Welcome to Vouchmenot: Your Shopping Guru</h2>
      <p>Tired of paying full price? We hear you! Vouchmenot is your trusted companion in the world of discounts, deals, promo codes, bundle offers, and invaluable money-saving tips. We're more than just a website; we empower you to be a smart and informed shopper, making your shopping sprees more fulfilling and budget-friendly.</p>
    </div>
  </section>

  <section class="vision py-5 bg-light">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-md-6">
          <h2>Our Vision: Empowering Smarter Shopping</h2>
          <p>Vouchmenot was born out of the desire to create a haven for frugal-minded individuals. We envision a world where everyone can shop confidently and save money on the things they love. We provide the tools and resources you need to make informed decisions and feel empowered on your shopping journey.</p>
        </div>
        <div class="col-md-6">
          <img src="images/vision.jpg" alt="Vouchmenot Vision Image" class="img-fluid rounded-3">
        </div>
      </div>
    </div>
  </section>

  <section class="offer py-5">
    <div class="container">
      <h2>Unleash Your Savings Potential with Vouchmenot</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="card shadow-sm border-0">
            <div class="card-body">
              <i class="fas fa-tags display-4 text-primary"></i>
              <h5 class="card-title">Discount Codes</h5>
              <p class="card-text">We curate and provide a wide range of discount codes from your favorite brands and retailers.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card shadow-sm border-0">
            <div class="card-body">
              <i class="fas fa-percent display-4 text-primary"></i>
              <h5 class="card-title">Deals and Promotions</h5>
              <p class="card-text">Discover the latest and hottest deals on Vouchmenot. Save big on everything you need and love.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card shadow-sm border-0">
            <div class="card-body">
              <i class="fas fa-shopping-cart display-4 text-primary"></i>
              <h5 class="card-title">Bundle Offers</h5>
              <p class="card-text">Save even more by exploring our bundle offers. Find fantastic deals on complementary products.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-4">
          <div class="card shadow-sm border-0">
            <div class="card-body">
              <i class="fas fa-balance-scale display-4 text-primary"></i>
              <h5 class="card-title">Product Comparisons</h5>
              <p class="card-text">Making informed decisions is crucial when shopping. We offer detailed product comparisons to help you choose the best option that fits your needs and budget.</p>
            </div>
          </div>
        </div>
        <!-- Add more offer cards here -->
      </div>
      <section class="why-choose-section bg-light py-5">
        <div class="container">
          <h2>Why Make Vouchmenot Your Shopping Ally?</h2>
          <div class="row">
            <div class="col-md-6">
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <i class="fas fa-check-circle text-primary fs-4 me-3"></i>
                  <span>Trustworthy Information</span>
                  <span class="badge bg-primary rounded-pill">Reliable Deals!</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <i class="fas fa-tag text-primary fs-4 me-3"></i>
                  <span>Diverse Range of Deals</span>
                  <span class="badge bg-primary rounded-pill">Something for Everyone!</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <i class="fas fa-users text-primary fs-4 me-3"></i>
                  <span>Community and Support</span>
                  <span class="badge bg-primary rounded-pill">Shop Savvy, Together!</span>
                </li>
              </ul>
            </div>
            <div class="col-md-6">
              <img src="{{ asset('images/why chose.jpg') }}" alt="Why Choose Vouchmenot Image" class="img-fluid rounded-3">
            </div>
          </div>
        </div>
      </section>
      
    </div>
  </section>
</main>


  <x-footer/>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  
</body>
</html>
