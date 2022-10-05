<div class="col-md-4">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Analisis Alamat Harian</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<?php
			echo form_open('analisis/alamat_hari') ?>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label>Tanggal</label>
						<select name="tanggal" class="form-control">
							<?php
							$mulai = 1;
							for ($i = $mulai; $i < $mulai + 31; $i++) {
								$sel = $i == date('Y') ? 'selected="selected"' : '';
								echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
							}
							?>
						</select>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label>Bulan</label>
						<select name="bulan" class="form-control">
							<?php
							$mulai = 1;
							for ($i = $mulai; $i < $mulai + 12; $i++) {
								$sel = $i == date('Y') ? 'selected="selected"' : '';
								echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
							}
							?>
						</select>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label>Tahun</label>
						<select name="tahun" class="form-control">
							<?php
							$mulai = date('Y') - 1;
							for ($i = $mulai; $i < $mulai + 10; $i++) {
								$sel = $i == date('Y') ? 'selected="selected"' : '';
								echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
							}
							?>
						</select>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-print"></i> Cetak alamatLaporan</button>
					</div>
				</div>
			</div>
			<?php
			echo form_close() ?>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>


<div class="col-md-4">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Analisis Alamat Bulanan</h3>
		</div>
		<div class="card-body">
			<?php
			echo form_open('analisis/alamat_bulan') ?>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>Bulan</label>
						<select name="bulan" class="form-control">
							<?php
							$mulai = 1;
							for ($i = $mulai; $i < $mulai + 12; $i++) {
								$sel = $i == date('Y') ? 'selected="selected"' : '';
								echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
							}
							?>
						</select>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>Tahun</label>
						<select name="tahun" class="form-control">
							<?php
							$mulai = date('Y') - 1;
							for ($i = $mulai; $i < $mulai + 10; $i++) {
								$sel = $i == date('Y') ? 'selected="selected"' : '';
								echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
							}
							?>
						</select>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
					</div>
				</div>
			</div>
			<?php
			echo form_close() ?>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>


<div class="col-md-4">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Analisis Alamat Tahunan</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<?php
			echo form_open('analisis/alamat_tahun') ?>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label>Tahun</label>
						<select name="tahun" class="form-control">
							<?php
							$mulai = date('Y') - 1;
							for ($i = $mulai; $i < $mulai + 10; $i++) {
								$sel = $i == date('Y') ? 'selected="selected"' : '';
								echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
							}
							?>
						</select>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
					</div>
				</div>
			</div>
			<?php
			echo form_close() ?>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>