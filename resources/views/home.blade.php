@extends('welcome')
@section('title')
    Home
@endsection
@section('main-content')

style

<div class="container">
    <div class="container">
        <h2 class="fw-bold home_ts_h2">Latest Discount Codes & Promo Codes From Popular Stores</h2>
        <div class="slider-wrapper">
            <button id="prev-slide" class="slide-button material-symbols-rounded"></button>
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
  




<br><br>
<hr  style="border: 2px dotted;">

<div class="container">
 
        <div class="col-md-15">
          
            <h3>Top Coupons</h3></div>
          
<div class="row">
    @foreach ($Coupons as $coupon)
    <div class="col-md-4 mb-5">
        <div class="card coupon-card">
            <div class="card-body">
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
                <h5 class="card-title coupon-title text-primary">{{ $coupon->store }}</h5>
                <span class="card-title coupon-title text-primary">{{ $coupon->name }}</span>
                <p class="card-text coupon-description">{{ $coupon->description }}</p>
                
                <div class="coupon-buttons">
                    @if ($coupon->code)
                    <a href="#" class="btn btn-primary get-deal-button" onclick="openCouponInNewTab('{{ $coupon->destination_url }}', '{{ $coupon->id }}')">Code & Activate</a>
                    @else
                    <a href="{{ $coupon->destination_url }}" class="btn btn-primary get-deal-button" target="_blank">Get Deal</a>
                    @endif
                    @if ($store)
                    <a href="{{ route('store_details', ['slug' => Str::slug($storeItem->slug)]) }}"  class="btn btn-outline-primary visit-store-button">Visit Store</a>
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

</div>
<br><br>
<hr  style="border: 2px dotted;">



<br><br><br>


      <h3 class="text-center mb-5">Trending  Blogs</h3> 
      <hr style="border: 2px dotted;">
       <div class="row gx-4 gy-4">  @foreach ($home as $blog)
          <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm rounded-lg overflow-hidden">  <img src="{{ asset($blog->category_image) }}" alt="Blog Post Image" class=" shadow card-img-top img-fluid" style="max-width: 100%; height: 200px; object-fit: cover;">
              <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="card-title">{{ $blog->title }}</h5>
                <p class="card-text text-muted">{{ Str::limit($blog->excerpt, 100) }}</p> 
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

    </div></div>

<br><br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/js/bootstrap.bundle.min.js"></script>
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
        
        // Automatically close the modal after 5 seconds when hovered over
        setTimeout(function() {
            modal.hide();
        }, 5000); // 5000 milliseconds = 5 seconds
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageList = document.querySelector('.slider-wrapper .image-list');
        const slideButtons = document.querySelectorAll('.slider-wrapper .slide-button');
        const sliderScrollbar = document.querySelector('.container .slider-scrollbar');
        const scrollbarThumb = sliderScrollbar.querySelector('.scrollbar-thumb');
        const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;

        // Handle scrollbar thumb drag
        scrollbarThumb.addEventListener('mousedown', (e) => {
            const startX = e.clientX;
            const thumbPosition = scrollbarThumb.offsetLeft;
            const maxThumbPosition = sliderScrollbar.getBoundingClientRect().width - scrollbarThumb.offsetWidth;

            // Update thumb position on mouse move
            const handleMouseMove = (e) => {
                const deltaX = e.clientX - startX;
                const newThumbPosition = thumbPosition + deltaX;

                // Ensure the scrollbar thumb stays within bounds
                const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
                const scrollPosition = (boundedPosition / maxThumbPosition) * maxScrollLeft;

                scrollbarThumb.style.left = `${boundedPosition}px`;
                imageList.scrollLeft = scrollPosition;
            }

            // Remove event listeners on mouse up
            const handleMouseUp = () => {
                document.removeEventListener('mousemove', handleMouseMove);
                document.removeEventListener('mouseup', handleMouseUp);
            }

            // Add event listeners for drag interaction
            document.addEventListener('mousemove', handleMouseMove);
            document.addEventListener('mouseup', handleMouseUp);
        });

        // Slide images according to the slide button clicks
        slideButtons.forEach(button => {
            button.addEventListener('click', () => {
                const direction = button.id === 'prev-slide' ? -1 : 1;
                const scrollAmount = imageList.clientWidth * direction;
                imageList.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            });
        });

        // Show or hide slide buttons based on scroll position
        const handleSlideButtons = () => {
            slideButtons[0].style.display = imageList.scrollLeft <= 0 ? 'none' : 'flex';
            slideButtons[1].style.display = imageList.scrollLeft >= maxScrollLeft ? 'none' : 'flex';
        }

        // Update scrollbar thumb position based on image scroll
        const updateScrollThumbPosition = () => {
            const scrollPosition = imageList.scrollLeft;
            const thumbPosition = (scrollPosition / maxScrollLeft) * (sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth);
            scrollbarThumb.style.left = `${thumbPosition}px`;
        }

        // Call these two functions when image list scrolls
        imageList.addEventListener('scroll', () => {
            updateScrollThumbPosition();
            handleSlideButtons();
        });

        // Initialize slider
        handleSlideButtons();
        updateScrollThumbPosition();
    });
</script>

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
  <script src="{{ asset('front/assets/js/java.js') }}"></script>
@endsection