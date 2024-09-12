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
    <link rel="stylesheet" href="{{ asset('cssfile/store.css') }}">
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
        <p class="h5 m-0">Total stores: <span class="fw-bold">{{ $stores->total() }}</span></p>
        <!-- Display Stores -->
        <h3 class="text-center my-4">Search Results</h3>
        <div class="card-list">
            @if ($stores->isEmpty())
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Sorry!</h4>
                    <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                    <hr>
                    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>
            @else
                @foreach ($stores as $store)
                    <div class="store-card shadow-sm mb-4">
                        <a href="{{ route('store_details', ['slug' => Str::slug($store->slug)]) }}" class="text-decoration-none">
                            @if ($store->store_image)
                            <img src="{{ asset('uploads/stores/' . $store->store_image) }}" class="card-img-top" alt="{{ $store->name }} Image">
                        @else
                            @if ($store->previous_image)
                                <img src="{{ asset('uploads/stores/' . $store->previous_image) }}" class="card-img-top" alt="{{ $store->name }} Image">
                            @else
                                <div class="d-flex align-items-center justify-content-center vh-100 bg-light text-muted">
                                    <i class="fas fa-store fa-3x"></i> <p class="ms-2">No image available</p>
                                </div>
                            @endif
                        @endif
                            <div class="store-info p-3">
                                <h5 class="store-name text-white">{{ $store->name ?: "Title not found" }}</h5>

                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
        {{ $stores->links('vendor.pagination.bootstrap-5') }}
    </div>




    <br><br>

    <x-footer/>


    <script src="{{ asset('front/assets/js/script.js') }}"></script>
    @yield('scripts')
</body>

</html>
