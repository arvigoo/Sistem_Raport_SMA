<!doctype html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/ab.jpg')?>">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard Siswa | Update Password</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>">
    <link href="<?php echo base_url('assets/vendor/fonts/circular-std/style.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/css/style.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fonts/fontawesome/css/fontawesome-all.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/charts/chartist-bundle/chartist.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/charts/morris-bundle/morris.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/charts/c3charts/c3.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fonts/flag-icon-css/flag-icon.min.css')?>">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class= "navbar navbar-expand-md navbar-dark bg-warning fixed-top" >
                <div class="container">
                    <a class="navbar-brand" href="#">SMAS Cenderawasih 2</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-info bg-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('index.php/login/dashboard');?>"><i class="fa fa-fw fa-user"></i>Profil Siswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?php echo base_url('index.php/user/ubahpass_siswa');?>"><i class="fa fa-fw fa-graduation-cap"></i>Update Password</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('index.php/user/tampil_raport');?>"><i class="fa fa-fw fa-file"></i>Raport</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('index.php/login/logout');?>"><i class="fa fa-fw fa-power-off"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Update Password</h2>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Password</h5>
                                <div class="card-body">
                                    <?php echo form_open('user/updatepass_siswa');?>
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" id="passold" name="passold" type="password" placeholder="Password Lama">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" id="passnew" name="passnew" type="password" placeholder="Password Baru">
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Simpan">
                                    <?php echo form_close();?>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery-3.3.1.min.js')?>"></script>
    <!-- bootstap bundle js -->
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.js')?>"></script>
    <!-- slimscroll js -->
    <script src="<?php echo base_url('assets/vendor/slimscroll/jquery.slimscroll.js')?>"></script>
    <!-- main js -->
    <script src="<?php echo base_url('assets/libs/js/main-js.js')?>"></script>
    <!-- chart chartist js -->
    <script src="<?php echo base_url('assets/vendor/charts/chartist-bundle/chartist.min.js')?>"></script>
    <!-- sparkline js -->
    <script src="<?php echo base_url('assets/vendor/charts/sparkline/jquery.sparkline.js')?>"></script>
    <!-- morris js -->
    <script src="<?php echo base_url('assets/vendor/charts/morris-bundle/raphael.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/charts/morris-bundle/morris.js')?>"></script>
    <!-- chart c3 js -->
    <script src="<?php echo base_url('assets/vendor/charts/c3charts/c3.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/charts/c3charts/d3-5.4.0.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/charts/c3charts/C3chartjs.js')?>"></script>
    <script src="<?php echo base_url('assets/libs/js/dashboard-ecommerce.js')?>"></script>
</body>
</html>