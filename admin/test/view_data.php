<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM data_tahunan WHERE id_tahunan='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-warning">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<style type="text/css">
				div{
					.content : 250px;
				}
			</style>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Sistem</label>
				<div class="col-sm-1">
					<input type='text' class="form-control" id="id_tahunan" name="id_tahunan" value="<?php echo $data_cek['id_tahunan']; ?>"
					 readonly/>
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Perusahaan</label>
				<div class="col-sm-6">
					<input type='text' class="form-control" id="saham_nama" name="saham_nama" value="<?php echo $data_cek['saham_nama']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tahun | Periode</label>
				<div class="col-sm-3">
			<input type="text" class="form-control" id="tahun_data" name="tahun_data" value="<?php echo $data_cek['tahun_data']; ?>"
					 readonly>
				</div>
				<div class="col-sm-3">
			<input type="text" class="form-control" id="periode_data" name="periode_data" value="<?php echo $data_cek['periode_data']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 py-4 col-form-label">Gross Profit Margin</label>
				<div class="col-sm-3">
					<label class="col-sm-15 col-form-label">Laba kotor
					<input type="text" class="form-control" id="laba_kotor" name="laba_kotor" value="<?php echo $data_cek['laba_kotor']; ?>"
					 required>
					</label>
				</div>
				<div class="col-sm-3">
					<label class="col-sm-10 col-form-label">Penjualan Bersih
			<input type="text" class="form-control" id="Penjualan_bersih" name="penjualan_bersih" value="<?php echo $data_cek['penjualan_bersih']; ?>"
					 required>
					</label>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 py-4 col-form-label">Net Profit Margin</label>
				<div class="col-sm-3">
				<label class="col-sm-15 col-form-label">Laba Setelah Pajak
					<input type="text" class="form-control" id="laba_stelah_pajak" name="laba_stelah_pajak" value="<?php echo $data_cek['laba_stelah_pajak']; ?>"
					 required>
					 </label>
				</div>
				<div class="col-sm-3">
					<label class="col-sm-10 col-form-label">Penjualan Bersih
			<input type="text" class="form-control" id="Penjualan_bersih" name="penjualan_bersih" value="<?php echo $data_cek['penjualan_bersih']; ?>"
					 required>
					</label>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 py-4 col-form-label">Return On Asset</label>
				<div class="col-sm-3">
					<label class="col-sm-15 col-form-label">Laba Bersih Setelah Pajak
					<input type="text" class="form-control" id="laba_stelah_pajak" name="laba_stelah_pajak" value="<?php echo $data_cek['laba_stelah_pajak']; ?>"
					 required>
					</label>
				</div>
				<div class="col-sm-3">
					<label class="col-sm-10 col-form-label">Total Aset
			<input type="text" class="form-control" id="total_aset" name="total_aset" value="<?php echo $data_cek['total_aset']; ?>"
					 required>
					</label>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 py-4 col-form-label">Return On Equty</label>
				<div class="col-sm-3">
					<label class="col-sm-15 col-form-label">Laba Bersih Setelah Pajak
					<input type="text" class="form-control" id="laba_stelah_pajak" name="laba_stelah_pajak" value="<?php echo $data_cek['laba_stelah_pajak']; ?>"
					 required>
					</label>
				</div>
				<div class="col-sm-3">
					<label class="col-sm-10 col-form-label">Total Ekuitas
			<input type="text" class="form-control" id="total_ekuitas" name="total_ekuitas" value="<?php echo $data_cek['total_ekuitas']; ?>"
					 required>
					</label>
				</div>
			</div>
					
		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-test" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>



<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE data_tahunan SET 

    saham_nama	='".$_POST['saham_nama']."',
    tahun_data		='".$_POST['tahun_data']."',
    periode_data		='".$_POST['periode_data']."',
    laba_kotor		='".$_POST['laba_kotor']."',
    Penjualan_bersih		='".$_POST['penjualan_bersih']."',
    laba_stelah_pajak ='".$_POST['laba_stelah_pajak']."',
    total_aset	='".$_POST['total_aset']."',
    total_ekuitas 		='".$_POST['total_ekuitas']."'
    
    WHERE id_tahunan ='".$_POST['id_tahunan']."'";
    
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-test';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-test';
        }
      })</script>";
    }}
