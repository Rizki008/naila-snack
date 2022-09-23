<div class="col-md-12">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Data Produk</h3>

			<div class="card-tools">
				<a href="<?= base_url('master_produk/createDiskon') ?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>
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
						<th>Nama Produk</th>
						<th>Nama Diskon</th>
						<th>Besar Diskon</th>
						<th>Deskripsi</th>
						<th>Member</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($diskon as $key => $value) { ?>
						<tr class="text-center">
							<td><?= $no++; ?></td>
							<td><?= $value->nama_produk ?></td>
							<td><?= $value->nama_diskon ?></td>
							<td><?= number_format($value->diskon, 0) ?> %</td>
							<td><?= $value->tgl_selesai ?></td>
							<td><?php if ($value->member == 1) { ?>
									<span class="badge badge-primary">Silver</span>
								<?php } elseif ($value->member == 2) { ?>
									<span class="badge badge-warning">Gold</span>
								<?php } elseif ($value->member == 3) { ?>
									<span class="badge badge-danger">Platinum</span>
								<?php } ?>
							</td>
							<td>
								<a href="<?= base_url('master_produk/update/' . $value->id_produk) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<a href="<?= base_url('master_produk/delete/' . $value->id_produk) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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