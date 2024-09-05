@extends('admin.master')
@section('title')
    Update
@endsection
@section('main-content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Store</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            @if(session('success'))
            <div class="alert alert-success alert-dismissable d-flex align-items-center" style="background-color: #d4edda; color: #155724; border-color: #c3e6cb;">
                <i class="fa fa-check-circle" style="font-size: 1.5em; margin-right: 10px;"></i>
                <div>
                    <b>{{ session('success') }}</b>
                </div>
                <button type="button" class="close ms-auto" data-dismiss="alert" aria-hidden="true" style="background: none; border: none; font-size: 1.5em; color: #155724;">×</button>
            </div>
        @endif

        @if(session('warning'))
            <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center" role="alert" style="background-color: #fff3cd; color: #856404; border-color: #ffeeba;">
                <i class="fa fa-exclamation-triangle" style="font-size: 1.5em; margin-right: 10px;"></i>
                <div>
                    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                </div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close" style="background: none; border: none; font-size: 1.5em; color: #856404;"></button>
            </div>
        @endif

            <form name="UpdateStore" id="UpdateStore" method="POST" enctype="multipart/form-data" action="{{ route('admin.store.update', $stores->id) }}">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Store Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $stores->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Slug<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="slug" id="slug" value="{{ $stores->slug }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="5" style="resize: none;" required>{{ $stores->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="url">URL <span class="text-danger">*</span></label>
                                    <input type="url" class="form-control" name="url" id="url" value="{{ $stores->url }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="destination_url">Destination URL <span class="text-danger">*</span></label>
                                    <input required type="url" class="form-control" name="destination_url" id="destination_url" value="{{ $stores->destination_url }} ">
                                </div>
                                <div class="form-group">
                                    <label for="category">Category <span class="text-danger">*</span></label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="" disabled selected>{{ $stores->category }}</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->title }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                  <div class="form-group">
                                    <label for="name">Meta Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="name"  value="{{ $stores->title }}" >
                                </div>
                                {{-- <div class="form-group">
                                    <label for="meta_tag">Meta Tag <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="meta_tag" id="meta_tag" value="{{ $stores->meta_tag }}">
                                </div> --}}
                                <div class="form-group">
                                    <label for="meta_keyword">Meta Keyword <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="meta_keyword" id="meta_keyword" value="{{ $stores->meta_keyword }}">
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea name="meta_description" id="meta_description" class="form-control" cols="30" rows="5" style="resize: none;">{{ $stores->meta_description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Top Store <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="top_store" id="top_store" value="{{ $stores->top_store }}" min="0"  >
                                </div>
                                <div class="form-group">
                                     <label for="status">Status <span class="text-danger">*</span></label><br>
                                    <input type="radio" name="status" id="enable" {{ $stores->status == 'enable' ? 'checked' : '' }} value="enable">&nbsp;<label for="enable">Enable</label>
                                    <input type="radio" name="status" id="disable" {{ $stores->status == 'disable' ? 'checked' : '' }} value="disable">&nbsp;<label for="disable">Disable</label>
                                </div>
                                <div class="form-group">
                                    <label for="authentication">Authentication</label><br>
                                    <input type="checkbox" name="authentication" id="authentication" {{ $stores->authentication == 'top_stores' ? 'checked' : '' }} value="top_stores">&nbsp;<label for="authentication">Top Store</label>
                                </div>
                                <div class="form-group">
                                    <label for="network">Network <span class="text-danger">*</span></label>
                                    <select name="network" id="network" class="form-control">
                                        <option value="" disabled selected>{{ $stores->network }}</option>
                                        @foreach($networks as $network)
                                            <option value="{{ $network->title }}">{{ $network->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="store_image">Store Image <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="store_image" id="store_image">
                                    @if($stores->store_image)
                                        <input type="hidden" name="previous_image" value="{{ $stores->store_image }}">
                                        <img src="{{ asset('uploads/stores/'.$stores->store_image) }}" alt="Current Store Image" style="max-width: 200px;">
                                    @else
                                        <p>No image uploaded</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('admin.store') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
