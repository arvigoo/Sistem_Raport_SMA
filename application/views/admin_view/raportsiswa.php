
<!doctype html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/ab.jpg')?>">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard Admin - Data Raport Siswa</title>
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
                                <a class="nav-link" href="<?php echo base_url('index.php/admin/tampil_siswa');?>"><i class="fa fa-fw fa-user"></i>Siswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('index.php/admin/tampil_mapel');?>"><i class="fa fa-fw fa-graduation-cap"></i>Mata Pelajaran</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?php echo base_url('index.php/admin/pilih_raport');?>"><i class="fa fa-fw fa-file"></i>Raport</a>
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
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Raport </h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="card">
                                <h5 class="card-header">Data Nilai Mata Pelajaran</h5>
                                <div class="card-body">
                                <?php echo form_open('admin/cetak_nilai_siswa');?>
                                <input type="hidden" name="nis" value="<?php foreach($results as $d){ echo $d->nis; break;}?>">
                                <div class="form-row">
                                    <select class="form-control col-1" name="pilih">
                                    <option value="pdf">PDF</option>
                                    <option value="excel">Excel</option>
                                    </select>&nbsp;
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-fw fa-print"></i> CETAK</button>
                                </div>
                                <?php echo form_close();?>
                                <br>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Mata Pelajaran</th>
                                                <th scope="col">KKM</th>
                                                <th scope="col">Pengetahuan</th>
                                                <th scope="col">Praktik</th>
                                                <th scope="col">Sikap</th>
                                                <th scope="col">Option</th>
                                            </tr>
                                        </thead>
                                        <?php $no = $page+1;
                                        $jum = 0;
                                        foreach($results as $d):
                                        $jum++;
     
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $d->nama_mp;?></td>
                                                <td><?php echo $d->kkm;?></td>
                                                <td><?php echo $d->Pengetahuan;?></td>
                                                <td><?php echo $d->Praktik;?></td>
                                                <td><?php echo $d->sikap;?></td>
                                                <td align="center">
                                                <?php echo anchor('admin/hapus_nilai/'.$d->kode_mp."/".$d->nis, '<i class="fa fa-fw fa-trash"></i> Hapus', 'title="Hapus" class="btn btn-danger btn-sm"');?>
                                                </td>
                                            </tr>
                                            <?php $no++; endforeach;?>
                                        </tbody>
                                    </table><br>
                                    <h4>Halaman : <?php echo $links;?></h4>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('assets/vendor/jquery/jquery-3.3.1.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/slimscroll/jquery.slimscroll.js')?>"></script>
    <script src="<?php echo base_url('assets/libs/js/main-js.js')?>"></script>
</body>
 
</html>