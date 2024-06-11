<?php
header("X-Robots-Tag:index, follow");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@if(isset($store) && is_object($store))
     <title>{!! $store->title!!}</title>
    <link rel="canonical" href="https://deals69.com/store/{{ Str::slug($store->name) }}">
        <meta name="description" content="{!! $store->meta_description !!}">

 <meta name="keywords" content="{!! $store->meta_keyword !!}">
 
  <meta name="author" content="Najeb-ullah khan">
 <meta name="robots" content="index, follow">

@else
    <!-- Handle the case where $store is not valid -->
    <!-- You can display a default canonical URL or handle it in another appropriate way -->
    <link rel="canonical" href="https://www.honeycombdeals.com">
@endif
<link rel="icon" href="{{ asset('images/dlogo-removebg-preview.png') }}" type="image/x-icon">
<link rel="stylesheet" href="{{asset('cssfile/styles.css')}}">
    <link rel="stylesheet" href="{{asset('cssfile/styles.css')}}">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-njBmYjFk5oaxU1n9TKX8IhZM1RB1qfF8MmUki6k/6WKDI7YLMUG1AN5cOrFNYZvE" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-njBmYjFk5oaxU1n9TKX8IhZM1RB1qfF8MmUki6k/6WKDI7YLMUG1AN5cOrFNYZvE" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/v4-shims.min.js" integrity="sha512-1eyBIzeEcxyxJkTmQIGLrXo2AK9DVykziyPi7JkNR61HNC8y87OeqQFqvRwgwnqJpjxfUj43Fup0szvPrR3Ilg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Add this line to your HTML file to include FontAwesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<style>
body{
    margin:0;
    padding:0;
}
    .no-image-placeholder {
        background-color: #f0f0f0;
        color: #aaa;
        font-size: 14px;
    }

    .star-rating {
        color: #ffc107;
    }
.coupon-card {
    background: linear-gradient(135deg, #58c1fe, #4dcfe6);
    text-align: center;
    max-width: 800px;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 10px 10px 0 rgba(0, 0, 0, 0.15);
    position: relative;
    margin-bottom: 30px;
}
.logo {
    width: 100px;
    border-radius: 8px;
    margin-bottom: 20px;
}
.coupon-card p {
    font-size: 15px;
}
.coupon-row {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 25px auto;
    width: fit-content;
}
.cpnCode {
    border: 1px dashed #fff;
    padding: 10px 20px;
    border-right: 0;
}
.cpnBtn {
    border: 1px solid #fff;
    background: #fff;
    padding: 10px 20px;
    color: #7158fe;
    cursor: pointer;
}
.circle-1, .circle-2 {
    background: #fff;
    height: 50px;
    width: 50px;
    border-radius: 50%;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
}
.circle-1 {
    left: -30px;
}
.circle-2 {
    right: -30px;
}
.cpndeal {
    border: 2px dashed #fff;
    padding: 20px 80px;
    transition: all 0.3s;
    color: white;
    background-color: transparent;
    font-weight: bolder;
}
.cpndeal:hover {
    color: black;
    background-color: rgb(13, 202, 240);
}
@media (max-width: 768px) {
    .coupon-card {
        max-width: 100%;
        max-height:"200px";
        padding: 15px;
    }
    .coupon-row {
        flex-direction: column;
    }
    .cpnCode {
        border-right: 1px dashed #fff;
        border-bottom: 0;
    }
    .cpnBtn {
        margin-top: 10px;
    }
        .circle-1, .circle-2 {
            background: #fff;
            height: 50px;
            width: 50px;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }
        .circle-1 {
            left: -30px;
        }
        .circle-2 {
            right: -30px;
        }
      .cpndeal {
    border: 2px dashed #fff;
    padding: 20px 80px;
    transition: all 0.3s;
    color:white;
    background-color:transparent;
    font-weight:bolder;
    
}
     .logo{
            width: 150px;
            border-radius: 8px;
            margin-bottom:10px;
        }

     .storelogo{
            width: 50px;
            border-radius: 8px;
            margin-bottom:20px;
        }

.cpndeal:hover {
    color: black;
    background-color:rgb(13, 202, 240); 
}

  .store-info {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .store-info .logo {
        border-radius: 10px;
        width: 100%;
        height: auto;
        object-fit: cover;
    }

</style>
  </head>
  <body>
      
  
<br><br><br>
<div class="container">
    @if ($store)
      <h1 class="text-left">{{ $store->name }}</h1>
  @endif  
  </div>
  
  
  <!-- Store Information -->
  <div class="store-info card mb-4 p-3 container">
      <div class="row g-0 align-items-center">
          @if ($store)
              @if ($store->store_image)
              
                  <div class="col-md-2 col-3 mb-3 mb-md-0">
                      <img src="{{ asset('uploads/stores/' . $store->store_image) }}" class="logo img-fluid" alt="{{ $store->name }}">
                  </div>
              @else
                  <div class="col-md-2 col-3 text-center mb-3 mb-md-0">
                      No Image Available
                  </div>
              @endif
              <div class="col-md-10 col-9">
                  <div class="card-body p-0 ms-md-3 ms-2">
                      <h5 class="card-title m-0">{{ $store->name }}</h5>
                      <div class="star-rating mt-1 mb-2">
                          @for ($i = 1; $i <= 5; $i++)
                              <i class="fas fa-star" data-rating="{{ $i }}"></i>
                          @endfor
                      </div>
                      @if ($store->description)
                          <p class="m-0">{{ $store->description }}</p>
                      @endif
                      <a href="{{ $store->url }}" target="_blank" class="btn btn-info btn-sm mt-2">Visit Store</a>
                  </div>
              </div>
          @endif
      </div>
  </div>
  
  @php
      $codeCount = 0;
      $dealCount = 0;
  @endphp
  <div class="container">
      <div class="row">
         
          <div class="col-md-8">
              <div class="row row-cols-1 row-cols-md">
                  @foreach ($coupons as $coupon)
                  <div class="col mb-6">
                      <div class=" coupon-card">
                          <div class="card-body">
                  <!--            @php-->
                  <!--    $store = App\Models\Stores::where('name', $coupon->store)->first();-->
                  <!--@endphp-->
                  <!--@if ($store && $store->store_image)-->
                  <!--    <img src="{{ asset('uploads/store/' . $store->store_image) }}" alt="{{ $store->name }} Image" class="storelogo">-->
                  <!--@else-->
                  <!--    <span class="no-image-placeholder">No Image Available</span>-->
                  <!--@endif-->
                              <h3>{{($coupon->name) }}</h3>
                              <div class="coupon-row">
                                  @if ($coupon->code)
                                  @php $codeCount++; @endphp
                                  <span id="cpnCode{{ $coupon->id }}" class="cpnCode">{{ $coupon->code }}</span>
  
                                  <button class="btn btn-info cpnBtn" id="cpnBtn{{ $coupon->id }}" onclick="copyCouponAndRedirect('{{ $coupon->code }}', '{{ $coupon->destination_url }}')">Copy Code</button>
                                  @else
                                  @php $dealCount++; @endphp
                                  <a href="{{ $coupon->destination_url }}" class="cpndeal text-decoration-none" target="_blank">Get Deal</a>
  
                                  @endif
                              </div>
                              <p class="card-text">Valid till {{ \Carbon\Carbon::parse($coupon->created_at)->format('d M, Y') }}</p>
                              <div id="copyMessage{{ $coupon->id }}" class="text-white mt-2" style="display: none;">Code copied successfully!</div>
                              <div class="circle-1"></div>
                              <div class="circle-2"></div>
                          </div>
                      </div>
                  </div>
                  @endforeach
              </div>
          </div>
           <div class="col-md-4">
              <aside class="sidebar p-3 bg-light">
                  <!-- Sidebar Title -->
                  <h2 class="bold text-dark mb-3">Related Stores</h2>
                  <!-- Store Listings -->
                  <div class="row gx-2 gy-2">
                      @foreach ($relatedStores as $store)
                      <div class="col-md-6 col-sm-4 col-6">
                          <a href="{{ route('store_details', ['slug' => Str::slug($store->slug)]) }}" class="text-dark text-decoration-none d-flex flex-column p-2">
                              <!-- Store Image -->
                              <img src="{{ asset('uploads/stores/' . $store->store_image) }}" alt="{{ $store->name }}" class="mb-2 shadow" style="width: 100px; height: 100px; object-fit: cover;">
                              <!-- Store Name -->
                              <p class="text-capitalize">{{ $store->name }}</p>
                          </a>
                      </div>
                      @endforeach
                  </div>
              </aside>
          </div>
      </div>
  </div>
              <!-- Totals Section, only visible on desktop -->
  <div class="totals mt-3 d-none d-lg-block">
      <div class="p-3 border rounded" style="background-color: #f8f9fa;">
          <div class="row align-items-center">
              <div class="col text-start">
                  <p style="font-size: 1.2em; margin: 0;">
                      <i class="fas fa-tag me-2"></i> Codes: 
                      <span class="badge bg-primary">{{ $codeCount }}</span>
                  </p>
              </div>
           
              <div class="col text-end">
                  <p style="font-size: 1.2em; margin: 0;">
                      <i class="fas fa-shopping-cart me-2"></i> Deals: 
                      <span class="badge bg-success">{{ $dealCount }}</span>
                  </p>
              </div>
                 <div class="col text-center">
                  @php
                      $totalCount = $codeCount + $dealCount;
                  @endphp
                  <p style="font-size: 1.2em; margin: 0;">
                      <i class="fas fa-calculator me-2"></i>Total: 
                      <span class="badge bg-info">{{ $totalCount }}</span>
                  </p>
              </div>
          </div>
      </div>
  </div>
  <div class="col-12">
    <h2 class="fw-bold home_ts_h2 text-center">Shopping Hacks & Savings Tips & Tricks</h2>
  </div>
  <div class="container bg-light">
   
      <div class="carousel-inner bg-light">
        @foreach ($blogs->chunk(20) as $chunk)
          <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <div class="d-flex flex-row flex-nowrap overflow-auto">
              @foreach ($chunk as $blog)
                <div class="col-md-4 mb-3 flex-shrink-0">
                  <div class="card shadow-sm h-100">
                    <img class=" img-fluid" src="{{ asset($blog->category_image) }}" alt="Blog Post Image" style="height:200px; width:450px;">
                    <div class="card-body">
                      <h5 class="card-title">{{ $blog->title }}</h5>
                      <p class="card-text">{{ $blog->excerpt }}</p>
                      <a href="{{ route('blog-details', ['slug' => Str::slug($blog->slug)]) }}" class="btn btn-dark stretched-link">Read More</a>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        @endforeach
      </div>
    
    </div>
      
  <br><br><br>

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
</script>

    <script>
        function openCouponInNewTab(url, couponId) {
            window.open(url, '_blank');
            var modal = new bootstrap.Modal(document.getElementById('codeModal' + couponId));
            modal.show();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>