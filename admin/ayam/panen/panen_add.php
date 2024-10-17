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
					<select name="kode" id="saham_nama" class="form-control">
						<option>- kode kandang -</option>
						<?php
						$kndg = $koneksi->query("SELECT kode, id 
						from tb_kandang ");
						while ($kdg = $kndg->fetch_assoc()) {
						?>
							<option value="<?= $kdg['id']; ?>"><?= $kdg['kode']; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah Ayam</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="jumlah" placeholder="Jumlah" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Berat Per-Ekor</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="rata" placeholder="Rata - rata berat" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Harga Jual Per-Ekor</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="harga" placeholder="Harga" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" name="tanggal" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Ayam Masuk</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" name="tgl_masuk" required>
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
	$kode     = $_POST['kode'];
	$jumlah = $_POST['jumlah'];
	$tanggal = $_POST['tanggal'];
	$tgl_masuk = $_POST['tgl_masuk'];
	$rataber = $_POST['rata'];
	$harga = $_POST['harga'];

	$addstmt = $koneksi->prepare("INSERT INTO tb_panen 
            (fk_kandang, jumlah_ayam, harga_jual_ekor,tgl, tgl_ayam_masuk, berat_ekor) 
            Values (?,?,?,?,?,?)");
	$addstmt->bind_Param("iiisss", $kode, $jumlah, $harga, $tanggal, $tgl_masuk, $rataber);


	if ($addstmt->execute()) {
		echo "<script>
                        Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                        }).then((result) => {if (result.value){
                            window.location = 'index.php?page=data-panen';
                            }
                        })</script>";
	} else {
		echo "<script>
                        Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                        }).then((result) => {if (result.value){
                            window.location = 'index.php?page=add-panen';
                            }
                        })</script>";
	}
}


     //selesai proses simpan data