<div class="col-md-12">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Data Produk</h3>

			<div class="card-tools">
				<a href="<?= base_url('master_produk/add_produk') ?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>
					Tambah Produk</a>
			</div>
			<!-- /.card-tools -->
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<?php
			if ($this->session->flashdata('pesan')) {
				echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
				echo $this->session->flashdata('pesan');
				echo '</h5></div>';
			}
			?>
			<table id="example1" class="table table-bordered" id="example1">
				<thead class="text-center">
					<tr>
						<th>No</th>
						<th>Nama Pelanggan</th>
						<th>No Telephone</th>
						<th>Jenis Kelamin</th>
						<!-- <th>Total Transaksi</th> -->
						<th>ALamat</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($history as $key => $value) { ?>
						<tr class="text-center">
							<td><?= $no++; ?></td>
							<td><?= $value->nama_pelanggan ?></td>
							<td><?= $value->no_tlpn ?></td>
							<td><?= $value->jenis_kelamin ?></td>
							<!-- <td><?= $value->total ?></td> -->
							<td><?= $value->alamat ?></td>
							<td>
								<a href="<?= base_url('history/history_detail/' . $value->id_pelanggan) ?>" class="btn btn-primary btn-sm"><i class="fa fa-layer-group"></i></a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>