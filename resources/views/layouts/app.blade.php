<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | User </title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

 

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f6fa;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #1a1a2e;
            padding: 10px 20px;
        }

        .navbar .nav-link {
            color: #fff;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .navbar .nav-link:hover {
            color: #ff6347;
        }

        .navbar .navbar-username {
            display: flex;
            align-items: center;
            color: #fff;
        }

        .navbar .navbar-username .text-dark {
            color: #ff6347 !important;
        }

        .dropdown-menu {
            background-color: #1a1a2e;
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .dropdown-item {
            color: #fff;
            padding: 10px 20px;
            font-weight: 500;
            transition: background 0.3s ease;
        }

        .dropdown-item:hover {
            background-color: #ff6347;
            color: #fff;
        }

        .dropdown-item i {
            margin-right: 10px;
        }

        .navbar-nav.ml-auto {
            margin-left: auto;
        }

        /* Footer styles */
        footer {
            background-color: #1a1a2e;
            color: white;
            text-align: center;
            padding: 20px;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        footer a {
            color: #ff6347;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #fff;
        }
    </style>

</head>
@include('components.navbar')

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <nav class="main-header navbar navbar-expand-lg navbar-light border-bottom">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                            <i class="fas fa-bars text-primary"></i>
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        @if (Auth::check())
                            <a class="nav-link dropdown-toggle navbar-username" id="userDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle text-success"></i>
                                <span class="text-dark font-weight-bold">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li>
                                    <a href="profile" class="dropdown-item">
                                        <i class="fas fa-user mr-2 text-primary"></i> My Profile
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt mr-2 text-danger"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        @else
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="far fa-user-circle"></i> Guest
                            </a>
                        @endif
                    </li>
                </ul>
            </div>
        </nav>

        {{-- Main Content Here --}}
        @yield('main-content')
        {{-- Main Content Here --}}

    </div>

    @include('components.footer')

 
</body>
</html>
