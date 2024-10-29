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

                    $sql_cek = "SELECT *
                    FROM tb_kandang 
                    where tb_kandang.id = $kode";
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
                            Kapasitas
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            <?= $data_cek['kapasitas']; ?>
                        </td>
                    </tr>
                </tbody>
                </tfoot>
            </table>
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Pakan</th>
                        <th>Pakan (kg)</th>
                        <th>umur</th>
                        <th>Ayam Mati (Ekor)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;

                    $sql = $koneksi->query("SELECT tb_pakan_keluar.tgl,jenis, 
                    tb_pakan_keluar.jumlah_kg FROM tb_kandang JOIN tb_pakan_keluar 
                    ON tb_kandang.id = tb_pakan_keluar.fk_kandang 
                    where tb_pakan_keluar.tgl BETWEEN '$tgl_masuk' AND '$tgl_keluar'
                    and tb_kandang.id = $kode
              ");


                    ?>

                    <?php
                    while ($data = $sql->fetch_assoc()) {
                    ?>
                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>

                            <td>
                                <?php echo $data['tgl']; ?>
                            </td>
                            <td>
                                <?php echo $data['jenis']; ?>
                            </td>
                            <td colspan="3">
                                <?php echo $data['jumlah_kg']; ?> Kg
                            </td>

                        </tr>
                    <?php
                    }
                    ?>
                    <?php
                    $sql2 = $koneksi->query("SELECT jumlah_mati, tgl, umur from tb_ayam_mati
                    join tb_kandang on tb_kandang.id = tb_ayam_mati.fk_kandang  
                    where tb_ayam_mati.tgl BETWEEN '$tgl_masuk' AND '$tgl_keluar'
                    and tb_kandang.id = $kode");
                    while ($data2 = $sql2->fetch_assoc()) {
                    ?>
                        <tr>
                            <td>
                                <?= $no++; ?>
                            </td>
                            <td colspan="3">
                                <?= $data2['tgl']; ?>
                            </td>
                            <td >
                                <?= $data2['umur']; ?>
                            </td>
                            <td>
                                <?= $data2['jumlah_mati']; ?> Kg
                            </td>
                        </tr>
                    <?php } ?>



                </tbody>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<!-- /.card-body -->