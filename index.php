<?php
//Mulai Sesion
session_start();
if (isset($_SESSION["ses_username"]) == "") {
	header("location: login.php");
} else {
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_level = $_SESSION["ses_level"];
}

//KONEKSI DB
include "inc/koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SISTEM INFORMASI AKUNTANSI</title>
	<link rel="icon" href="dist/yasinta/yasinta.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
</head>

<body class="hold-transition sidebar-mini ">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-red navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars text-black"></i>
					</a>
				</li>

			</ul>

			<!-- SEARCH FORM -->
			<ul class="navbar-nav ml-auto">

				<li class="nav-item d-none d-sm-inline-block">
					<a href="index.php" class="nav-link">
						<font color="black">
							<b>SISTEM INFORMASI AKUNTANSI QQ FARM BANDAR JAYA</b>
						</font>
					</a>
				</li>
			</ul>

		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index.php" class="brand-link bg-red">
				<img src="dist/yasinta/yasinta.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
				<font color="black">
					<span class="brand-text font-weight-bold">Menu</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-2 pb-2 mb-2 d-flex">
					<div class="image">
						<img src="dist/yasinta is.jpg">
					</div>
					<div class="info">
						<a href="index.php" class="d-block">
							<?php echo $data_nama; ?>
						</a>
						<span class="badge badge-success">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<!-- Level  -->
						<?php
						if ($data_level == "Administrator") {
						?>
							<li class="nav-header">Interface</li>

							<li class="nav-item">
								<a href="index.php" class="nav-link">
									<i class="nav-icon fas fa-home"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="fas fa-fw fa-briefcase"></i>
									<p>
										pengkelolaan Data
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">

									<li class="nav-item">
										<a href="?page=data-kandang" class="nav-link">
											<i class="nav-icon far fa-circle text-orange"></i>
											<p>kandang</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-ayam-masuk" class="nav-link">
											<i class="nav-icon far fa-circle text-blue"></i>
											<p>ayam masuk</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-ayam-mati" class="nav-link">
											<i class="nav-icon far fa-circle text-red"></i>
											<p>ayam mati</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-pakan-masuk" class="nav-link">
											<i class="nav-icon far fa-circle text-white"></i>
											<p>Pakan masuk</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-pakan-keluar" class="nav-link">
											<i class="nav-icon far fa-circle text-white"></i>
											<p>Pakan keluar</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="?page=data-panen" class="nav-link">
											<i class="nav-icon far fa-circle text-green"></i>
											<p>Panen</p>
										</a>
									</li>


								</ul>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-book-open"></i>
									<p>
										Laporan Panen
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=table-fcr" class="nav-link">
											<i class="nav-icon far fa-circle text-info"></i>
											<p>Tabel Analisis FCR</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=cari-laporan-harian" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Laporan Harian</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=cari-hasil" class="nav-link">
											<i class="nav-icon far fa-circle text-orange"></i>
											<p>Cetak Hasil Panen</p>
										</a>
									</li>

								</ul>
							</li>


							<li class="nav-item">
								<a href="?page=data-pengguna" class="nav-link">
									<i class="nav-icon fas fa-users-cog"></i>
									<p>
										Pengguna Sistem
									</p>
								</a>
							</li>

						<?php
						}
						?>

						<li class="nav-item">
							<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
								<i class="nav-icon fas fa-hand-point-right"></i>
								<p>
									Logout
								</p>
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
			<section class="content-header">

			</section>

			<!-- Main content -->
			<section class="content">
				<!-- /. WEB DINAMIS DISINI ############################################################################### -->
				<div class="container-fluid">

					<?php
					if (isset($_GET['page'])) {
						$hal = $_GET['page'];

						switch ($hal) {

								// 	Pengguna
							case 'data-pengguna':
								include "admin/pengguna/data_pengguna.php";
								break;
							case 'add-pengguna':
								include "admin/pengguna/add_pengguna.php";
								break;
							case 'edit-pengguna':
								include "admin/pengguna/edit_pengguna.php";
								break;
							case 'del-pengguna':
								include "admin/pengguna/del_pengguna.php";
								break;

								//data kandang
							case 'add-kandang':
								include "admin/kandang/add_kandang.php";
								break;
							case 'data-kandang':
								include "admin/kandang/data_kandang.php";
								break;
							case 'edit-kandang':
								include "admin/kandang/edit_kandang.php";
								break;
							case 'del-kandang':
								include "admin/kandang/del_kandang.php";
								break;

								//data ayam masuk
							case 'add-ayam-masuk':
								include "admin/ayam/masuk/masuk_add.php";
								break;
							case 'data-ayam-masuk':
								include "admin/ayam/masuk/data_masuk.php";
								break;
							case 'edit-masuk':
								include "admin/ayam/masuk/update_masuk.php";
								break;
							case 'del-masuk':
								include "admin/ayam/masuk/del_masuk.php";
								break;

								//data ayam mati
							case 'add-ayam-mati':
								include "admin/ayam/mati/mati_add.php";
								break;
							case 'data-ayam-mati':
								include "admin/ayam/mati/data_mati.php";
								break;
							case 'edit-mati':
								include "admin/ayam/mati/update_mati.php";
								break;
							case 'del-mati':
								include "admin/ayam/mati/del_mati.php";
								break;

								//data pakan masuk
							case 'add-pakan-masuk':
								include "admin/pakan/masuk/add-pakan.php";
								break;
							case 'data-pakan-masuk':
								include "admin/pakan/masuk/data-pakan.php";
								break;
							case 'update-pakan-masuk':
								include "admin/pakan/masuk/edit-pakan.php";
								break;
							case 'del-pakan-masuk':
								include "admin/pakan/masuk/del-pakan.php";
								break;

								//data pakan keluar
							case 'add-pakan-keluar':
								include "admin/pakan/keluar/add-pakan.php";
								break;
							case 'data-pakan-keluar':
								include "admin/pakan/keluar/data-pakan.php";
								break;
							case 'update-pakan-keluar':
								include "admin/pakan/keluar/edit-pakan.php";
								break;
							case 'del-pakan-keluar':
								include "admin/pakan/keluar/del-pakan.php";
								break;

								//data panen
							case 'add-panen':
								include "admin/ayam/panen/panen_add.php";
								break;
							case 'data-panen':
								include "admin/ayam/panen/data_panen.php";
								break;
							case 'edit-panen':
								include "admin/ayam/panen/edit_panen.php";
								break;
							case 'del-panen':
								include "admin/ayam/panen/del_panen.php";
								break;

								//data panen
							case 'table-fcr':
								include "admin/fcr/table_fcr.php";
								break;
							case 'hasil-fcr':
								include "admin/fcr/table.php";
								break;

								//laporan
							case 'cari-laporan-harian':
								include "admin/Laporan/cari_laporan.php";
								break;
							case 'laporan-harian':
								include "admin/Laporan/laporan.php";
								break;
								
								//Cetak hasil
							case 'cari-hasil':
								include "admin/cetak_hasil/cari_data.php";
								break;
							case 'cetak-hasil':
								include "admin/cetak_hasil/cetak_hasil.php";
								break;
						}
					} else {
						// Auto Halaman Home Pengguna
						if ($data_level == "Administrator") {
							include "home/admin.php";
						}
					}
					?>

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer navbar-expand navbar-red">
			<div class="float-right d-none d-sm-inline-block">
				<font color="black">
			</div>
			<div class="copyright text-center my-auto">
				<strong> Copyright @2023 <a href="https://www.instagram.com">QQfarm</a></strong> All right reserved.
		</footer>


		<!-- Control Sidebar -->
		<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->
	<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<?php
	$sql = "SELECT nama_kandang, MONTH(tgl) as bln, MONTHNAME(tgl) AS bulan, SUM(jumlah_ayam) AS total_panen FROM tb_panen join tb_kandang on tb_kandang.id = tb_panen.fk_kandang GROUP BY bln";
	$result = mysqli_query($koneksi, $sql);
	$labels = [];
	$data = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$labels[] = $row['bulan'];
		$data[] = $row['total_panen'];
		$kandang[] = $row['nama_kandang'];
	}
	?>
	<script>
		var ctx = document.getElementById('myChart').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: <?php echo json_encode($labels); ?>,
				datasets: [{
					label: <?php echo json_encode($kandang) ?>,
					data: <?php echo json_encode($data); ?>,
					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255, 99, 132, 1)',
					borderWidth: 1
				}]
			},
			options: {
				legend: {
					display: true,
					position: 'right'
				},
				scales: {
					xAxes: [{
						scaleLabel: {
							display: true,
							labelString: 'Bulan'
						}
					}],
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
				
			}
		});
	</script>
	<script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>
<script>
  function beforePrint() {
    document.getElementById("printButton").style.display = "none";
    document.getElementById("back").style.display = "none";
  }

  window.addEventListener('beforeprint', beforePrint);
</script>
<script>
function printDocument() {
  window.print();
}
</script>
</body>

</html>