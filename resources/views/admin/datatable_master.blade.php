<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from adminlte.io/themes/v3/pages/tables/data.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Feb 2024 08:08:58 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('datatable-title') | VouchMeNot</title>
   <link rel="icon" href="{{ asset('images/icons.png') }}" type="image/x-icon">

<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="/admin/dist/css/adminlte.min2167.css?v=3.2.0">
    
      <style>
            .sidebar-dark-primary {
            background-color: rgb(76, 177, 36) !important;
            
        }
                   
        .navbar-username {
    font-size: 2rem; /* Adjust the size as needed */
}  
.nav-link {
    color: black;
}

.nav-link .nav-icon,
.nav-link p,
.nav-link .right {
    color: black;
}

    </style>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-primary"></i></a>
    </li>
  </ul>


  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      @if (Auth::check())
        <a class="nav-link navbar-username dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle text-success"></i>
          <span class="text-dark font-weight-bold">{{ Auth::user()->name }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Profile</span>
          <div class="dropdown-divider"></div>
          <a href="profile" class="dropdown-item">
            <i class="fas fa-user mr-2 text-primary"></i> My Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt mr-2 text-danger"></i> Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      @else
        <a class="nav-link" href="{{ route('login') }}">
          <i class="far fa-user-circle"></i>
          Guest
        </a>
      @endif
    </li>
  </ul>
</nav>




     
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a  href="{{ route('dashboard') }}" class="brand-link">
                <img src="/images/icons.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">BudgetHeaven</span>
            </a>

            <div class="sidebar">

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link active">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Setup Manager
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.category') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Categories</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.store') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Stores</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.coupon') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Coupons</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.network') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Network</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.blog') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Blog</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                </nav>

            </div>

        </aside>

        {{-- Datatable Main Content Here --}}
            @yield('datatable-content')
        {{-- Datatable Main Content Here --}}

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io/">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>


    <script src="/admin/plugins/jquery/jquery.min.js"></script>

    <script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/admin/plugins/jszip/jszip.min.js"></script>
    <script src="/admin/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/admin/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script src="/admin/dist/js/adminlte.min2167.js?v=3.2.0"></script>

    <script src="/admin/dist/js/demo.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            
            $('#SearchTable').DataTable();
            
             $( "#tablecontents" ).sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
                update: function() {
                    sendOrderToServer();
                }
            });

            function sendOrderToServer() {
              var order = [];
              var token = $('meta[name="csrf-token"]').attr('content');
            //   by this function User can Update hisOrders or Move to top or under
              $('tr.row1').each(function(index,element) {
                order.push({
                  id: $(this).attr('data-id'),
                  position: index+1
                });
              });
    // the Ajax Post update 
              $.ajax({
                type: "POST", 
                dataType: "json", 
                url: "{{ route('custom-sortable') }}",
                    data: {
                  order: order,
                  _token: token
                },
                success: function(response) {
                    if (response.status == "success") {
                      console.log(response);
                    } else {
                      console.log(response);
                    }
                }
              });
            }
        });
    </script>
</body>

<!-- Mirrored from adminlte.io/themes/v3/pages/tables/data.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Feb 2024 08:09:01 GMT -->

</html>
