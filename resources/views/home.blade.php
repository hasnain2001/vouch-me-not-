@extends('welcome')
@section('title')
    Home
@endsection
@section('main-content')

<div class="container">
    <h1 class="heading-1">Latest Discount Codes & Promo Codes From Popular Stores</h1>
    <br>
    <div id="storeCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($stores->chunk(6) as $key => $chunk)
                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    <div class="row">
                        @foreach ($chunk as $storeItem)
                            <div class="col-6 col-md-2"> <!-- For mobile view use col-6, and for desktop use col-md-2 -->
                                @php
                                $storeUrl = $storeItem->slug
                                    ? route('store_details', ['slug' => Str::slug($storeItem->slug)])
                                    : '#';
                                @endphp
                                <a href="{{ $storeUrl }}" class="text-dark text-decoration-none">
                                    <img class="img-fluid mb-2" src="{{ asset('uploads/stores/' . $storeItem->store_image) }}" alt="{{ $storeItem->name }}" loading="lazy" />
                                    <span class="fw-bold d-block text-center">{{ $storeItem->name }}</span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <button class="store-prev" type="button" data-bs-target="#storeCarousel" data-bs-slide="prev">
            <span class="store-prev-icon" aria-hidden="true"><i class="fa-solid fa-circle-left"></i></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="store-next" type="button" data-bs-target="#storeCarousel" data-bs-slide="next">
            <span class="store-next-icon" aria-hidden="true"><i class="fa-solid fa-circle-right"></i></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>



<br>


<div class="container ">

        <div class="col-md-15">

            <h3 class="heading-2">Today's Top Trending Coupons & Voucher Codes</h3></div>
            <hr class="hr-line">
<div class="row">
    @foreach ($Coupons as $coupon)
<div class="col-md-4 mb-5">
    <div class="card coupon-card h-100 d-flex flex-column">
        <div class="cardi flex-grow-1 d-flex flex-column">
            <div class="store-logo">
                @php
                $store = App\Models\Stores::where('slug', $coupon->store)->first();
                @endphp
                @if ($store && $store->store_image)
                <img src="{{ asset('uploads/stores/' . $store->store_image) }}" class="store-image" alt="{{ $store->name }} Logo" >
                @else
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                    <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54L1 12.5v-9a.5.5 0 0 1 .5-.5z"/>
                  </svg>
                <span>{{ $coupon->store }}</span>
                @endif
            </div>
            <br>

            <h5 class="font-italic font-weight-20">{{ $coupon->name }}</h5>

            <p class="card-name ">{{ $coupon->description }}</p>
            
            <span class="coupon-created-at">Ending Date: <strong>{{ $coupon->ending_date }}</strong></span>

            <div class="coupon-buttons d-grid gap-2 mt-auto">
                @if ($coupon->code)
                    <a href="#" class="btnhome" onclick="openCouponInNewTab('{{ $coupon->destination_url }}', '{{ $coupon->id }}')">Get Code</a>
                @else
                    <a href="{{ $coupon->destination_url }}" class="btnhome" target="_blank">Get Deal</a>
                @endif
                @if ($store)
                    @php
                        $storeUrl = $store->slug
                            ? route('store_details', ['slug' => Str::slug($store->slug)])
                            : '#';
                    @endphp
                    <a href="{{ $storeUrl }}" class="btnhome">Visit Store</a>
                @endif
            </div>
        </div>
    </div>
</div>


    @endforeach
</div>


        </div>

<hr>
<div class="container mt-5">
  <h3 class="mb-4 text-center">Most Visited Categories</h3>
  <div class="category-list">
      @foreach ($categories as $category)
      <div class="category-item">
          <a href="{{ route('related_category', ['title' => Str::slug($category->title)]) }}" class="text-decoration-none">
              @if ($category->category_image)
              <img src="{{ asset('uploads/categories/' . $category->category_image) }}" alt="{{ $category->title }} Image">
              @else
              <p>No image available</p>
              @endif
              <h5 class="card-title mt-3 mx-2 text-dark">{{ $category->title }}</h5>
          </a>
      </div>
      @endforeach
  </div>
</div>
<hr >
<div class="container mt-5">
  <h3 class="mb-4 text-center">Most popular stores</h3>
  <div class="category-list">
      @foreach ($popularstores as $stores)
      <div class="category-item">
        <a href="{{ route('store_details', ['slug' => Str::slug($stores->slug)]) }}" class="text-dark text-decoration-none">
              @if ($stores->store_image)
              <img src="{{ asset('uploads/stores/' . $stores->store_image) }}" alt="{{ $stores->name }} Image">
              @else
              <p>No image available</p>
              @endif
              <h5 class="card-title mt-3 mx-2 text-dark">{{ $stores->name }}</h5>
          </a>
      </div>
      @endforeach
  </div>
</div>
<hr>


<br>


<div class="col-12">
  <h2 class="heading-1">Shopping Hacks & Savings Tips & Tricks</h2>
</div>


    <div class="carousel-inner bg-light">
      @foreach ($blogs->chunk(2000) as $chunk)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
          <div class="d-flex flex-row flex-nowrap overflow-auto">
            @foreach ($chunk as $blog)
              <div class="col-md-4 mb-3 flex-shrink-0">
                <div class="card shadow-sm h-100">
                  <img class="cardimg card-img-top img-fluid" src="{{ asset($blog->category_image) }}" alt="Blog Post Image" style="height:200px; width:450px;">
                  <div class="card-body">
                    <h5 class="card-title">{{ $blog->title }}</h5>
                    <p class="card-text">{{ $blog->excerpt }}</p>
                          @if ($blog->slug)
                    <a href="{{ route('blog-details', ['slug' => Str::slug($blog->slug)]) }}" class="btn btn-dark stretched-link">Read More</a>
                     @else
                    <a href="javascript:;" class="btn btn-dark stretched-link"> no slug</a>
                         @endif
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      @endforeach
    </div>


  <hr>
  <div class="accordion" id="accordionPanelsStayOpenExample">
    <h class="heading-1">Frequently Asked Questions </h>
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                How do I use coupons on Vouchmenot?
            </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
            <div class="accordion-body">
                <strong>To use coupons on Vouchmenot:</strong> Simply browse through our available coupons and click the "Get Deal" button. This will reveal the coupon code, which you can apply at checkout on the store's website.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                Are the coupons on Vouchmenot verified?
            </button>
        </h2>
        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
            <div class="accordion-body">
                <strong>Yes, we strive to provide verified and up-to-date coupons.</strong> However, keep in mind that coupon validity may change based on the store’s conditions.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                Can I submit a coupon to Vouchmenot?
            </button>
        </h2>
        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
            <div class="accordion-body">
                <strong>Yes, we welcome user submissions.</strong> If you have a coupon, you can submit it through our website. Our team reviews every submission before adding it to the database.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                How often are new coupons added to Vouchmenot?
            </button>
        </h2>
        <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
            <div class="accordion-body">
                <strong>New coupons are added daily.</strong> Check back often for fresh deals and savings opportunities!
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingFive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                Is Vouchmenot free to use?
            </button>
        </h2>
        <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
            <div class="accordion-body">
                <strong>Yes, Vouchmenot is 100% free.</strong> You can access and use all coupons without any fees or charges.
            </div>
        </div>
    </div>
</div>

</div>




@endsection
