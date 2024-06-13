<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HCD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('cssfile/home.css') }}">
    <style>
        /* styles.css */
body {
    font-family: Arial, sans-serif;
}

.carousel-container {
    max-width: 1200px;
    width: 95%;
    margin: auto;
    position: relative;
    overflow: hidden;
}

.carousel-wrapper {
    position: relative;
    display: flex;
    align-items: center;
}

.carousel-wrapper .slide-button {
    position: absolute;
    top: 50%;
    outline: none;
    border: none;
    height: 50px;
    width: 50px;
    z-index: 5;
    color: #fff;
    display: flex;
    cursor: pointer;
    font-size: 2.2rem;
    background: #000;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transform: translateY(-50%);
}

.carousel-wrapper .slide-button:hover {
    background: #404040;
}

.carousel-wrapper .slide-button#prev-slide {
    left: -25px;
}

.carousel-wrapper .slide-button#next-slide {
    right: -25px;
}

.carousel-wrapper .carousel-list {
    display: flex;
    gap: 18px;
    list-style: none;
    margin-bottom: 30px;
    overflow-x: auto;
    scrollbar-width: none;
}

.carousel-wrapper .carousel-list::-webkit-scrollbar {
    display: none;
}

.carousel-wrapper .carousel-list .carousel-item {
    flex: 0 0 auto;
}

.carousel-wrapper .carousel-list .carousel-image {
    width: 100%;
    height: auto;
    max-width: 220px;
    object-fit: cover;
    border-radius: 50%;
}

.carousel-container .carousel-scrollbar {
    height: 24px;
    width: 100%;
    display: flex;
    align-items: center;
}

.carousel-scrollbar .scrollbar-track {
    background: #ccc;
    width: 100%;
    height: 2px;
    display: flex;
    align-items: center;
    border-radius: 4px;
    position: relative;
}

.carousel-scrollbar:hover .scrollbar-track {
    height: 4px;
}

.carousel-scrollbar .scrollbar-thumb {
    position: absolute;
    background: #000;
    top: 0;
    bottom: 0;
    width: 50%;
    height: 100%;
    cursor: grab;
    border-radius: inherit;
}

.carousel-scrollbar .scrollbar-thumb:active {
    cursor: grabbing;
    height: 8px;
    top: -2px;
}

.carousel-scrollbar .scrollbar-thumb::after {
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    top: -10px;
    bottom: -10px;
}

/* Styles for mobile and tablets */
@media only screen and (max-width: 1023px) {
    .carousel-wrapper .slide-button {
        display: none !important;
    }

    .carousel-wrapper .carousel-list {
        gap: 10px;
        margin-bottom: 15px;
        scroll-snap-type: x mandatory;
    }
}

    </style>
  </head>
  <body>
<x-navbar/>
{{-- <div class="carousel-container">
   
    <div class="carousel-wrapper">
        <button id="prev-slide" class="slide-button">&lt;</button>
        <ul class="carousel-list">
            <!-- Repeat this li block for each store item -->
            <li class="carousel-item">
                <a href="#" class="text-dark text-decoration-none">
                    <img class="carousel-image" src="store1.jpg" alt="Store 1"/>
                    <span class="fw-bold d-block text-center">Store 1</span>
                </a>
            </li>
            <!-- Add more items as needed -->
        </ul>
        <button id="next-slide" class="slide-button">&gt;</button>
    </div>
    <div class="carousel-scrollbar">
        <div class="scrollbar-track">
            <div class="scrollbar-thumb"></div>
        </div>
    </div>
</div> --}}

      {{-- Main Content Here --}}
@yield('main-content')
{{-- Main Content Here --}}
<x-footer/>
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

// script.js
const initCarousel = () => {
    const carouselList = document.querySelector(".carousel-wrapper .carousel-list");
    const slideButtons = document.querySelectorAll(".carousel-wrapper .slide-button");
    const carouselScrollbar = document.querySelector(".carousel-container .carousel-scrollbar");
    const scrollbarThumb = carouselScrollbar.querySelector(".scrollbar-thumb");
    const maxScrollLeft = carouselList.scrollWidth - carouselList.clientWidth;

    // Handle scrollbar thumb drag
    scrollbarThumb.addEventListener("mousedown", (e) => {
        const startX = e.clientX;
        const thumbPosition = scrollbarThumb.offsetLeft;
        const maxThumbPosition = carouselScrollbar.getBoundingClientRect().width - scrollbarThumb.offsetWidth;

        const handleMouseMove = (e) => {
            const deltaX = e.clientX - startX;
            const newThumbPosition = thumbPosition + deltaX;
            const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
            const scrollPosition = (boundedPosition / maxThumbPosition) * maxScrollLeft;

            scrollbarThumb.style.left = `${boundedPosition}px`;
            carouselList.scrollLeft = scrollPosition;
        };

        const handleMouseUp = () => {
            document.removeEventListener("mousemove", handleMouseMove);
            document.removeEventListener("mouseup", handleMouseUp);
        };

        document.addEventListener("mousemove", handleMouseMove);
        document.addEventListener("mouseup", handleMouseUp);
    });

    // Slide images according to the slide button clicks
    slideButtons.forEach(button => {
        button.addEventListener("click", () => {
            const direction = button.id === "prev-slide" ? -1 : 1;
            const scrollAmount = carouselList.clientWidth * direction;
            carouselList.scrollBy({ left: scrollAmount, behavior: "smooth" });
        });
    });

    const handleSlideButtons = () => {
        slideButtons[0].style.display = carouselList.scrollLeft <= 0 ? "none" : "flex";
        slideButtons[1].style.display = carouselList.scrollLeft >= maxScrollLeft ? "none" : "flex";
    };

    const updateScrollThumbPosition = () => {
        const scrollPosition = carouselList.scrollLeft;
        const thumbPosition = (scrollPosition / maxScrollLeft) * (carouselScrollbar.clientWidth - scrollbarThumb.offsetWidth);
        scrollbarThumb.style.left = `${thumbPosition}px`;
    };

    carouselList.addEventListener("scroll", () => {
        updateScrollThumbPosition();
        handleSlideButtons();
    });

    window.addEventListener("resize", initCarousel);
    window.addEventListener("load", initCarousel);
};

initCarousel();

</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>