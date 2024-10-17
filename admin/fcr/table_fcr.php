<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Table Analisis FCR
        </h3>
    </div>
    <form action="?page=hasil-fcr" method="post">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kode Kandang</label>
                <div class="col-sm-6">
                    <select name="kode" id="saham_nama" class="form-control">
                        <option>- kode kandang -</option>
                        <?php
                        $kndg = $koneksi->query("SELECT kode, id from tb_kandang");
                        while ($kdg = $kndg->fetch_assoc()) {
                        ?>
                            <option value="<?= $kdg['id']; ?>"><?= $kdg['kode']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Ayam Masuk</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="awal" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Panen</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="akhir" required>
                </div>
            </div>

            <div class="card-footer">
                <input type="submit" name="Simpan" value="Buat Table FCR" class="btn btn-info">
				<a href="index.php" title="Kembali" class="btn btn-secondary">Batal</a>
            </div>
    </form>
</div>

