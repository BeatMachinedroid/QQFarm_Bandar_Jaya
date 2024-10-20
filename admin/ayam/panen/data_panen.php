<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data Panen
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <a href="?page=add-panen" class="btn btn-warning">
                    <i class="fa fa-edit"></i> Tambah Data</a>
            </div>
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-capitalize">
                        <th>No</th>
                        <th>kandang</th>
                        <th>tanggal masuk</th>
                        <th>tanggal panen</th>
                        <th>umur</th>
                        <th>ayam / ekor</th>
                        <th>rata berat panen</th>
                        <th>harga jual</th>
                        <th>total pakan / kg</th>
                        <th>jenis pakan</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    $sql = $koneksi->query("SELECT *, tb_panen.id as id_panen from tb_kandang JOIN tb_panen 
                    ON tb_kandang.id = tb_panen.fk_kandang
                    join tb_pakan_masuk on tb_pakan_masuk.id = tb_panen.fk_pakan");
                    while ($data = $sql->fetch_assoc()) {
                    ?>

                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <?php echo $data['nama_kandang']; ?>
                            </td>
                            <td>
                                <?php echo $data['tgl_ayam_masuk']; ?>
                            </td>
                            <td>
                                <?php echo $data['tgl']; ?>
                            </td>
                            <td>
                                <?php echo $data['umur']; ?>
                            </td>
                            <td>
                                <?php echo $data['jumlah_ayam']; ?> Ekor
                            </td>
        
                            <td>
                                <?php echo $data['berat_ekor']; ?> Kg
                            </td>
                            <td>
                                Rp. <?php echo $data['harga_jual_ekor']; ?>
                            </td>
                            <td>
                                <?php echo $data['total_pakan']; ?> Kg
                            </td>
                            <td>
                                <?php echo $data['jenis']; ?>
                            </td>
                            <td>
                                <a href="?page=edit-panen&kode=<?php echo base64_encode($data['id_panen']); ?>" title="Edit data"
                                    class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="?page=del-panen&kode=<?php echo base64_encode($data['id_panen']); ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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