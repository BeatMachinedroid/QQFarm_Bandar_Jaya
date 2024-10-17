<?php
  include "inc/koneksi.php";
   
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login | Sistem</title>
	<link rel="icon" href="dist/yunita/gambar.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<center>
					<a href="./login.php"> <img src="dist/yunita/gambar.png" width=250px /> </a>
					<br>
					
					<br>

						<div>	<h4> Ubah Password Pengguna  </h4></div>

					<br>

				</center>


				<form action="" method="post">
					
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="username" placeholder="Username Anda" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password" placeholder="Password Baru" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-info btn-block btn-flat" name="Ganti" title="Masuk Sistem">
								<b>Ubah Password</b>
							</button>
						</div>
				</form>

				</div>
			</div>
		</div>
		<!-- /.login-box -->

		<!-- jQuery -->
		<script src="plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE App -->
		<script src="dist/js/adminlte.min.js"></script>
		<!-- Alert -->
		<script src="plugins/alert.js"></script>

</body>

</html>

<?php

    if (isset($_POST['Ganti'])) {
	
	if (mysqli_query($koneksi,"UPDATE tb_pengguna reg SET password='$_POST[password]' where username='$_POST[username]' ")) 
	{
	
	?>	

	<script type="text/javascript">
		
		alert("password update successfully")


	</script>

	<?php
	
	}

}
    
?>
