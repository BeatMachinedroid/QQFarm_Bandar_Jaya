<?php 
    if(isset($_GET['kode'])){
        $kode = base64_decode(($_GET['kode']));
        $sql_cek = "SELECT * FROM tb_kandang WHERE id= $kode";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
    
?>
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
					<input type="text" class="form-control" name="kode" placeholder="Kode Kandang" value="<?= $data_cek['kode'] ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Kandang</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="nama_kandang" placeholder="Nama Kandang" value="<?= $data_cek['nama_kandang']; ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kapasitas Kandang</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="kapasitas" placeholder="kapasitas"  value="<?= $data_cek['kapasitas']; ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Lokasi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="lokasi" placeholder="lokasi"  value="<?= $data_cek['lokasi']; ?>" required>
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
		$kknd = $_POST['kode'];
    	$nama_kandang 	= $_POST['nama_kandang'];
    	$kapasitas 		= $_POST['kapasitas'];
    	$lokasi 	= $_POST['lokasi'];
		
        $stmtedit = $koneksi->prepare("UPDATE tb_kandang set kode = ?, nama_kandang = ?, kapasitas = ?, lokasi = ? where id = ?");
        $stmtedit->bind_Param("ssssi", $kknd, $nama_kandang, $kapasitas, $lokasi, $kode);

    if ($stmtedit->execute()) {
      echo "<script>
      Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-kandang';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Data Gagal Diubah',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-kandang';
          }
      })</script>";
    }
}
     //selesai proses simpan data
