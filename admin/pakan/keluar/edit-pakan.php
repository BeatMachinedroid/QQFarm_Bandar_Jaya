<?php 
    if(isset($_GET['kode'])){
        $kode = base64_decode(($_GET['kode']));
        $sql_cek = "SELECT tb_pakan_keluar.fk_kandang, tb_kandang.nama_kandang, 
		tb_pakan_keluar.jumlah_kg, tb_pakan_keluar.tgl, jenis
		FROM tb_kandang JOIN tb_pakan_keluar 
		ON tb_pakan_keluar.fk_kandang = tb_kandang.id 
		WHERE tb_pakan_keluar.id = $kode";
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
					<input type="text" class="form-control" name="jumlah" placeholder="Jumlah" value="<?= $data_cek['jumlah_kg']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="jenis" placeholder="Jenis" required value="<?= $data_cek['jenis']; ?>">
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
				<a href="?page=data-pakan-keluar" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
	</form>
</div>

<?php

if (isset($_POST['Simpan'])) {
	// $kode     = $_POST['kode'];
	$jumlah = $_POST['jumlah'];
	$tanggal = $_POST['tanggal'];
    $jenis = $_POST['jenis'];

	$addstmt = $koneksi->prepare("UPDATE tb_pakan_keluar SET
             jumlah_kg = ?, jenis = ?, tgl = ? 
            where id = ?");
	$addstmt->bind_Param("issi", $jumlah, $jenis, $tanggal , $kode);

	if ($addstmt->execute()) {
		echo "<script>
                    Swal.fire({title: 'Update Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value){
                        window.location = 'index.php?page=data-pakan-keluar';
                        }
                    })</script>";
	} else {
		echo "<script>
                    Swal.fire({title: 'Update Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value){
                        window.location = 'index.php?page=add-pakan-keluar';
                        }
                    })</script>";
	}
}

     //selesai proses simpan data
