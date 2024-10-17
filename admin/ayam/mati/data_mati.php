<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data Ayam Mati
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div>

                <a href="?page=add-ayam-mati" class="btn btn-warning">
                    <i class="fa fa-edit"></i> Tambah Data</a>
            </div>
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>tgl masuk</th> 
                        <th>nama kandang</th>
                        <th>jumlah mati</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    $sql = $koneksi->query("SELECT tb_ayam_mati.id, jumlah_mati, 
                    nama_kandang, tgl
                    FROM tb_ayam_mati JOIN tb_kandang  
                    ON tb_kandang.id = tb_ayam_mati.fk_kandang 
                    ");
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
                                <?php echo $data['nama_kandang']; ?>
                            </td>
                            
                            <td>
                                <?= $data['jumlah_mati']; ?> Ekor
                            </td>
                            
                            <td>
                                <a href="?page=edit-mati&kode=<?php echo base64_encode($data['id']); ?>" title="Edit data"
                                    class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="?page=del-mati&kode=<?php echo base64_encode($data['id']); ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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