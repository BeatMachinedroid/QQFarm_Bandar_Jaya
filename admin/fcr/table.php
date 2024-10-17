<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Analisis FCR
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <a href="?page=table-fcr" class="btn btn-warning">
                    <i class="fa fa-hand-point-left"></i> Kembali</a>
            </div>
            <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kandang</th>
                        <th>Tanggal Ayam Masuk</th>
                        <th>Tanggal Panen</th>
                        <th>Total Pakan / Kg</th>
                        <th>Total Ayam / kg</th>
                        <th>FCR</th>
                    </tr>
                </thead>
                <tbody>
                <tr>

                    <?php
                    $no = 1;
                    $tgl_masuk = $_POST['awal'];
                    $tgl_keluar = $_POST['akhir'];
                    $kode = $_POST['kode'];
                    $sql = $koneksi->query("SELECT nama_kandang, 
                    tb_ayam_masuk.tgl as tgl_masuk, tb_pakan_keluar.tgl, tb_panen.tgl as tgl_panen,
                    SUM(tb_pakan_keluar.jumlah_kg) AS total_pakan, 
                    SUM(tb_pakan_keluar.jumlah_kg) * tb_pakan_masuk.harga AS total_pengeluaran_pakan,
                    tb_panen.jumlah_ayam * tb_panen.berat_ekor AS berat_ayam 
                    FROM tb_kandang 
                    JOIN tb_pakan_masuk ON tb_kandang.id = tb_pakan_masuk.fk_kandang 
                    JOIN tb_pakan_keluar ON tb_kandang.id = tb_pakan_keluar.fk_kandang 
                    JOIN tb_ayam_masuk ON tb_kandang.id = tb_ayam_masuk.fk_kandang 
                    JOIN tb_panen ON tb_kandang.id = tb_panen.fk_kandang
                    WHERE 
                     tb_pakan_keluar.tgl BETWEEN '$tgl_masuk' AND '$tgl_keluar'
                    
                    AND tb_kandang.id = '$kode'
                    GROUP BY tb_kandang.nama_kandang;
              ");

                    while ($data = $sql->fetch_assoc()) {
                        $fcr = $data['total_pakan'] / $data['berat_ayam'];
                    ?>

                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <?php echo $data['nama_kandang']; ?>
                            </td>
                            <td>
                                <?php echo $data['tgl_masuk']; ?>
                            </td>
                            <td>
                                <?php echo $data['tgl_panen']; ?>
                            </td>
                            <td>
                                <?php echo $data['total_pakan']; ?> Kg
                            </td>
                            <td>
                                <?= $data['berat_ayam']; ?> Kg
                            </td>
                            <td>
                                <?= substr($fcr, 0, 7) ?>
                            </td>
                            
                            <?php
                    }
                    ?>
                    </tr>

                </tbody>
                </tfoot>
            </table>
        </div>
        <p>
            <b>Keterangan :</b><br>
            - FCR : Feed Conversion Ratio (Konversi Pakan)<br>
            - Total Pakan : Total Pakan yang diberikan pada periode tersebut<br>
            - Berat Ayam : Berat Ayam pada saat panen<br>
            - Standar Fcr : 1.5 - 1.7 <br>
            <b>efektif</b>, jika tidak melewati standar FCR maka pakan efektif terhadap perkembangan ayam.<br>
            <b>tidak efektif</b>, jika melewati standar FCR maka pakan terhadap perkembangan ayam.
        </p>
    </div>
</div>

<!-- /.card-body -->