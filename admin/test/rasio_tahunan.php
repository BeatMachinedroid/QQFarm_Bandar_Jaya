<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from data_tahunan where id_tahunan ='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<tbody>
           
             <?php 
				if ($data_cek['gross_profit_margin'] >= 30) {	
						$hasilgpm = "Sangat Sehat";
				}elseif ($data_cek['gross_profit_margin'] >= 25 || $data_cek['net_profit_margin'] < 30) {
						$hasilgpm = "Sehat";
				}elseif ($data_cek['gross_profit_margin'] >= 20 || $data_cek['gross_profit_margin'] < 25) {
						$hasilgpm = "cukup Sehat";
				}else {
						$hasilgpm = "Tidak Sehat";
					}
			?>
			<?php 
				if ($data_cek['net_profit_margin'] >= 20) {	
						$hasilnpm = "Sangat Sehat";
				}elseif ($data_cek['net_profit_margin'] >= 15 || $data_cek['net_profit_margin'] < 20) {
						$hasilnpm = "Sehat";
				}elseif ($data_cek['net_profit_margin'] >= 10 || $data_cek['net_profit_margin'] < 15) {
						$hasilnpm = "Cukup Sehat";
				}else {
						$hasilnpm = "Tidak Sehat";
					}
			?>
			<?php 
				if ($data_cek['roa'] >= 5) {	
						$hasilroa = "Sangat Sehat";
				}elseif ($data_cek['roa'] >= 3 || $data_cek['roa'] < 5) {
						$hasilroa = "Sehat";
				}elseif ($data_cek['roa'] >= 1 || $data_cek['roa'] < 3) {
						$hasilroa = "cukup Sehat";
				}else {
						$hasilroa = "Tidak Sehat";
					}
			?>
			<?php 
				if ($data_cek['roe'] >= 20) {	
						$hasilroe = "Sangat Sehat";
				}elseif ($data_cek['roe'] >= 15 || $data_cek['roe'] < 20) {
						$hasilroe = "Sehat";
				}elseif ($data_cek['roe'] >= 10 || $data_cek['roe'] < 15) {
						$hasilroe = "Cukup Sehat";
				}else {
						$hasilroe = "Tidak Sehat";
					}
			?>


<div class="card card-warning">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-user"></i> Detail Data Rasio Profitabilitas</h3>
		</h3>
		<div class="card-tools">
		</div>
	</div>
	<h3 class="card-title">
			<center><p><?php echo $data_cek['saham_nama']; ?>
			<br><?php echo $data_cek['periode_data']; ?>
			<br><?php echo $data_cek['tahun_data']; ?>
	</center>
 	<center>
	<table class="table">
	<table border="1" cellspacing="0" style="width: 90%">
			<thead>
				<tr>
					<th bgcolor="beige" rowspan="2">Gross Profit Margin (GPM)</th>
					<th bgcolor="beige">Laba Kotor</th>
					<th bgcolor="beige">Penjualan Bersih</th>
					<th bgcolor="beige">Hasil</th>					
				</tr>
				<tr>
					<td><?php echo $data_cek['laba_kotor']; ?></td>
					<td><?php echo $data_cek['penjualan_bersih']; ?></td>
					<td><?php echo $data_cek['gross_profit_margin']; ?>% <b>(<?php echo $hasilgpm ; ?>)</b></td>
				</tr>
				<tr>
					<th bgcolor="beige" rowspan="2">Net Profit Margin (NPM)</th>
					<th bgcolor="beige">Laba Setelah Pajak</th>
					<th bgcolor="beige">Penjualan Bersih</th>
					<th bgcolor="beige">Hasil</th>
				</tr>
				<tr>
					<td><?php echo $data_cek['laba_stelah_pajak']; ?></td>
					<td><?php echo $data_cek['penjualan_bersih']; ?></td>
					<td><?php echo $data_cek['net_profit_margin']; ?>% <b>(<?php echo $hasilnpm ; ?>)</b></td>
				</tr>
				<tr>
					<th bgcolor="beige" rowspan="2">Return On Asset (ROA)</th>
					<th bgcolor="beige">Laba Bersih Setelah Pajak</th>
					<th bgcolor="beige">Total Aset</th>
					<th bgcolor="beige">Hasil</th>
				</tr>
				<tr>
					<td><?php echo $data_cek['laba_stelah_pajak']; ?></td>
					<td><?php echo $data_cek['total_aset']; ?></td>
					<td><?php echo $data_cek['roa']; ?>% <b>(<?php echo $hasilroa ; ?>)</b></td>
				</tr>
				<tr>
					<th bgcolor="beige" rowspan="2">Return On Equty (ROE)</th>
					<th bgcolor="beige">Laba Bersih Setelah Pajak</th>
					<th bgcolor="beige">Total Ekuitas</th>
					<th bgcolor="beige">Hasil</th>
				</tr>
				<tr>
					<td><?php echo $data_cek['laba_stelah_pajak']; ?></td>
					<td><?php echo $data_cek['total_ekuitas']; ?></td>
					<td><?php echo $data_cek['roe']; ?>% <b>(<?php echo $hasilroe ; ?>)</b></td>
				</tr>
			</td>
			</thead>
		</table>
		</center>
	<center>
	<thead>
		<style type="text/css">
   .left    { text-align: left;}
   .right   { text-align: right;}
			</style>
</head>
<body>
	
		<div class="card-footer">
			<a href="?page=data-test" class="btn btn-success">Kembali</a>
		</div>
	</div>
</div>
