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
<style>
    .card {
    transition: transform 0.3s ease-in-out;
}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
}

.card img {
    max-height: 200px;
    object-fit: cover;
}

</style>
</head>

<body>

    <x-navbar/>

    <br>
    <div class="container">
        <!-- Display Stores -->
        <h3 class="text-center my-4">Search Results</h3>
        <div class="main_content">
            <div class="container">
                <div class="row mt-3">
                    @if (isset($stores) && $stores->isEmpty())
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Store Not Found!</h4>
                                <hr>
                                <p class="mb-0">Please check the store name and try again.</p>
                            </div>
                        </div>
                    @elseif(isset($stores))
                        @foreach ($stores as $store)
                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="card shadow h-100">
                                    <div class="card-body text-center">
                                        @if ($store->store_image)
                                            <img src="{{ asset('uploads/stores/' . $store->store_image) }}" class="img-fluid rounded" alt="{{ $store->name }}">
                                        @else
                                            <img src="{{ asset('front/assets/images/no-image-found.jpg') }}" class="img-fluid rounded" alt="No Image Found">
                                        @endif
                                        <h5 class="card-title mt-3">{{ isset($store->name) ? $store->name : "Title not found" }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        {{ $stores->links('vendor.pagination.bootstrap-5') }}
    </div>




    <br><br>

    <x-footer/>


    <script src="{{ asset('front/assets/js/script.js') }}"></script>
    @yield('scripts')
</body>

</html>
