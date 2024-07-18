<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        nav {
            background-image: url('/images/purple1.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .social-icons a {
            color: white;
            margin-left: 10px;
            font-size: 25px;
        }

        .social-icons a:hover {
            color: black;
        }

        .btn {
            color: rgb(255, 255, 255);
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }

        .btnav::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: white;
            transition: width 0.6s ease;
        }

        .btnav:hover::before {
            width: 100%;
        }

        .btnav {
            color: white !important;
        }

        .btn-search {
            margin: 5px;
            background-color: #007bff;
            border-color: #007bff;
            color: white;
            transition: background-color 0.3s, border-color 0.3s, color 0.3s;
            padding: 0.375rem 0.75rem;
            border-radius: 0.25rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-search:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-search i {
            margin-right: 5px;
        }

        .logo-img {
            max-width: 200px;
            height: auto;
            width: 100px;
        }

        @media (max-width: 768px) {
            .logo-img {
                width: 120px;
            }
        }

        @media (max-width: 480px) {
            .logo-img {
                width: 100px;
            }
        }

        #searchInput {
            width: 400px;
            height: 2.5pc;
        }

        @media (max-width: 768px) {
            #searchInput {
                width: 100%;
            }
        }

        .navbar-toggler {
            color: white;
            background-color: white;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light" style="height: auto;">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="/images/logo1.png" class="logo-img">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="btn btnav nav-link" aria-current="page" href="/"><i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btnav nav-link" href="{{ route('stores') }}"><i class="fas fa-store"></i> Stores</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btnav nav-link text-white" href="{{ route('categories') }}"><i class="fas fa-th-list"></i> Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btnav nav-link text-white" href="{{ route('blog') }}"><i class="fas fa-blog"></i> Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btnav nav-link text-white" href="{{ route('contact') }}"><i class="fas fa-envelope"></i> Contact Us</a>
                        </li>
                    </ul>
                    <form id="searchForm" action="{{ route('search') }}" method="GET" class="form-inline my-3 my-lg-0">
                        <input class="form-control mr-sm-2 searchInput" type="search" id="searchInput" name="query" placeholder="Search Here..." aria-label="Search">
                        <button class="btn btn-search my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
