
<?php
header("X-Robots-Tag:index, follow");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


       <title>{!! $category->title !!}</title>
       <link rel="canonical" href="https://budgetheaven.com/related_category/{{ Str::slug($category->title) }}">

       <!-- Your custom meta tags go here -->
       <meta name="description" content="{!! $category->meta_description !!}">
       <meta name="keywords" content="{!! $category->meta_keyword !!}">


  <meta name="author" content="John Doe">
 <meta name="robots" content="index, follow">
 <link rel="icon" href="{{ asset('images/icons.png') }}" type="image/x-icon">
<link rel="canonical" href="https://deals69.com/categories">
<link rel="stylesheet" href="{{ asset('bootstrap-4.6.2-dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('cssfile/store.css') }}">
<style>
    .body{
background-color:#fff;
}
.container {
max-width: 1200px;
margin: auto;
padding: 20px;
}

.bg-light {
background-color: #f8f9fa;
}

.card-list {
display: flex;
flex-wrap: wrap;
justify-content: space-around;
align-items: center;
}

.card-list a {
text-decoration: none;
color: inherit;
width: 100%;
max-width: 200px;
margin-bottom: 20px;
padding: 10px;
border-radius: 5px;

transition: all 0.3s ease;
}

.card-list a:hover {
box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.stores {
width: 100%;
height: auto;
border-radius: 60%;
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
transition: transform 0.3s ease;
}
.stores:hover {
transform: scale(1.05);
}
.card-title {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #7c3ac7, #9d50bb, #d16ba5);
    text-align: center;
    margin-top: 10px;
    font-size: 1.8rem;
    padding: 20px 20px;
    border-radius: 15px;
    color: white;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}


@media (min-width: 768px) {
.card-list {
    justify-content: flex-start;
}

.card-list a {
    width: calc(25% - 20px);
    margin-right: 20px;
    margin-bottom: 20px;
}

.card-list a:nth-child(4n) {
    margin-right: 0;
}
}

</style>
</head>
<body>
    <x-navbar/>

<div class="container">
    <h1 class="text  card-title">{{$category->title}}</h1>
</div>



<div class="container">
    <p class="h5 m-0">Total stores: <span class="fw-bold">{{ $stores->total() }}</span></p>
</div>
<div class="container">
    <div class="card-list">
        @if ($stores->isEmpty())
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Your Category  is Empty!</h4>
                <p>It looks like you haven't added anything to your category yet. Start shopping to fill it up!.</p>
                <hr>
                <p class="mb-0">Explore our products and find something you love..</p>
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
</div>
{{ $stores->links('vendor.pagination.bootstrap-5') }}

    <x-footer/>






        <script>
            function openCouponInNewTab(url, couponId) {
                window.open(url, '_blank');
                var modal = new bootstrap.Modal(document.getElementById('codeModal' + couponId));
                modal.show();
            }


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
        </script>
</body>
</html>
