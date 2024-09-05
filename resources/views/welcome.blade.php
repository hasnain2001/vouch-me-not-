<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/icons.png') }}" type="image/x-icon">

    <link rel="canonical" href="https://vouchmenot.com">
<title>VouchMeNot | Best Deals - Save Big on Top Brands!</title>

<meta name="description" content="Explore exclusive discounts and offers on top brands. Save money on your online shopping with Vouch Me Not.">

    <meta name="robots" content="index, follow">
    <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">
    <link rel="stylesheet" href="{{ asset('cssfile/home.css') }}">
    <link rel="stylesheet" href="{{asset('cssfile/welcome.css')}}">
    <style>
.carousel {
    position: relative;
    width: 100%;
    height: auto;
    overflow: hidden;
    margin: auto; /* Center align the carousel */
    padding-top: 4px;
    border-radius: 2%;
  }

  .carousel-inner {
    display: flex;
    transition: transform 0.5s ease-in-out;
    height: 100%;
  }

  .slider  {
    width: 100%;
    height: 500px;
    max-height:600px;

  }

  .carousel-control-prev,
        .carousel-control-next {
            width: 30px;
            height: 40px;
            top: 40%;
            transform: translateY(850%);
            background-color: rgba(0, 0, 0, 0.5);
            border: none;
            color: #fff;
            font-size: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .carousel-control-prev {
            left: 10px;
        }

        .carousel-control-next {
            right: 10px;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-image: none;
        }

        .carousel-control-prev-icon::before,
        .carousel-control-next-icon::before {
            content: '';
            display: block;
            width: 0;
            height: 0;
            border-top: 8px solid transparent;
            border-bottom: 8px solid transparent;
        }

        .carousel-control-prev-icon::before {
            border-right: 12px solid #fff;
        }

        .carousel-control-next-icon::before {
            border-left: 12px solid #fff;
        }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .carousel {
      width: 100%;
      height: 50vh;
    }

    .carousel-control-prev,
    .carousel-control-next {
      width: 30px;
      height: 30px;
      font-size: 20px;
    }
    .slider  {
    width: 100%;
    height: 300px;
    max-height:600px;

  }
  }
  .custom-indicators li {
    background-color:white;
    border-radius: 50%;
    width: 18px;
    height: 18px;
}

.custom-indicators li.active {
    background-color: #333;
}

    </style>
</head>
<body>

    <x-navbar/>

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/caraosel-1.png.jpeg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/caraosel-2.png.jpeg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/caraosel-3.jpeg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/caraosel-4.jpeg') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


      {{-- Main Content Here --}}
      @yield('main-content')
      {{-- Main Content Here --}}

      <hr>
      <x-footer/>
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
        }
</script>
</body>
</html>
