<!-- Main content -->

<div class="col-md-8">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">History Riview</h3>
		</div>
		<div class="card-body p-0">
			<table class="table align-items-center table-flush">
				<thead class="thead-light">
					<tr>
						<th>Tanggal Riview</th>
						<th>Informasi Riview</th>
						<th>Jumlah Rating Riview</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($history_detail as $key => $value) {
						if ($value->info_penilaian != 0) { ?>
							<tr>
								<td><?= $value->tanggal ?></td>
								<td><?= $value->review ?></td>
								<td>
									<?php if ($value->info_penilaian == 5) {
										echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
										echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
										echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
										echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
										echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
									} else if ($value->info_penilaian == 4) {
										echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
										echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
										echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
										echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
										echo '<i class="fa fa-star-o fa-2x"  aria-hidden="true"></i>';
									} else if ($value->info_penilaian == 3) {
										echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
										echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
										echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
										echo '<i class="fa fa-star-o fa-2x"  aria-hidden="true"></i>';
										echo '<i class="fa fa-star-o fa-2x"  aria-hidden="true"></i>';
									} else if ($value->info_penilaian == 2) {
										echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
										echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
										echo '<i class="fa fa-star-o fa-2x" aria-hidden="true"></i>';
										echo '<i class="fa fa-star-o fa-2x" aria-hidden="true"></i>';
										echo '<i class="fa fa-star-o fa-2x" aria-hidden="true"></i>';
									} else if ($value->info_penilaian == 1) {
										echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
										echo '<i class="fa fa-star-o fa-2x" aria-hidden="true"></i>';
										echo '<i class="fa fa-star-o fa-2x" aria-hidden="true"></i>';
										echo '<i class="fa fa-star-o fa-2x" aria-hidden="true"></i>';
										echo '<i class="fa fa-star-o fa-2x" aria-hidden="true"></i>';
									}
									?>
								</td>
							</tr>
					<?php }
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<div class="col-md-4">
	<div class="card card-secondary">
		<div class="card-header">
			<h3 class="card-title">Data Pelanggan</h3>
		</div>
		<div class="card-body p-0">
			<table class="table">
				<tbody>
					<tr>
						<td>Nama Pelanggan</td>
						<td><?= $value->nama_pelanggan ?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td><?= $value->jenis_kelamin ?></td>
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
			<h3 class="card-title">Hostory Belanja</h3>
		</div>
		<div class="card-body p-0">
			<table class="table">
				<thead>
					<tr>
						<th>Total Belanja</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($history_belanja as $key => $value) { ?>
						<tr>
							<td>Rp. <?= number_format($value->total_belanja, 0) ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>