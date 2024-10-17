<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Laporan Harian
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <a href="?page=cari-laporan-harian" class="btn btn-warning" id="back">
                    <i class="fa fa-hand-point-left"></i> Kembali</a>
                <a href="?page=print-laporan" class="btn btn-warning " id="printButton" onclick="printDocument()">
                    <i class="fa fa-download"></i> Pdf</a>
            </div>
            <br>
            <table cellspacing="2" border="0" cellpadding="5">
                <tbody>
                    <?php
                    $tgl_masuk = $_POST['awal'];
                    $tgl_keluar = $_POST['akhir'];
                    $kode = $_POST['kode'];

                    $sql_cek = "SELECT tb_kandang.nama_kandang, tb_ayam_masuk.jumlah 
                    FROM tb_kandang JOIN tb_ayam_masuk 
                    ON tb_kandang.id = tb_ayam_masuk.fk_kandang where tb_ayam_masuk.tgl BETWEEN '$tgl_masuk' AND '$tgl_keluar'
                    and tb_kandang.id = $kode";
                    $query_cek = mysqli_query($koneksi, $sql_cek);
                    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);

                    ?>
                    <tr>
                        <td>
                            Nama Kandang
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            <?= $data_cek['nama_kandang']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Jumlah Ayam Masuk
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            <?= $data_cek['jumlah']; ?> Ekor
                        </td>
                    </tr>
                </tbody>
                </tfoot>
            </table>
            <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Tanggal Check-In</th>
                        <th>Tanggal Panen</th>
                        <th>Pakan Terpakai</th>
                        <th>Total biaya pakan</th>
                        <th>Berat Ayam</th>
                        <th>Total Beli Ayam</th>
                        <th>Harga Pokok Panen</th>
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
                    tb_ayam_masuk.tgl as tgl_masuk, tb_ayam_masuk.jumlah as ayam_awal, tb_ayam_masuk.harga_ekor as harga_beli,
                    tb_pakan_keluar.tgl, tb_panen.tgl as tgl_panen,
                    SUM(tb_pakan_keluar.jumlah_kg) AS total_pakan, 
                    SUM(tb_pakan_keluar.jumlah_kg) * tb_pakan_masuk.harga AS total_pengeluaran_pakan,
                    tb_panen.jumlah_ayam * tb_panen.berat_ekor AS berat_ayam ,
                    tb_panen.harga_jual_ekor as harga_jual,
                    tb_pakan_masuk.harga as harga_pakan
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
                            $total_biaya_pakan = $data['total_pakan'] * $data['harga_pakan'];
                            $total_beli_ayam = $data['ayam_awal'] * $data['harga_beli'];
                            $total_panen = $data['berat_ayam'] * $data['harga_jual'];
                            $harga_pokok = $total_panen - $total_beli_ayam - $total_biaya_pakan;
                        ?>

                            <td>
                                <?= $data['tgl_masuk'] ?>
                            </td>
                            <td>
                                <?= $data['tgl_panen'] ?>
                            </td>
                            <td>
                                <?= $data['total_pakan']; ?> Kg
                            </td>
                            <td>
                                Rp. <?= $total_biaya_pakan ?>
                            </td>
                            <td>
                                <?= $data['berat_ayam']; ?> Kg
                            </td>
                            <td>
                                Rp. <?= $total_beli_ayam; ?>
                            </td>
                            <td>
                                Rp. <?= $harga_pokok ?>
                            </td>

                        <?php
                        }
                        ?>
                    </tr>

                </tbody>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<!-- /.card-body -->