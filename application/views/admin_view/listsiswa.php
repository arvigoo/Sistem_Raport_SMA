<!doctype html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/ab.jpg')?>">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard Admin - Siswa</title>
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
        <div class="nav-left-sidebar sidebar-info bg-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-warning">
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
                                <a class="nav-link" href="<?php echo base_url('index.php/login/dashboard');?>"><i class="fa fa-fw fa-home"></i>Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?php echo base_url('index.php/admin/tampil_siswa');?>"><i class="fa fa-fw fa-user"></i>Siswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('index.php/admin/tampil_mapel');?>"><i class="fa fa-fw fa-graduation-cap"></i>Mata Pelajaran</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('index.php/admin/pilih_raport');?>"><i class="fa fa-fw fa-file"></i>Raport</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('index.php/login/logout');?>"><i class="fa fa-fw fa-power-off"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">SISWA</h2>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Data Peserta Didik</h5>
                        <div class="card-body">
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_siswa">
                                <i class="fa fa-fw fa-plus"></i> TAMBAH SISWA
                            </a><br><br>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">NIS</th>
                                        <th scope="col">UserID</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NISN</th>
                                        <th scope="col">Option</th>
                                    </tr>
                                </thead>
                                <?php $no = $page+1;
                                foreach($results as $d):?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <td><?php echo $d->nis;?></td>
                                        <td><?php echo $d->userid;?></td>
                                        <td><?php echo $d->nama_siswa;?></td>
                                        <td><?php echo $d->nisn?></td>
                                        <td>
                                            <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubah_siswa<?php echo $d->userid;?>"><i class="fa fa-fw fa-pencil-alt"></i> Ubah</a> <?php echo anchor('admin/hapus_siswa/'.$d->userid, '<i class="fa fa-fw fa-trash"></i> Hapus', 'title="Hapus" class="btn btn-danger btn-sm"');?>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php $no++; endforeach;?>
                            </table>
                            <br>
                            <h4>Halaman : <?php echo $links;?></h4>
                            <?php echo form_open('admin/cetak_siswa');?>
                            <div class="form-row">
                                <select class="form-control col-1" name="pilih">
                                    <option value="pdf">PDF</option>
                                    <option value="excel">Excel</option>
                                </select>&nbsp;
                                <button class="btn btn-primary btn-sm"><i class="fa fa-fw fa-print"></i> CETAK</button>
                            </div>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="tambah_siswa" tabindex="-1" role="dialog" aria-labelledby="tambah-siswa" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambah-siswa">Tambah Data Siswa</h5>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>
                            <div class="modal-body">
                                <?php
                                echo form_open('admin/submit_siswa');
                                ?>
                                <div class="form-group">
                                    <label for="nama">NIS</label>
                                    <input class="form-control form-control-lg" maxlength="9" id="nis" name="var[0]" type="text" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="userid">userid</label>
                                    <input class="form-control form-control-lg" id="userid" name="var[1]" type="text" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input class="form-control form-control-lg" id="nama" name="var[2]" type="text" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="nama">NISN</label>
                                    <input class="form-control form-control-lg" maxlength="10" id="nisn" name="var[3]" type="text" autocomplete="off">
                                </div>
                                </div>
                                <div class="modal-footer">
                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <?php
                                    echo form_close();
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php foreach($results as $s):?>
                        <div class="modal fade" id="ubah_siswa<?php echo $s->userid;?>" tabindex="-1" role="dialog" aria-labelledby="ubah-siswa" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ubah-siswa">Ubah Data Siswa</h5>
                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </a>
                                </div>
                                <div class="modal-body">
                                    <?php
                                    echo form_open('admin/ubah_siswa'); 
                                    ?>
                                    <input type="hidden" name="olduserid" value="<?php echo $s->userid;?>">
                                    <div class="form-group">
                                        <label for="nama">NIS</label>
                                        <input class="form-control form-control-lg" maxlength="9" value="<?php echo $s->nis;?>" id="nis" name="var[0]" type="text" autocomplete="off" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="userid">userid</label>
                                        <input class="form-control form-control-lg" id="userid" value="<?php echo $s->userid;?>" name="var[1]" type="text" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input class="form-control form-control-lg" id="nama" value="<?php echo $s->nama;?>" name="var[2]" type="text" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">NISN</label>
                                        <input class="form-control form-control-lg" maxlength="10" value="<?php echo $s->nisn;?>" id="nisn" name="var[4]" type="text" autocomplete="off">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                    <?php
                                    echo form_close();
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
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