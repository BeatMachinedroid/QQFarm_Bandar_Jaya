<?php 
    if(isset($_GET['kode'])){
        $kode = base64_decode(($_GET['kode']));
        $sql_cek = "SELECT tb_kandang.nama_kandang, tb_ayam_masuk.* FROM tb_kandang JOIN tb_ayam_masuk ON tb_kandang.id = tb_ayam_masuk.fk_kandang WHERE tb_ayam_masuk.id = '$kode'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
    
?>
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Update Data
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kode Kandang</label>
                <div class="col-sm-6">
                    <select name="kode" id="saham_nama" class="form-control">
                        <?php
                        $kandang = $data_cek['fk_kandang'];
                        $kndg = $koneksi->query("SELECT nama_kandang, id from tb_kandang where id = '$kandang'");
                        while ($kdg = $kndg->fetch_assoc()) {
                        ?>
                            <option value="<?= $kdg['id']; ?>"><?= $kdg['nama_kandang']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jumlah / Ekor</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="jumlah" placeholder="Jumlah" required value="<?= $data_cek['jumlah']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="tanggal" required value="<?= $data_cek['tgl']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Rata-rata Berat / Ekor </label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="berat" placeholder="Berat" max="45" min="34" required value="<?= $data_cek['rata_berat']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Harga Per Ekor </label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="harga" placeholder="Harga Per-Ekor" required value="<?= $data_cek['harga_ekor']; ?>">
                </div>
            </div>

            <div class="card-footer">
                <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
                <a href="?page=data-ayam-masuk" title="Kembali" class="btn btn-secondary">Batal</a>
            </div>
    </form>
</div>

<?php

if (isset($_POST['Simpan'])) {
    // $kode     = $_POST['kode'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];
    $berat     = $_POST['berat'];
    $harga     = $_POST['harga'];

    if ($jumlah >= 1000 && $berat >= 36 || $berat <= 40) {
        $addstmt = $koneksi->prepare("UPDATE tb_ayam_masuk set
            rata_berat = ?, jumlah = ?, tgl = ?, harga_ekor = ? where id = ?");
        $addstmt->bind_Param("iisii", $berat, $jumlah, $tanggal, $harga, $kode);
        if ($addstmt->execute()) {
            echo "<script>
                Swal.fire({title: 'Update Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {if (result.value){
                    window.location = 'index.php?page=data-ayam-masuk';
                    }
                })</script>";
        } else {
            echo "<script>
                Swal.fire({title: 'Update Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {if (result.value){
                    window.location = 'index.php?page=data-ayam-masuk';
                    }
                })</script>";
        }
    }
}
     //selesai proses simpan data
