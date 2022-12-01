<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistem Informasi Skripsi - Login</title>
	<link href="<?php echo base_url(); ?>assets/3/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/3/css/datepicker3.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/3/css/styles.css" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form" action="<?php echo base_url('login/auth'); ?>" method="post">
						<fieldset>
							<div class="card-body" style="color: white;">
							<?php echo $this->session->flashdata('msg');?>
							</div>
							<div class="form-group">
								<input type="text" name="username"  class="form-control" aria-describedby="emailHelp" placeholder="Username" autofocus="" value="" required>
							</div>
							<div class="form-group">
								<select id="akses" name="akses" required tabindex="3" class="form-control" required="">
				                     <option value="">Pilih Jenis User : </option>
				                     <option value="admin">Administrator</option>
				                     <option value="progdi">Program Studi</option>
				                     <option value="dosen">Dosen</option>
				                     <option value="mhs">Mahasiswa</option>
								</select>
							</div>
							
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="" required>
							</div>

							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<input class="btn btn-primary" type="submit" value="Login">
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="<?php echo base_url(); ?>assets/3/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/3/js/bootstrap.min.js"></script>
</body>
</html>
