<div class="card card-warning">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Tahunan (Triwulan)</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-test" class="btn btn-warning">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>						
						<th>Kode Saham</th>
						<th>Tahun Data</th>
						<th>Periode Data</th>
						<th>Analisa Rasio Profitabilitas</th>
						<th>Aksi</th>			
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  

			  
			  $sql = $koneksi->query("SELECT p.id_tahunan, p.saham_nama, p.tahun_data, p.periode_data, p.gross_profit_margin, p.net_profit_margin, p.roa, p.roe, a.id_pt, k.nama_pt, k.alamat_pt, k.telepon_pt, k.ket_pt from data_tahunan p left join tb_profitabilitas a on p.id_tahunan=a.id_tahun left join tb_perusahaan k on a.id_pt=k.id_pt");

              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>						
						<td>
							<?php echo $data['saham_nama']; ?>							
						</td>
						
						<td>
							<?php echo $data['tahun_data']; ?>
						</td>
						<td>
							<?php echo $data['periode_data']; ?>
						</td>

						<td>
							<a href="?page=data-rasio&kode=<?php echo $data['id_tahunan']; ?>" title="Detail Data Profitabilitas"
							 class="btn btn-info btn-sm">
								<i class="fas fa-fw fa-briefcase"></i>
							</a>
						</td>
						<td>
				<a href="?page=data-view&kode=<?php echo $data['id_tahunan']; ?>" title="Edit data"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=data-del&kode=<?php echo $data['id_tahunan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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