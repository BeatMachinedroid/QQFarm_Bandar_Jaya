<div class="card card-warning">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kode Kandang</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="kode" placeholder="Kode Kandang" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Kandang</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="nama_kandang" placeholder="Nama Kandang" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kapasitas Kandang</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="kapasitas" placeholder="kapasitas" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Lokasi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="lokasi" placeholder="lokasi" required>
				</div>
			</div>

		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-kandang" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){	
    	$kode 	= $_POST['kode'];
    	$nama_kandang 	= $_POST['nama_kandang'];
    	$kapasitas 		= $_POST['kapasitas'];
    	$lokasi 	= $_POST['lokasi'];
        $addstmt = $koneksi->prepare("INSERT INTO tb_kandang (kode, nama_kandang, kapasitas, lokasi) Values (?,?,?,?)");
        $addstmt->bind_Param("ssss", $kode, $nama_kandang, $kapasitas, $lokasi);

    if ($addstmt->execute()) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-kandang';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-kandang';
          }
      })</script>";
    }
}
     //selesai proses simpan data
