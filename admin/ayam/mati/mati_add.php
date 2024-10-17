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
                    <select name="kode" class="form-control">
                        <option>- kode kandang -</option>
                        <?php
                        $kndg = $koneksi->query("SELECT * FROM tb_kandang");
                        while ($kdg = $kndg->fetch_assoc()) {
                        ?>
                            <option value="<?=$kdg['id'];?>"><?=$kdg['kode'];?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jumlah mati / Ekor</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="jumlah" placeholder="Jumlah" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="tanggal" required>
                </div>
            </div>

            <div class="card-footer">
                <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
                <a href="?page=data-ayam-mati" title="Kembali" class="btn btn-secondary">Batal</a>
            </div>
    </form>
</div>

<?php

if (isset($_POST['Simpan'])) {
    $kode   = $_POST['kode'];
    $jumlah  = $_POST['jumlah'];
    $tanggal    = $_POST['tanggal'];

        $addstmt = $koneksi->prepare("INSERT INTO tb_ayam_mati 
            (fk_kandang, jumlah_mati, tgl)
            Values (?,?,?)");
        $addstmt->bind_Param("iis", $kode, $jumlah, $tanggal);
        if ($addstmt->execute()) {
            echo "<script>
                Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {if (result.value){
                    window.location = 'index.php?page=data-ayam-mati';
                    }
                })</script>";
        } else {
            echo "<script>
                Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {if (result.value){
                    window.location = 'index.php?page=add-ayam-mati';
                    }
                })</script>";
        }

}
     //selesai proses simpan data
