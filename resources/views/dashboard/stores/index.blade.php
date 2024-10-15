@extends('admin.datatable_master')
@section('datatable-title')
    Stores
@endsection
@section('datatable-content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Stores</h1>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{ route('admin.store.create') }}" class="btn btn-primary">Add New</a>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                      <form id="bulk-delete-form" action="{{ route('admin.store.deleteSelected') }}" method="POST">
    @csrf
    <div class="table-responsive">
        <table id="SearchTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th><input type="checkbox" id="select-all"></th>
                    <th scope="col">#</th>
                    <th>Store Name</th>
                    <th>Store Image</th>
                    <th>Network</th>
                    <th>Featured</th>
                    <th>Top Store</th>
                    <th>Popular Store</th>
                    <th>Status</th>
                    <th>Added</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stores as $store)
                    <tr>
                        <td><input type="checkbox" name="selected_stores[]" value="{{ $store->id }}"></td>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $store->name }}</td>
                        <td><img class="stores shadow rounded-circle" src="{{ $store->store_image ? asset('uploads/stores/' . $store->store_image) : asset('front/assets/images/no-image-found.jpg') }}" alt="Card Image"  style="max-width: 60px;"></td>
                        <td>{{ $store->network }}</td>
                        <td>{{ $store->category }}</td>
                        <td>
                                   @if ($store->authentication == "featured")
            <i class="fas fa-check-circle text-success"></i>
          @else
            <i class="fas fa-times-circle text-danger"></i>
          @endif

                        </td>
                        <td>
                          @if ($store->authentication == "top_store")
            <i class="fas fa-check-circle text-success"></i>
          @else
            <i class="fas fa-times-circle text-danger"></i>
          @endif
                        </td>
                        <td>
                             @if ($store->status == "disable")
            <i class="fas fa-times-circle text-danger"></i>
          @else
            <i class="fas fa-check-circle text-success"></i>
          @endif
                        </td>
                        <td>{{ $store->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.store.edit', $store->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <a href="{{ route('admin.store.delete', $store->id) }}" onclick="return confirm('Are you sure you want to delete this!')" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th><input type="checkbox" id="select-all-footer"></th>
                    <th scope="col">#</th>
                    <th>Store Name</th>
                    <th>Store Image</th>
                    <th>Network</th>
                    <th>Featured</th>
                    <th>Top Store</th>
                    <th>Popular Store</th>
                    <th>Status</th>
                    <th>Added</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete the selected stores and their coupons?')">Delete Selected</button>
</form>


                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </section>

    </div>
    
    
<script>
    // JavaScript to handle the select all functionality
    document.getElementById('select-all').addEventListener('click', function(event) {
        let checkboxes = document.querySelectorAll('input[name="selected_stores[]"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = event.target.checked;
        });
    });

    document.getElementById('select-all-footer').addEventListener('click', function(event) {
        let checkboxes = document.querySelectorAll('input[name="selected_stores[]"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = event.target.checked;
        });
    });
</script>
@endsection
