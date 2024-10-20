<?php

  $sql = $koneksi->query("SELECT COUNT(id) as totalper from tb_kandang");
  while ($data= $sql->fetch_assoc()) {
    $totalper=$data['totalper'];
  }

  $sql = $koneksi->query("SELECT COUNT(id) as dataada from tb_panen");
  while ($data= $sql->fetch_assoc()) {
    $dataada=$data['dataada'];
  }

  $sql = $koneksi->query("SELECT COUNT(id) as jumlah_login from tb_pengguna");
  while ($data= $sql->fetch_assoc()) {
    $jumlah_login=$data['jumlah_login'];
  
  }




?>

<div class="row">
	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-primary">
			<div class="inner">
				<h3>
					<?php echo $totalper;  ?>
				</h3>

				<p>Data Kandang yang diinputkan</p>
			</div>
			<div class="icon">
				<i class="fas fa-calendar"></i>
			</div>
			<a href="index.php?page=data-kandang" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-4 col-8">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>
					<?php echo $dataada;  ?>
				</h3>

				<p>Data rasio panen yang diinputkan</p>
			</div>
			<div class="icon">
				<i class="fas fa-hourglass-half"></i>
			</div>
			<a href="index.php?page=data-panen" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>
					<?php echo $jumlah_login;  ?>
				</h3>

				<p>Jumlah Pengguna</p>
			</div>
			<div class="icon">
				<i class="fas fa-clipboard"></i>
			</div>
			<a href="index.php?page=data-pengguna" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-12">
	<?php
		echo '<canvas id="myChart" height="85"></canvas>';
	?>
	</div>
	</div>

	