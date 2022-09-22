<!-- Main content -->

<div class="col-md-8">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Produk Dalam Pesanan</h3>
		</div>
		<div class="card-body p-0">
			<table class="table align-items-center table-flush">
				<thead class="thead-light">
					<tr>
						<th></th>
						<th>Nama Produk</th>
						<th>Jumlah</th>
						<th>Harga Satuan</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($pesanan_detail as $key => $value) { ?>
						<tr>
							<td><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" width="150px"></td>
							<td><?= $value->nama_produk ?></td>
							<td><?= $value->qty ?></td>
							<td>Rp. <?= number_format($value->harga, 0) ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<div class="col-md-4">
	<div class="card card-secondary">
		<div class="card-header">
			<h3 class="card-title">Data Penerima</h3>
		</div>
		<div class="card-body p-0">
			<table class="table">
				<tbody>

					<tr>
						<td>No Order</td>
						<td><?= $value->no_order ?></td>
					</tr>

					<tr>
						<td>Nama Penerima</td>
						<td><?= $value->nama ?></td>
					</tr>
					<tr>
						<td>No Hp</td>
						<td><?= $value->no_tlpn ?></td>
					</tr>

					<tr>
						<td>Alamat</td>
						<td><?= $value->alamat ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title">Proses Kirim</h3>
		</div>
		<div class="card-body p-0">
			<table class="table">
				<thead>
					<tr>
						<th>Total Bayar</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Rp. <?= number_format($value->grand_total, 0) ?></td>
						<td><span class="badge badge-primary">Dikemas</span></td>
						<td class="form-group">
							<a href="<?= base_url('admin/pesanan_masuk') ?>" class="btn btn-warning btn-sm">Kembali</a>
							<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#kirim<?= $value->id_transaksi ?>"><i class=" fa fa-paper-plane">Kirim</i> </button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php foreach ($proses_kirim as $key => $value) { ?>
	<div class="modal fade" id="kirim<?= $value->id_transaksi ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"><?= $value->no_order ?></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php echo form_open('admin/kirim/' . $value->id_transaksi) ?>

					<table class="table">
						<!-- <tr>
							<th>Biaya Pengiriman</th>
							<th>:</th>
							<td>Rp.<?= number_format($value->ongkir, 0) ?></td>
						</tr> -->

						<tr>
							<th>Nama Pengirim</th>
							<th>:</th>
							<td><input name="nama_pengirim" class="form-control" placeholder="Nama Pengirim" required></td>
						</tr>

					</table>



				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Kirim</button>
				</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>
<?php } ?>