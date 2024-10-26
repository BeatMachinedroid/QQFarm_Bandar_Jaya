<div class="card card-warning">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Ayam Masuk</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
                
				<a href="?page=add-ayam-masuk" class="btn btn-warning">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>						
						<th>Tanggal</th>
						<th>Kode kandang</th>
						<th>Jumlah</th>
						<th>Berat DOC</th>			
						<th>Harga per-ekor</th>			
						<th>Total beli</th>			
						<th>Aksi</th>			
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT tb_ayam_masuk.id ,umur
			  , harga_ekor, kode, jumlah, tgl, rata_berat 
			  from tb_kandang Join tb_ayam_masuk ON tb_kandang.id = tb_ayam_masuk.fk_kandang");

              while ($data= $sql->fetch_assoc()) {
				$total_pakan = $data['harga_ekor'] * $data['jumlah'];
				$total = number_format($total_pakan, 0, ',', '.');
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>						
						<td>
							<?php echo $data['tgl']; ?>							
						</td>
						
						<td>
							<?php echo $data['kode']; ?>
						</td>
						<td>
							<?php echo $data['jumlah']; ?> Ekor
						</td>
						<td>
							<?php echo $data['rata_berat']; ?> Gram
						</td>
						<td>
							Rp. <?php echo $data['harga_ekor']; ?>
						</td>
						<td>
							Rp. <?php echo $total; ?>
						</td>
						<td>
				<a href="?page=edit-masuk&kode=<?php echo base64_encode($data['id']); ?>" title="Edit data"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-masuk&kode=<?php echo base64_encode($data['id']); ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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