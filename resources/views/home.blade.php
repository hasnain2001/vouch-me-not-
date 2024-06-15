@extends('welcome')
@section('title')
    Home
@endsection
@section('main-content')

<style>
        .category-list {
            display: flex;
            flex-wrap: wrap;
            border: 2px dotted;
            color: #615959;
           
        }
        .category-item {
            flex: 1 1 15%;
            margin-bottom: 5px;
            text-align: center;
            padding: 20px;

        }
        .category-item img {
            width: 70px;
            height:auto;
            border-radius: 10%;
        }
        .category-item h5 {
            margin-top: 10px;
        }
        @media (max-width: 767.98px) {
            .category-item {
                flex: 0 1 48%;
            }
        }
        @media (max-width: 575.98px) {
            .category-item {
                flex: 0 1 50%;
            }
        }
</style>
<div class="container">
    <div class="container">
        <h1 class="fw-bold home_ts_h2 text-center">Latest Discount Codes & Promo Codes From Popular Stores</h1>
      
        <div class="slider-wrapper">
            <button id="prev-slide" class="slide-button"></button>
            <ul class="image-list">
                @foreach ($stores as $storeItem)
                    <li>
                        <a href="{{ route('store_details', ['slug' => Str::slug($storeItem->slug)]) }}" class="text-dark text-decoration-none">
                            <img class="image-item" src="{{ asset('uploads/stores/' . $storeItem->store_image) }}" alt="{{ $storeItem->name }}"/>
                            <span class="fw-bold d-block text-center">{{ $storeItem->name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
            <button id="next-slide" class="slide-button material-symbols-rounded"></button>
        </div>
        <div class="slider-scrollbar">
            <div class="scrollbar-track">
                <div class="scrollbar-thumb"></div>
            </div>
        </div>
    </div>
  
</div>




<br>
<hr>

<div class="container ">
 
        <div class="col-md-15">
          
            <h3 class="text-center">Today's Top Trending Coupons & Voucher Codes</h3></div>
          
<div class="row">
    @foreach ($Coupons as $coupon)
    <div class="col-md-4 mb-5">
        <div class="card coupon-card">
            <div class="cardi">
                <div class="store-logo">
                    @php
                    $store = App\Models\Stores::where('name', $coupon->store)->first();
                    @endphp
                    @if ($store && $store->store_image)
                    <img src="{{ asset('uploads/stores/' . $store->store_image) }}" class="store-image" alt="{{ $store->name }} Logo" >
                    @else
                    <span class="no-image-placeholder">No Logo Available</span>
                    @endif
                </div>
                <h5 class="card-title coupon-title ">{{ $coupon->store }}</h5>
                <span class="card-title coupon-title ">{{ $coupon->name }}</span>
             
                
                <div class="coupon-buttons">
                    @if ($coupon->code)
                    <a href="#" class="btnhome" onclick="openCouponInNewTab('{{ $coupon->destination_url }}', '{{ $coupon->id }}')">Get Code</a>
                    @else
                    <a href="{{ $coupon->destination_url }}" class="btnhome text-decoration-none" target="_blank">Get Deal</a>
                    @endif
                    @if ($store)
                    <a href="{{ route('store_details', ['slug' => Str::slug($storeItem->slug)]) }}"  class="btnhome">Visit Store</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if (($loop->index + 1) % 3 == 0)
    <div class="w-100"></div>
    @endif
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
  <h2 class="fw-bold home_ts_h2 text-center">Shopping Hacks & Savings Tips & Tricks</h2>
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
    </div></div>
    <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <h1 class="text-center">Frequently Asked Questions</h1>
            <div class="faq-section">
              <div class="accordion" id="faqAccordion">
                <div class="accordion" id="accordionExample">
                  <div class="card">
                    <div class="card-header" id="headingOne">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left text-dark" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          How do I use coupons on BudgetHeaven?
                        </button>
                      </h2>
                    </div>
                
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                      <div class="card-body">
                        To use coupons on BudgetHeaven, simply browse through our available coupons and click on the "Get Deal" button. This will reveal the coupon code, which you can then apply at checkout on the store's website .
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingTwo">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Are the coupons on BudgetHeaven verified?
                        </button>
                      </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                      <div class="card-body">
                        Yes, we strive to provide our users with verified and up-to-date coupons. However, please note that coupons are subject to change by the stores, so we recommend checking the validity of the coupon before use.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingThree">
                      <h2 class="mb-0"> 
                        <button class="btn btn-link btn-block text-left collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Can I submit a coupon to BudgetHeaven?
                        </button>
                      </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                      <div class="card-body">
                        Yes, we welcome coupon submissions from our users. If you have a coupon that you would like to share with others, you can submit it through our website. Our team will review the coupon before adding it to our database.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingFour">
                      <h2 class="mb-0"> 
                        <button class="btn btn-link btn-block text-left collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          How often are new coupons added to BudgetHeaven?
                        </button>
                      </h2>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                      <div class="card-body">
                        We regularly update our database with new coupons and deals from various stores. New coupons are added daily, so be sure to check back often for the latest savings opportunities.
                      </div>
                    </div>
                  </div>
                  
                  <div class="card">
                    <div class="card-header" id="headingFive">
                      <h2 class="mb-0"> 
                        <button class="btn btn-link btn-block text-left collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                          Is BudgetHeaven free to use?
                        </button>
                      </h2>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                      <div class="card-body">
                        Yes, BudgetHeaven is completely free for users. You can browse and use coupons without any subscription fees or hidden charges. We are committed to helping you save money on your online purchases.
                      </div>
                    </div>
                  </div>
                  
                </div>
           
              </div>
            </div>
          </div>
        </div>
      </div>
<br><br>



@endsection