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
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kandang</th>
                        <th>Tanggal Check-In</th>
                        <th>Tanggal Panen</th>
                        <th>Pakan Terpakai</th>
                        <th>Nama Pakan</th>
                        <th>Total biaya pakan</th>
                        <th>Berat Ayam</th>
                        <th>Total Harga Ayam</th>
                        <th>Harga Pokok Panen</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;

                    $sql = $koneksi->query("SELECT * from tb_kandang 
                        join tb_panen on tb_kandang.id = tb_panen.fk_kandang
                        join tb_pakan_masuk on tb_panen.fk_pakan = tb_pakan_masuk.id
                        
                    ");

                    while ($data = $sql->fetch_assoc()) {
                        $total_biaya_pakan = $data['total_pakan'] * $data['harga'];
                        $berat_ayam = $data['jumlah_ayam'] * $data['berat_ekor'];
                        $total_beli_ayam = $data['jumlah_masuk'] * $data['harga_beli'];
                        $total_panen = $berat_ayam * $data['harga_jual_ekor'];
                        $total = $total_panen - $total_beli_ayam - $total_biaya_pakan;

                        $harga_pokok = $total_panen - $total_beli_ayam - $total_biaya_pakan;
                        $formatted_pakan = number_format($total_biaya_pakan, 0, ',', '.');
                        $formatted_berat = number_format($berat_ayam, 0, ',', '.');
                        $formatted_total_ayam = number_format($total_beli_ayam, 0, ',', '.');
                        $formatted_harga_pokok = number_format($total, 0, ',', '.');
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <?= $data['nama_kandang'] ?>
                            </td>
                            <td>
                                <?= $data['tgl_ayam_masuk'] ?>
                            </td>
                            <td>
                                <?= $data['tgl']; ?>
                            </td>
                            <td>
                                <?= $data['total_pakan'] ?>Kg
                            </td>
                            <td>
                                <?= $data['jenis'] ?>
                            </td>
                            <td>
                                Rp.<?= $formatted_pakan ?>
                            </td>
                            <td>
                                <?= $formatted_berat; ?>kg
                            </td>
                            <td>
                                Rp.<?= $formatted_total_ayam ?>
                            </td>
                            <td>
                                Rp.<?= $formatted_harga_pokok ?>
                            </td>

                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<!-- /.card-body -->