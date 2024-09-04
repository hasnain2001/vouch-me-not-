<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    <style>
          nav {
            background-image: url('/images/purple1.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-color: purple;
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
            background-color:purple;
            border-color: #ececec;
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
            background-color: rgb(207, 44, 207);
            border-color: 2px  #f7fbff;
        }

         button i {
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
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="/images/logo1.png" class="logo-img" alt="VouchMeNot">
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
            <form class="d-flex" action="{{ route('search') }}">
                @csrf
              <input class="form-control mr-sm-2 searchInput" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-search my-2 my-sm-0" type="submit"><i class=" text-white fas fa-search"></i></button>
            </form>
          </div>
        </div>
      </nav>

</body>
</html>
