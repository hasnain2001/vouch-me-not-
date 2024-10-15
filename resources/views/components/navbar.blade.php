<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">


    <style>
        body {
  font-size: 20px; /* or higher */
}

.container {
  max-width: 1200px; /* Adjust as per your screen size */
}

          .nav {
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
            .nav-item{
          text-align: left;
            }
        }
        #myBtn,
.loader {
    position: fixed;
}

::-webkit-scrollbar {
    width: 20px;
}
::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px grey;
    border-radius: 10px;
}
::-webkit-scrollbar-thumb {
    background: #ad38e4;
    border-radius: 10px;
}
::-webkit-scrollbar-thumb:hover {
    background: #902cd3;
}
.loader {
    width: 120px;
    height: 20px;
    background: linear-gradient(#6d12aa 0 0) 0/0 no-repeat #ddd;
    animation: 2s linear infinite l1;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999;
}
@keyframes l1 {
    100% {
        background-size: 100%;
    }
}
#myBtn {
    display: none;
    bottom: 20px;
    right: 30px;
    z-index: 99;
    border: none;
    outline: 0;
    background-color: #8327ec;
    color: #fff;
    cursor: pointer;
    padding: 15px;
    border-radius: 10px;
    font-size: 18px;
}
#myBtn:hover {
    background-color: #555;
}

    </style>
</head>
<body>

    <nav class="nav navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
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

                <form id="searchForm" action="{{ route('search') }}" method="GET" class="d-flex" >
                    @csrf
                    <input class="form-control mr-sm-2 searchInput" type="search" id="searchInput" name="query" placeholder="Search Here..." aria-label="Search">
                    <button class="btn btn-search my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
            </form>
          </div>
        </div>
      </nav>

   <!-- Loader -->
   <button onclick="topFunction()" id="myBtn" title="Go to top"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0m-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707z"/>
  </svg>

   </button>
   <div id="loader" class="loader"></div>

   <script>
     // Hide the loader once the page is fully loaded
     window.addEventListener('load', function() {
       var loader = document.getElementById('loader');
       loader.style.display = 'none';
     });

    let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
</script>
</body>
</html>
