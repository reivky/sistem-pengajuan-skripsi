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
          
          
          <a href="<?php echo base_url(); ?>mahasiswa/ubah" class="dropdown-item">
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
                <a href="<?php echo base_url(); ?>mahasiswa/skripsi" class="nav-link">
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
            <h1 class="m-0 text-dark">Dashboard Mahasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>mahasiswa">Home</a></li>
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
                <h3 class="card-title">Pengajuan Skripsi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div style="width: 100px;">
                  <button type="button" class="btn btn-block btn-primary" data-toggle="modal"  data-target="#modal-tambah">Tambah</button>
                </div>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr style="text-align: center;">
                    <th>Tanggal</th>
                    <th width="150px">Nama Mahasiswa</th>
                    <th>NPM</th>
                    <th width="150">Judul Skripsi</th>
                    <th width="110px">Bidang Studi</th>
                    <th width="150px">Pembimbing</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  foreach($skripsi as $v){ 
                  ?>
                  <tr>
                    <td><?php cetak($v->tanggal) ?></td>
                    <td><?php cetak($v->nama) ?></td>
                    <td><?php cetak($v->nim) ?></td>
                    <td><?php cetak($v->judul) ?></td>
                    <td><?php cetak($v->bidang) ?></td>
                    <td>
                      <?php cetak($v->dosbing1) ?><br>
                      <?php cetak($v->dosbing2) ?>
                    </td>
                    <td>
                      <?php
                      if ($v->status == 1) {
                        echo '<div class="btn btn-block btn-success">Disetujui</div>';
                      }elseif ($v->status == 2) {
                        echo '<div class="btn btn-block btn-danger">Ditolak</div>';
                      }else{
                        echo '<div class="btn btn-block btn-info">Pending</div>';
                      }
                      ?>
                    </td>
                  </tr>
                  
                  <?php } ?>
                  </tbody>
                </table>

                <!-- Modal Tambah -->
                      <div class="modal fade" id="modal-tambah">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Ajukan Judul Skripsi</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"></span>
                              </button>
                            </div>
                                <form action="<?php echo base_url(); ?>mahasiswa/tambah_judul" method="POST">
                                  <div class="card-body">
                                    <div class="form-group">
                                      <label for="date">Tanggal</label>
                                      <input type="date" name="tanggal" class="form-control" id="date" placeholder="NIDN" value="" required="">
                                    </div>                                    <div class="form-group">
                                      <label for="exampleInputUsername1">Nama</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="nama" value="<?php echo $this->session->userdata('ses_nama');?>" readonly="">
                                    </div>
                                    <div class="form-group">
                                      <label for="npm">NPM</label>
                                      <input type="number" name="nim" class="form-control" id="npm" placeholder="" value="<?php echo $this->session->userdata('ses_id');?>" readonly="">
                                    </div>

                                    <div class="form-group">
                                      <label for="judul">Judul Skripsi</label>
                                      <input type="text" class="form-control" id="judul" placeholder="Judul Skripsi" name="judul" value="" required="">
                                    </div>
                                    <div class="form-group">
                                      <label for="bidang">Bidang Studi</label>
                                      <input type="text" class="form-control" id="bidang" placeholder="Boleh dikosongkan" name="bidang" value="">
                                    </div>
                                    <div class="form-group">
                                      <label for="dosbing1">Dosen Pembimbing 1</label>
                                      <select id="dosbing1" name="dosbing1" class="form-control" required="">
                                       <option value="">Pilih Dosen Pembimbing : </option>
                                       <option value="Dosen Pembimbing A">Dosen Pembimbing A</option>
                                       <option value="Dosen Pembimbing B">Dosen Pembimbing B</option>
                                       <option value="Dosen Pembimbing C">Dosen Pembimbing C</option>
                                       <option value="Dosen Pembimbing D">Dosen Pembimbing D</option>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label for="dosbing2">Dosen Pembimbing 2</label>
                                      <select id="dosbing2" name="dosbing2" class="form-control" required="">
                                       <option value="">Pilih Dosen Pembimbing : </option>
                                       <option value="Dosen Pembimbing A">Dosen Pembimbing A</option>
                                       <option value="Dosen Pembimbing B">Dosen Pembimbing B</option>
                                       <option value="Dosen Pembimbing C">Dosen Pembimbing C</option>
                                       <option value="Dosen Pembimbing D">Dosen Pembimbing D</option>
                                      </select>
                                    </div>
                                  </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      <input type="submit" class="btn btn-primary" value="Submit">
                                    </div>
                                </form> 
                          </div>
                        </div>
                      </div>
                <!-- Modal Tambah Selesai -->

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
