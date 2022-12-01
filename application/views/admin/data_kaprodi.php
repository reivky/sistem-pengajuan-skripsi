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
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <style type="text/css">
    .hidetext { -webkit-text-security: disc; /* Default */ }
  </style>
</head>
<body class="hold-transition sidebar-mini">
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
          <span>Admin &nbsp;</span>
          <i class="fa fa-angle-down"></i>
        </a>
        <div class="dropdown-menu" style="width: 100px;">
          
          
          <a href="<?php echo base_url(); ?>admin/ubah" class="dropdown-item">
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
            <a href="<?php echo base_url(); ?>admin" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>
          
          <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-user-tie"></i>
                  <p>Kaprodi</p>
                </a>
          </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/dosen" class="nav-link">
                  <i class="nav-icon fas fa-user-alt"></i>
                  <p>Dosen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/mahasiswa" class="nav-link">
                  <i class="nav-icon fas fa-user-friends"></i>
                  <p>Mahasiswa</p>
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
            <h1 class="m-0 text-dark">Kaprodi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
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
                <h3 class="card-title">Data Ketua Program Studi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div style="width: 100px;">
                  <button type="button" class="btn btn-block btn-primary" data-toggle="modal"  data-target="#modal-tambah">Tambah</button>
                </div>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr style="text-align: center;">
                    <th>Program Studi</th>
                    <th>NIDN</th>
                    <th>Nama</th>
                    <th>Password</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no = 1;
                  foreach($kprodi as $v){ 
                  ?>
                  <tr>
                    <td><?php cetak($v->prodi) ?></td>
                    <td><?php cetak($v->nidn) ?></td>
                    <td><?php cetak($v->nama) ?></td>
                    <td class="hidetext"><?php cetak($v->password) ?></td>
                    <td width="50px">
                      <a onclick="deleteConfirm('<?php echo base_url('admin/hapus_progdi/'.$v->nidn) ?>')" href="#!" class="btn btn-block btn-danger"><i class="fas fa-trash-alt"></i> </a>
                      </button>
                    </td>
                  </tr>
                  
                  <?php } ?>
                  </tbody>
                </table>
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
    <!-- Modal Hapus -->
                      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                              <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Modal Hapus Selesai -->

                      <!-- Modal Tambah -->
                      <div class="modal fade" id="modal-tambah">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Tambah Data</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"></span>
                              </button>
                            </div>
                                <form action="<?php echo base_url(); ?>admin/tambah_kaprodi" method="POST">
                                  <div class="card-body">
                                    <div class="form-group">
                                      <label for="exampleInputUsername1">Program Studi</label>
                                      <select name="prodi" class="form-control">
                                      <option value="">Pilih :</option>
                                      <option value="Informatika">Informatika</option>
                                      <option value="Arsitektur">Arsitektur</option>
                                      <option value="Teknologi Pangan">Teknologi Pangan</option>
                                      <option value="Teknik Mesin">Teknik Mesin</option>
                                      <option value="Teknik Elektro">Teknik Elektro</option>
                                      <option value="Pendidikan Guru Sekolah Dasar">Pendidikan Guru Sekolah Dasar</option>
                                      <option value="Pendidikan Guru PAUD">Pendidikan Guru PAUD</option>
                                      <option value="Hukum">Hukum</option>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputUsername1">NIDN</label>
                                      <input type="number" name="nidn" class="form-control" id="exampleInputEmail1" placeholder="NIDN" value="" required="">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputUsername1">Nama</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama" name="nama" value="" required="">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Password</label>
                                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="" required="">
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
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="#">Rifqi Ainun Niam</a>.</strong> All rights reserved.
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
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
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
<script>
  function deleteConfirm(url){
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
  }
  </script>
</body>
</html>
