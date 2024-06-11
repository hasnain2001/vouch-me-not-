@extends('admin.datatable_master')
@section('datatable-title')
    Coupons
@endsection
@section('datatable-content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Coupons</h1>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{ route('admin.coupon.create') }}" class="btn btn-primary">Add New</a>
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
                       <form id="bulk-delete-form" action="{{ route('admin.coupon.deleteSelected') }}" method="POST">
    @csrf
    <div class="table-responsive">
        <table id="SearchTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th><input type="checkbox" id="select-all"></th>
                    <th>id</th>
                    <th width="30px">#</th>
                    <th>Coupon Name</th>
                    <th>Store</th>
                    <th>Never Expire</th>
                    <th>Status</th>
                    <th>Added</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="tablecontents">
                @foreach ($coupons as $coupon)
                    <tr class="row1" data-id="{{ $coupon->id }}">
                        <td><input type="checkbox" name="selected_coupons[]" value="{{ $coupon->id }}"></td>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td class="pl-3"><i class="fa fa-sort"></i></td>
                        <td>{{ $coupon->name }}</td>
                        <td>{{ $coupon->store }}</td>
                        <td>
                            @if ($coupon->authentication == "never_expire")
                                <i class="fa fa-fw fa-check-circle"></i>
                            @else
                                <i class="fa fa-fw fa-times-circle"></i>
                            @endif
                        </td>
                        <td>
                            @if ($coupon->status == "disable")
                                <i class="fa fa-fw fa-times-circle"></i>
                            @else
                                <i class="fa fa-fw fa-check-circle"></i>
                            @endif
                        </td>
                        <td>{{ $coupon->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.coupon.edit', $coupon->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <a href="{{ route('admin.coupon.delete', $coupon->id) }}" onclick="return confirm('Are you sure you want to delete this!')" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th><input type="checkbox" id="select-all-footer"></th>
                    <th>id</th>
                    <th width="30px">#</th>
                    <th>Coupon Name</th>
                    <th>Store</th>
                    <th>Never Expire</th>
                    <th>Status</th>
                    <th>Added</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete the selected coupons?')">Delete Selected</button>
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
        let checkboxes = document.querySelectorAll('input[name="selected_coupons[]"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = event.target.checked;
        });
    });

    document.getElementById('select-all-footer').addEventListener('click', function(event) {
        let checkboxes = document.querySelectorAll('input[name="selected_coupons[]"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = event.target.checked;
        });
    });
</script>



@endsection
