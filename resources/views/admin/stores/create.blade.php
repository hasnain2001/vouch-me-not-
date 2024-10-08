@extends('admin.master')
@section('title')
    Create
@endsection
@section('main-content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Store</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            @if(session('success'))
            <div class="alert alert-success alert-dismissable">
                <i class="fa fa-ban"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <b>{{ session('success') }}</b>
            </div>
        @endif

        @if(session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->any())
        <div  class="alert alert-danger" >
            <strong>Validation error(s):</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

            <form name="CreateStore" id="CreateStore" method="POST" enctype="multipart/form-data" action="{{ route('admin.store.store') }}">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Store Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">slug <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="slug" id="slug" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="5" style="resize: none;" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="url">URL <span class="text-danger">*</span></label>
                                    <input type="url" class="form-control" name="url" id="url" required>
                                </div>
                                <div class="form-group">
                                    <label for="destination_url">Destination URL <span class="text-danger">*</span></label>
                                    <input type="url" class="form-control" name="destination_url" id="destination_url" required>
                                </div>
                                <div class="form-group">

                                   <div class="form-group">
    <label for="category">Category <span class="text-danger">*</span></label>
    <select name="category" id="category" class="form-control">
        <option value="" disabled selected>--Select Category--</option>
        @foreach($categories as $category)
            <option value="{{ $category->title }}">{{ $category->title }}</option>
        @endforeach
    </select>
</div>

                                </div>
                                <div class="form-group">
                                    <label for="name">Meta Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="name" >
                                </div>
                                {{-- <div class="form-group">
                                    <label for="meta_tag">Meta Tag <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="meta_tag" id="meta_tag">
                                </div> --}}
                                <div class="form-group">
                                    <label for="meta_keyword">Meta Keyword <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="meta_keyword" id="meta_keyword">
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea name="meta_description" id="meta_description" class="form-control" cols="20" rows="5" style="resize: none;"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                {{-- <div class="form-group">
                                    <label for="name">Top Store <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="top_store" id="top_store"  min="0"  >
                                </div> --}}
                                <div class="form-group">
                                    <label for="top_store">Top Coupons Code <span class="text-danger">*</span></label><br>
                                    <input type="radio" name="top_store" id="top_0" value="0" onclick="updateTopCoupons(0)">
                                    <label for="top_0">0</label>
        
                                    <input type="radio" name="top_store" id="top_1" value="1" onclick="updateTopCoupons(1)">
                                    <label for="top_1">1</label>
        
                                    <input type="radio" name="top_store" id="top_2" value="2" onclick="updateTopCoupons(2)">
                                    <label for="top_2">2</label>
{{--         
                                    <input type="radio" name="top_store" id="top_3" value="3" onclick="updateTopCoupons(3)">
                                    <label for="top_3">3</label>
        
                                    <input type="radio" name="top_store" id="top_4" value="4" onclick="updateTopCoupons(4)">
                                    <label for="top_4">4</label>
        
                                    <input type="radio" name="top_store" id="top_5" value="5" onclick="updateTopCoupons(5)">
                                    <label for="top_5">5</label> --}}
                                </div>
                           <div class="form-group">
    <label for="status">Status <span class="text-danger">*</span></label><br>
    <input type="radio" name="status" id="enable" value="enable" required>&nbsp;<label for="enable">Enable</label>
    <input type="radio" name="status" id="disable" value="disable">&nbsp;<label for="disable">Disable</label>
</div>

                                <div class="form-group">
                                    <label for="authentication">Authentication</label><br>
                                    <input type="checkbox" name="authentication" id="authentication" value="top_stores">&nbsp;<label for="authentication">Top Store</label>
                                </div>
                                <div class="form-group">
                                    <label for="network">Network <span class="text-danger">*</span></label>
                                    <select name="network" id="network" class="form-control">
                                        <option value="" disabled selected>--Select Network--</option>
                                        @foreach($networks as $network)
                                            <option value="{{ $network->title }}">{{ $network->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="store_image">Store Image <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="store_image" id="store_image" required>
                                </div>

                            </div>
                            <div class="col-12">
                                <button type="reset" class="btn btn-light">Reset</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('admin.store') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
</div>
@endsection
