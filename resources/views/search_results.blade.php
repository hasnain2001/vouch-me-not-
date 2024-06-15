<!doctype html>
<html lang="en">

<head>
    <title>@yield('title') |Deals69</title>
    <link rel="icon" href="{{ asset('images/icons.png') }}" type="image/x-icon">
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="{{ asset('bootstrap-4.6.2-dist/css/bootstrap.min.css') }}">

    
  
<meta name='impact-site-verification' value='de4ec733-7974-4b7d-a7aa-611819cb6e0f'>

</head>

<body>

    <x-navbar/>

    <br>
<div class="container"> 
    <!-- Display Stores -->
    <h3 class="text-center">Search Results</h3>
    <div class="main_content">
        <div class="container">
            <div class="row mt-3">
                @if (isset($stores) && $stores->isEmpty())
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Store Not Found!</h4>
                  
                    <hr>
                    <p class="mb-0">Please check the store name and try again.</p>
                </div>
                @elseif(isset($stores))
                    @foreach ($stores as $store)
                        <div class="col-12 col-lg-3">
                            @if ($store->slug)
                                <a href="{{ route('store_details', ['slug' => Str::slug($store->slug)]) }}" class="text-decoration-none">
                            @else
                                <a href="javascript:;" class="text-decoration-none">
                            @endif
                                    <div class="card shadow">
                                        <div class="card-body">
                                            @if ($store->store_image)
                                                <img src="{{ asset('uploads/stores/' . $store->store_image) }}" width="100%" alt="{{ $store->name }}">
                                            @else
                                                <img src="{{ asset('front/assets/images/no-image-found.jpg') }}" width="100%" alt="No Image Found">
                                            @endif
                                            <h5 class="card-title mt-3 mx-2">{{ isset($store->name) ? $store->name : "Title not found" }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

        
  
    <br><br><br><br><br><br>
    
    <x-footer/>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="{{ asset('front/assets/js/script.js') }}"></script>
    @yield('scripts')
</body>

</html>
