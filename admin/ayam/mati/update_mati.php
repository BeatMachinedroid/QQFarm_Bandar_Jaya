<?php 
    if(isset($_GET['kode'])){
        $kode = base64_decode(($_GET['kode']));
        $sql_cek = "SELECT tb_kandang.kode, tb_ayam_mati.fk_kandang,
        tb_ayam_mati.jumlah_mati, tb_ayam_mati.tgl, nama_kandang FROM 
        tb_ayam_mati JOIN tb_kandang ON tb_kandang.id = tb_ayam_mati.fk_kandang 
        WHERE tb_ayam_mati.id = '$kode'";
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
                    <select name="kode" class="form-control" disabled>
                        <option value="<?= $data_cek['fk_kandang']; ?>"><?= $data_cek['nama_kandang']; ?></option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jumlah mati / Ekor</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="jumlah" placeholder="Jumlah" value="<?= $data_cek['jumlah_mati']; ?>" required>
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
                <a href="?page=data-ayam-mati" title="Kembali" class="btn btn-secondary">Batal</a>
            </div>
    </form>
</div>

<?php

if (isset($_POST['Simpan'])) {
    // $kode   = $_POST['kode'];
    $jumlah  = $_POST['jumlah'];
    $tanggal    = $_POST['tanggal'];

        $addstmt = $koneksi->prepare("UPDATE tb_ayam_mati SET jumlah_mati = ?, tgl = ?
        where id = ?");
        $addstmt->bind_Param("iis", $kode, $jumlah, $tanggal);
        if ($addstmt->execute()) {
            echo "<script>
                Swal.fire({title: 'update Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {if (result.value){
                    window.location = 'index.php?page=data-ayam-mati';
                    }
                })</script>";
        } else {
            echo "<script>
                Swal.fire({title: 'update Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {if (result.value){
                    window.location = 'index.php?page=add-ayam-mati';
                    }
                })</script>";
        }

}
     //selesai proses simpan data
