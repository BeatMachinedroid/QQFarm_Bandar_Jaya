<div class="card card-warning">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kode Saham</label>
				<div class="col-sm-6">
					<select name="saham_nama" id="saham_nama" class="form-control">
						<option>- kode saham -</option>
						<option>INTP(Indocement Tunggal Prakasa Tbk)</option>
						<option>SMBR(Semen Baturaja Persero Tbk)</option>
						<option>SMCB(Solusi Bangun Indonesia  Tbk)</option>
						<option>SMGR(Semen Indonesia Persero Tbk)</option>
						<option>WSBP(Waskita Beton Precast Tbk)</option>
						<option>WTON(Wijaya Karya Beton Tbk)</option>		
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Data Tahun</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="tahun_data" name="tahun_data" placeholder="Tahun" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Periode</label>
				<div class="col-sm-6">
					<select name="periode_data" id="periode_data" class="form-control">
						<option>- periode -</option>
						<option>triwulan 1</option>
						<option>triwulan 2</option>
						<option>triwulan 3</option>
						
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Laba Kotor</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="laba_kotor" name="laba_kotor" placeholder="Isi Data" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Penjualan Bersih</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="Penjualan_bersih" name="penjualan_bersih" placeholder="Isi Data" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Laba Bersih Setelah Pajak</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="laba_stelah_pajak" name="laba_stelah_pajak" placeholder="Isi Data" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Total Aset</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="total_aset" name="total_aset" placeholder="Isi Data" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Total Ekuitas</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="total_ekuitas" name="total_ekuitas" placeholder="Isi Data" required>
				</div>
			</div>

		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-test" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    	
    	//$saham_nama	= $_POST['saham_nama'];
    	//$tahun_data	= $_POST['tahun_data'];	
    	//$periode_data	= $_POST['periode_data'];	
    	$laba_kotor 	= $_POST['laba_kotor'];
    	$penjualan_bersih 	= $_POST['penjualan_bersih'];
    	$laba_stelah_pajak 		= $_POST['laba_stelah_pajak'];
    	$total_aset 	= $_POST['total_aset'];
    	$total_ekuitas 	= $_POST['total_ekuitas'];
    	//$laba_kotor 	= $_POST['ket_data'];  	

    	$gross_profit_margin = $laba_kotor / $penjualan_bersih * 100;

    	$net_profit_margin  = $laba_stelah_pajak / $penjualan_bersih * 100;

    	$roa 		 = $laba_stelah_pajak / $total_aset * 100;

    	$roe 		 = $laba_stelah_pajak / $total_ekuitas * 100;

    	//echo 'hasil = '.$gross_profit_margin;

       

        $sql_simpan = "INSERT INTO data_tahunan (saham_nama, tahun_data, periode_data, laba_kotor, penjualan_bersih, laba_stelah_pajak, total_aset, total_ekuitas, gross_profit_margin, net_profit_margin, roa, roe, ket_data) VALUES (
            
			'".$_POST['saham_nama']."',
      '".$_POST['tahun_data']."',
      			'".$_POST['periode_data']."',
			'".$laba_kotor."',
            '".$penjualan_bersih."',
			'".$laba_stelah_pajak."',
			'".$total_aset."',
			'".$total_ekuitas."',
			'".$gross_profit_margin."',
			'".$net_profit_margin."',
			'".$roa."',
			'".$roe."',
			'Kosong')";
			

        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-test';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-test';
          }
      })</script>";
    }
}
     //selesai proses simpan data
