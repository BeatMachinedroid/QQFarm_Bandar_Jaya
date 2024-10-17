<?php 
    if(isset($_GET['kode'])){
        $kode = base64_decode(($_GET['kode']));
        $sql_cek = "SELECT tb_pakan_masuk.fk_kandang, tb_kandang.nama_kandang,  jenis, harga,
		tb_pakan_masuk.jumlah_kg, tb_pakan_masuk.tgl 
		FROM tb_kandang JOIN tb_pakan_masuk 
		ON tb_pakan_masuk.fk_kandang = tb_kandang.id 
		WHERE tb_pakan_masuk.id = $kode";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
    
?>
<div class="card card-warning">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kode Kandang</label>
				<div class="col-sm-6">
					<select name="kode" id="saham_nama" class="form-control" disabled>
						<option value="<?= $data_cek['fk_kandang']; ?>"><?= $data_cek['nama_kandang']; ?></option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah / Kg</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="jumlah" placeholder="Jumlah" required value="<?= $data_cek['jumlah_kg']; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="jenis" placeholder="Jenis Pakan" value="<?= $data_cek['jenis']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Harga</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="harga" placeholder="Harga Pakan per-kg" value="<?= $data_cek['harga']; ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" name="tanggal" required value="<?= $data_cek['tgl']; ?>">
				</div>
			</div>

			<div class="card-footer">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
				<a href="?page=data-pakan-masuk" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
	</form>
</div>

<?php

if (isset($_POST['Simpan'])) {
	$jumlah = $_POST['jumlah'];
	$tanggal = $_POST['tanggal'];
	$jenis = $_POST['jenis'];
	$harga = $_POST['harga'];

	$addstmt = $koneksi->prepare("UPDATE tb_pakan_masuk SET jumlah_kg = ?,harga = ?, jenis= ?, tgl = ? WHERE id = ?");
	$addstmt->bind_Param("iiiss", $kode, $jumlah, $harga , $jenis, $tanggal);

	if ($addstmt->execute()) {
		echo "<script>
                    Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value){
                        window.location = 'index.php?page=data-pakan-masuk';
                        }
                    })</script>";
	} else {
		echo "<script>
                    Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value){
                        window.location = 'index.php?page=add-pakan-masuk';
                        }
                    })</script>";
	}
}

     //selesai proses simpan data
