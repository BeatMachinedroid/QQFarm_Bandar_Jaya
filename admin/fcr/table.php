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
                        <th>Nama Pakan</th>
                        <th>Total Ayam / kg</th>
                        <th>FCR</th>
                        <th>Indikasi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;

                    $sql = $koneksi->query("SELECT * from tb_kandang join tb_panen
                    on tb_kandang.id = tb_panen.fk_kandang
                    join tb_pakan_masuk on tb_panen.fk_pakan = tb_pakan_masuk.id
              ");

                    while ($data = $sql->fetch_assoc()) {
                        $total_berat = $data['jumlah_ayam'] * $data['berat_ekor'];
                        $fcr = $data['total_pakan'] / $total_berat;
                    ?>
                        <tr>

                            <td>
                                <?= $no++; ?>
                            </td>
                            <td>
                                <?= $data['nama_kandang']; ?>
                            </td>
                            <td>
                                <?= $data['tgl_ayam_masuk']; ?>
                            </td>
                            <td>
                                <?= $data['tgl']; ?>
                            </td>
                            <td>
                                <?= $data['total_pakan']; ?> Kg
                            </td>
                            <td>
                                <?=$data['jenis']; ?> Kg
                            </td>
                            <td>
                                <?= $total_berat ?> Kg
                            </td>
                            <td>
                                <?= substr($fcr, 0, 7) ?>
                            </td>
                            <td>
                                <?php 
                                    if($fcr >= 1.5 || $fcr <= 1.7 ){
                                        echo "<b>Efektif</b>";
                                    }else{
                                        echo "<b>Tidak Efektif</b>";
                                    }
                                ?>
                            </td>

                        </tr>
                    <?php
                    }
                    ?>

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