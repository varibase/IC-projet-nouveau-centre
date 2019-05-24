<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Projet Nouveau Centre</title>

    <!-- Bootstrap core CSS-->
    <link href="/sb-admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="/sb-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="/sb-admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/sb-admin/css/sb-admin.css" rel="stylesheet">



</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Projet Nouveau Centre</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">


        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/admin/logout" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
        </li>
    </ul>

</nav>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#newUserModal" style="cursor:pointer;">
                <i class="fas fa-user-plus"></i>
                <span>New User</span></a>
        </li>
        <li class="nav-item @if(\Route::current()->uri == 'admin') active @endif">
            <a class="nav-link" href="/admin/">
                <i class="fas fa-fw fa-table"></i>
                <span>Users</span></a>
        </li>

        <li class="nav-item @if(\Route::current()->uri == 'admin/partners') active @endif">
            <a class="nav-link" href="/admin/partners">
                <i class="fas fa-fw fa-building"></i>
                <span>Partners</span></a>
        </li>
        <li class="nav-item @if(\Route::current()->uri == 'admin/offers') active @endif">
            <a class="nav-link" href="/admin/offers">
                <i class="fas fa-fw fa-building"></i>
                <span>Offers</span></a>
        </li>

    </ul>

    <div id="content-wrapper">

        <div class="container-fluid">



           @yield('content')


        </div>
        <!-- /.container-fluid -->



    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="/admin/logout">Logout</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/admin/create">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="first_name" class="col-form-label">First Name:</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="col-form-label">Last Name:</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="company" class="col-form-label">Company:</label>
                        <input type="text" class="form-control" id="company" name="company" required>
                    </div>
                    <div class="form-group">
                        <label for="lang" class="col-form-label">Lang:</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="lang" id="langen" value="en" required>
                            <label class="form-check-label" for="langen">EN</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="lang" id="langfr" value="fr" required>
                            <label class="form-check-label" for="langfr">FR</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_card" class="col-form-label">Card Number:</label>
                        <input type="text" class="form-control" id="user_card" name="card_number" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create User</button>
                </div>
            </form>
        </div>
    </div>
</div>
@yield('modals')

<!-- Bootstrap core JavaScript-->
<script src="/sb-admin/vendor/jquery/jquery.min.js"></script>
<script src="/sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->

<script src="/sb-admin/vendor/chart.js/Chart.min.js"></script>
<script src="/sb-admin/vendor/datatables/jquery.dataTables.js"></script>
<script src="/sb-admin/vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="/sb-admin/js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="/sb-admin/js/demo/datatables-demo.js"></script>
<!--<script src="/sb-admin/js/demo/chart-area-demo.js"></script>-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@stack('scripts')
</body>

</html>
