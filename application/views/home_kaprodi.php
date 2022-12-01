<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi Skripsi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     
      <!-- Tombol logout dan nama pengguna -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <span><?php echo $this->session->userdata('ses_id');?> /
          <?php echo $this->session->userdata('ses_nama');?> &nbsp;</span>
          <i class="fa fa-angle-down"></i>
        </a>
        <div class="dropdown-menu" style="width: 100px;">
          
          
          <a href="<?php echo base_url(); ?>kaprodi/ubah" class="dropdown-item">
           <i class="fa fa-lock"></i>&nbsp; Ubah Password
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url(); ?>login/logout" class="dropdown-item">
          <i class="fa fa-sign-out-alt"></i>&nbsp; Sign Out
          </a>
        </div>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" style="text-align: center;">
    <!--  <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Sistem Informasi Skripsi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- SidebarSearch Form -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>
          
          
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>kaprodi/dosen" class="nav-link">
                  <i class="nav-icon fas fa-user-alt"></i>
                  <p>Data Dosen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>kaprodi/mahasiswa" class="nav-link">
                  <i class="nav-icon fas fa-user-friends"></i>
                  <p>Data Mahasiswa</p>
                </a>
              </li>
              <li class="nav-item">
                    <a href="<?php echo base_url(); ?>kaprodi/skripsi" class="nav-link">
                      <i class="nav-icon fas fa-file-alt"></i>
                      <p>Data Skripsi</p>
                    </a>
              </li>
              
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard Kaprodi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pengajuan Skripsi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr style="text-align: center;">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th width="150px">Nama Mahasiswa</th>
                    <th>NPM</th>
                    <th width="150">Judul Skripsi</th>
                    <th width="110px">Bidang Studi</th>
                    <th width="150px">Pembimbing</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no=1;
                  foreach($skripsi as $v){ 
                  ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?php cetak($v->tanggal) ?></td>
                    <td><?php cetak($v->nama) ?></td>
                    <td><?php cetak($v->nim) ?></td>
                    <td><?php cetak($v->judul) ?></td>
                    <td><?php cetak($v->bidang) ?></td>
                    <td>
                      <?php cetak($v->dosbing1) ?><br>
                      <?php cetak($v->dosbing2) ?>
                    </td>
                    <td style="padding: 10px;"><button style="margin-bottom: 5px;" type="button" class="btn btn-block btn-success" data-toggle="modal"  data-target="#terima-<?= $v->id ?>">Terima</button><button type="button" class="btn btn-block btn-danger" data-toggle="modal"  data-target="#tolak-<?= $v->id ?>">Tolak</button></td>
                  </tr>
                  
                  <?php $no++; } ?>
                  <tr>
                   
                  </tr>
                  
                  </tbody>
                </table>
                <?php foreach($skripsi as $v) : ?>
                <!-- Modal Terima -->
                      <div class="modal fade" id="terima-<?php echo $v->id ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Terima Judul Skripsi</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"></span>
                              </button>
                            </div>
                                <form action="<?php echo base_url(); ?>kaprodi/terima_skripsi" method="POST">
                                  <div class="card-body">
                                      <input type="hidden" name="id" value="<?php echo $v->id ?>">
                                    <div class="form-group">
                                      <label for="date">Tanggal</label>
                                      <input type="date" name="tanggal" class="form-control" id="date" placeholder="NIDN" value="<?php cetak($v->tanggal) ?>" readonly="">
                                    </div>                                    
                                    <div class="form-group">
                                      <label for="exampleInputUsername1">Nama Mahasiswa</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="nama" value="<?php echo $v->nama ?>" readonly="">
                                    </div>
                                    <div class="form-group">
                                      <label for="npm">NPM</label>
                                      <input type="number" name="nim" class="form-control" id="npm" placeholder="" value="<?php echo $v->nim ?>" readonly="">
                                    </div>

                                    <div class="form-group">
                                      <label for="judul">Judul Skripsi</label>
                                      <input type="text" class="form-control" id="judul" placeholder="Judul Skripsi" name="judul" value="<?php echo $v->judul ?>" required="">
                                    </div>
                                    <div class="form-group">
                                      <label for="bidang">Bidang Studi</label>
                                      <input type="text" class="form-control" id="bidang" placeholder="Boleh dikosongkan" name="bidang" value="<?php echo $v->bidang ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="dosbing1">Dosen Pembimbing 1</label>
                                      <select id="dosbing1" name="dosbing1" class="form-control" required="">
                                       <option value="">Pilih Dosen :</option>
                                       <option value="Dosen Pembimbing A" <?php 
                                        if ($v->dosbing1 == "Dosen Pembimbing A") {
                                          echo 'selected=""';
                                        }else{
                                          echo "";
                                        }
                                        ?>>Dosen Pembimbing A</option>
                                       <option value="Dosen Pembimbing B" <?php 
                                        if ($v->dosbing1 == "Dosen Pembimbing B") {
                                          echo 'selected=""';
                                        }else{
                                          echo "";
                                        }
                                        ?>>Dosen Pembimbing B</option>
                                       <option value="Dosen Pembimbing C" <?php 
                                        if ($v->dosbing1 == "Dosen Pembimbing C") {
                                          echo 'selected=""';
                                        }else{
                                          echo "";
                                        }
                                        ?>>Dosen Pembimbing C</option>
                                       <option value="Dosen Pembimbing D" <?php 
                                        if ($v->dosbing1 == "Dosen Pembimbing D") {
                                          echo 'selected=""';
                                        }else{
                                          echo "";
                                        }
                                        ?>>Dosen Pembimbing D</option>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label for="dosbing2">Dosen Pembimbing 2</label>
                                      <select id="dosbing2" name="dosbing2" class="form-control" required="">
                                       <option value="">Pilih Dosen :</option>
                                       <option value="Dosen Pembimbing A" <?php 
                                        if ($v->dosbing2 == "Dosen Pembimbing A") {
                                          echo 'selected=""';
                                        }else{
                                          echo "";
                                        }
                                        ?>>Dosen Pembimbing A</option>
                                       <option value="Dosen Pembimbing B" <?php 
                                        if ($v->dosbing2 == "Dosen Pembimbing B") {
                                          echo 'selected=""';
                                        }else{
                                          echo "";
                                        }
                                        ?>>Dosen Pembimbing B</option>
                                       <option value="Dosen Pembimbing C" <?php 
                                        if ($v->dosbing2 == "Dosen Pembimbing C") {
                                          echo 'selected=""';
                                        }else{
                                          echo "";
                                        }
                                        ?>>Dosen Pembimbing C</option>
                                       <option value="Dosen Pembimbing D" <?php 
                                        if ($v->dosbing2 == "Dosen Pembimbing D") {
                                          echo 'selected=""';
                                        }else{
                                          echo "";
                                        }
                                        ?>>Dosen Pembimbing D</option>
                                      </select>
                                    </div>
                                  </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                      <input type="submit" class="btn btn-primary" value="Terima">
                                    </div>
                                </form> 
                          </div>
                        </div>
                      </div>
                <!-- Modal Terima Selesai -->
              <?php endforeach; ?>
              <?php foreach($skripsi as $v) : ?>
              <!-- Modal Tolak -->
                      <div class="modal fade" id="tolak-<?= $v->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Tolak Pengajuan</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Anda yakin ingin menolak pengajuan ini?</div>
                            <form action="<?php echo base_url(); ?>kaprodi/tolak_skripsi" method="POST">
                              <input type="hidden" name="id" value="<?= $v->id ?>">
                              <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                                <button style="width: 60px;" type="submit" class="btn btn-danger">Ya</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
              <!-- Modal Tolak Selesai -->
              <?php endforeach; ?>

              </div>
              <!-- /.card-body -->
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="#">Rifqi Ainun Niam</a>.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
