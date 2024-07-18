
<?php
header("X-Robots-Tag:index, follow");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/icons.png') }}" type="image/x-icon">

    <link rel="canonical" href="https://vouchmenot.com">
<title>VouchMeNot | Best Deals - Save Big on Top Brands!</title>

<meta name="description" content="Explore exclusive discounts and offers on top brands. Save money on your online shopping with Vouch Me Not.">

    <meta name="robots" content="index, follow">
    <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{ asset('cssfile/home.css') }}">
    <link rel="stylesheet" href="{{asset('cssfile/welcome.css')}}">
   <link rel="stylesheet" href="{{ asset('bootstrap-4.6.2-dist/css/bootstrap.min.css') }}">



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
    width: 40px;
    height: 40px;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color:rgb(5, 5, 5);
    border: none;
    color: #fff;
    font-size: 34px;
    cursor: pointer;
    border-radius: 50%;
    user-select: none;
    transition: background-color 0.3s ease, transform 0.3s ease;
  }

  .carousel-control-prev:hover,
  .carousel-control-next:hover {
    background-color: rgba(0, 0, 0, 0.8);

  }

  .carousel-control-prev {
    left: 10px;
  }

  .carousel-control-next {
    right: 10px;
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

 </style>
  </head>
  <body>

<x-navbar/>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="6000">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('images/caraosel.png.png') }}" class="slider d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/caraosel-1.png') }}" class="slider d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/caraosel-2.png') }}" class="slider d-block w-100" alt="...">
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
</div>

<hr>

      {{-- Main Content Here --}}
@yield('main-content')
{{-- Main Content Here --}}

<hr>
<x-footer/>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script>
        let currentSlide = 0;

function showSlide(index) {
  const slides = document.querySelectorAll('.carousel-item');
  if (index >= slides.length) {
    currentSlide = 0;
  } else if (index < 0) {
    currentSlide = slides.length - 1;
  } else {
    currentSlide = index;
  }
  const offset = -currentSlide * 100;
  document.querySelector('.carousel-inner').style.transform = `translateX(${offset}%)`;
}

function nextSlide() {
  showSlide(currentSlide + 1);
}

function prevSlide() {
  showSlide(currentSlide - 1);
}

document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.carousel-control-prev, .carousel-control-next').forEach(button => {
    button.addEventListener('click', () => {
      setTimeout(() => {
        showSlide(currentSlide);
      }, 200); // Small delay to ensure the slide index updates
    });
  });
});
</script>
<script>

$(document).ready(function() {
    $('#searchInput').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: '{{ route("search") }}',
                dataType: 'json',
                data: {
                    query: request.term
                },
                success: function(data) {
                    response(data.stores);
                }
            });
        },

    });
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

        // Automatically close the modal after 5 seconds when hovered over
        setTimeout(function() {
            modal.hide();
        }, 5000); // 5000 milliseconds = 5 seconds
    }

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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
  </body>
</html>
