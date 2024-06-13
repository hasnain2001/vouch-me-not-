<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        nav{
            background-color: greenyellow;
        }
        .social-icons a {
            color: white; /* Change icon color as needed */
            margin-left: 10px; /* Adjust margin between icons as needed */
            font-size: 25px; /* Adjust icon size as needed */
        }
        .social-icons a :hover {
        color: black;
        
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light " style="max-width: 100%; margin: auto;">
            <div class="container-fluid">
    
                <!-- Navbar Brand (Logo) -->
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('front/assets/images/logo-01.png') }}" width="200px" alt="Honeycombdeals Logo">
                </a>
    
                <!-- Navbar Toggler (for small screens) -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <!-- Navbar Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="btn btn-$purple text-white" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-$purple text-white" aria-current="page" href="{{ route('stores') }}">Stores</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-$purple text-white" aria-current="page" href="{{ route('categories') }}">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-$purple text-white" aria-current="page" href="{{ route('blog') }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-$purple text-white" aria-current="page" href="{{ route('contact') }}">Contact Us</a>
                        </li>
                    </ul>
                       <form id="searchForm" action="{{ route('search') }}" method="GET" class="d-flex align-items-center col-10 mx-auto" style="max-width: 600px;">
                    <input type="text" id="searchInput" name="query" class="form-control me-2" placeholder="Search...">
                    <button class="btn btn-outline-primary text-white" type="submit">Search</button>
                </form>
    
                <!-- Social Icons -->
                <div class="social-icons">
                    <a href="https://www.facebook.com/honeycombdeal/" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/honeycombdeals_official/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://twitter.com/honeycombdeals/" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.pinterest.com/honeycombdeals_official/" target="_blank"><i class="fab fa-pinterest"></i></a>
                </div>
                </div>
            </div>
        </nav>
                 
    </header>
</body>
</html>