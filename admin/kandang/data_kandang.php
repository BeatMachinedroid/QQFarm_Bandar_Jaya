<div class="card card-warning">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Kandang</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
                
				<a href="?page=add-kandang" class="btn btn-warning">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>						
						<th>Kode kandang</th>
						<th>nama kandang</th>
						<th>kapasitas</th>
						<th>lokasi</th>		
						<th>aksi</th>			
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  

			  
			  $sql = $koneksi->query("SELECT * from tb_kandang");

              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>						
						<td>
							<?php echo $data['kode']; ?>							
						</td>
						
						<td>
							<?php echo $data['nama_kandang']; ?>
						</td>
						<td>
							<?php echo $data['kapasitas']; ?> Ekor
						</td>
						<td>
							<?php echo $data['lokasi']; ?>
						</td>
						<td>
				<a href="?page=edit-kandang&kode=<?php echo base64_encode($data['id']); ?>" title="Edit data"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-kandang&kode=<?php echo base64_encode($data['id']); ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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