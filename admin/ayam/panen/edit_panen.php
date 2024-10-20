<?php 
    if(isset($_GET['kode'])){
        $kode = base64_decode(($_GET['kode']));
        $sql_cek = "SELECT * from tb_kandang JOIN tb_panen 
                    ON tb_kandang.id = tb_panen.fk_kandang 
		WHERE tb_panen.id = $kode";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
    
?>

<div class="card card-warning">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Edit Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kode Kandang</label>
				<div class="col-sm-6">
					<select name="kode" id="saham_nama" class="form-control" disabled>
						<option><?= $data_cek['nama_kandang']; ?></option>
						
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah / Kg</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="jumlah" placeholder="Jumlah" value="<?= $data_cek['jumlah_ayam']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah Ayam Masuk</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" name="jumlah_masuk" placeholder="Jumlah Ayam Masuk" value="<?= $data_cek['jumlah_masuk']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Rata-rata berat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="rata" placeholder="Rata - rata berat" value="<?= $data_cek['berat_ekor']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Harga Jual Per-Ekor</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="harga" placeholder="Harga" value="<?= $data_cek['harga_jual_ekor']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Harga Beli Per-Ekor</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" name="beli" placeholder="Harga Beli" value="<?= $data_cek['harga_beli']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Umur</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" name="umur" placeholder="Umur" value="<?= $data_cek['umur']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Total pakan</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" name="pakan" placeholder="Total Pakan Terpakai" value="<?= $data_cek['total_pakan']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">jenis Pakan</label>
				<div class="col-sm-6">
					<select name="jenis" class="form-control">
						<?php
						$kndg = $koneksi->query("SELECT jenis, id 
						from tb_pakan_masuk ");
						while ($kdg = $kndg->fetch_assoc()) {
						?>
							<option value="<?= $kdg['id']; ?>"><?= $kdg['jenis']; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" name="tanggal" required value="<?= $data_cek['tgl']; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Ayam Masuk</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" name="tgl_masuk" required value="<?= $data_cek['tgl_ayam_masuk']; ?>">
				</div>
			</div>

			<div class="card-footer">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
				<a href="?page=data-panen" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
	</form>
</div>

<?php

if (isset($_POST['Simpan'])) {
	// $kode     = $_POST['kode'];
	$jumlah = $_POST['jumlah'];
	$tanggal = $_POST['tanggal'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $rataber = $_POST['rata'];
	$harga = $_POST['harga'];
	$umur = $_POST['umur'];
	$pakan = $_POST['pakan'];
	$jenis = $_POST['jenis'];
	$harga_beli = $_POST['beli'];
	$jumlah_masuk = $_POST['jumlah_masuk'];


	$addstmt = $koneksi->prepare("UPDATE tb_panen SET jumlah_ayam = ?, tgl = ?, tgl_ayam_masuk = ?, berat_ekor = ?, harga_jual_ekor = ?,
	 fk_pakan = ?,total_pakan = ?, umur = ?, harga_beli = ?, jumlah_masuk = ? where id = ?");
	$addstmt->bind_Param("isssiiiiiii", $jumlah, $tanggal, $tgl_masuk, $rataber,$harga,$jenis,$pakan,$umur,$harga_beli,$jumlah_masuk, $kode);

    if ($addstmt->execute()) {
        echo "<script>
                    Swal.fire({title: 'Edit Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value){
                        window.location = 'index.php?page=data-panen';
                        }
                    })</script>";
    } else {
        echo "<script>
                    Swal.fire({title: 'Edit Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value){
                        window.location = 'index.php?page=add-panen';
                        }
                    })</script>";
    }
}

     //selesai proses simpan data
