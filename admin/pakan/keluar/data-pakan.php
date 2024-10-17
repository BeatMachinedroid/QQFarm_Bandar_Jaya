<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data Pakan Keluar
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div class="col-sm-6">
                <a href="?page=add-pakan-keluar" class="btn btn-warning">
                    <i class="fa fa-edit"></i> Tambah</a>
            </div>

            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kandang</th>
                        <th>tgl</th>
                        <th>jumlah</th>
                        <th>jenis</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    $sql = $koneksi->query("SELECT tb_kandang.nama_kandang ,
                    tb_kandang.kode, jumlah_kg, tgl, tb_pakan_keluar.id,
                    jenis FROM tb_kandang JOIN tb_pakan_keluar
                    ON tb_kandang.id = tb_pakan_keluar.fk_kandang");
                    while ($data = $sql->fetch_assoc()) {
                    ?>

                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <?php echo $data['kode']; ?>
                            </td>
                            <td>
                                <?php echo $data['tgl']; ?>
                            </td>
                            <td>
                                <?= $data['jumlah_kg']; ?> Kg
                            </td>
                            <td>
                                <?= $data['jenis']; ?>
                            </td>
                            
                            <td>
                                <a href="?page=update-pakan-keluar&kode=<?php echo base64_encode($data['id']); ?>" title="Edit data"
                                    class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="?page=del-pakan-keluar&kode=<?php echo base64_encode($data['id']); ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
                                    title="Hapus" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>
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
    <!-- /.card-body -->