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
                <span class="text-title">Selected BY Store Name</span>
                <br>
                <form method="GET" action="{{ route('admin.coupon') }}">
                    <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="store" id="category-select" onchange="this.form.submit()">
                        <option value="">All Coupon</option> <!-- Option to select all stores -->
                        @foreach($couponstore as $store)
                            <option value="{{ $store->store }}" {{ $selectedCoupon == $store->store ? 'selected' : '' }} class="text-bold">
                                {{ $store->store }}
                            </option>
                        @endforeach
                    </select>
                </form>
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
            <th>create at</th>
            <th>Last Updated</th> <!-- Add this column header -->
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
                        <i class="fa fa-fw fa-check-circle" style="color: blue;"></i>
                    @else
                        <i class="fa fa-fw fa-times-circle"style="color:red;"></i>
                    @endif
                </td>
                <td>
                   @if ($coupon->status == "disable")
                        <i class="fa fa-fw fa-times-circle" style="color: blue;"></i>
                    @else
                        <i class="fa fa-fw fa-check-circle" style="color: green;"></i>
                    @endif
                </td>
                       <td>
    <span class="badge bg-info text-dark" data-bs-toggle="tooltip" title="{{ $coupon->created_at->setTimezone('Asia/Karachi')->format('l, F j, Y h:i A') }}">
        {{ $coupon->created_at->setTimezone('Asia/Karachi')->format('M d, Y h:i A') }}
    </span>
</td>
<td>
    <span class="badge bg-warning text-dark" data-bs-toggle="tooltip" title="{{ $coupon->updated_at->setTimezone('Asia/Karachi')->format('l, F j, Y h:i A') }}">
        {{ $coupon->updated_at->setTimezone('Asia/Karachi')->format('M d, Y h:i A') }}
    </span>
</td>

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
            <th>created at</th>
            <th>Last Updated</th> <!-- Add this column footer -->
            <th>Action</th>
        </tr>
    </tfoot>
</table>

    </div>


    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete the selected coupons?')">Delete Selected</button>
    </div>


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
