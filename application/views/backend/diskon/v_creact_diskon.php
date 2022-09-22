<!-- right column -->
<div class="col-md-12">
	<!-- general form elements disabled -->
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">General Elements</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<?php
			//notifikasi form kosong
			echo validation_errors('<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i>', '</h5></div>');

			//notifikasi gagal upload gambar
			if (isset($error_upload)) {
				echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i>' . $error_upload . '</h5></div>';
			}
			echo form_open('master_produk/createDiskon') ?>
			<!-- text input -->
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label>Nama Produk</label>
						<input name="nama_diskon" type="text" class="form-control" placeholder="Nama Produk" value="<?= set_value('nama_diskon') ?>">
					</div>
				</div>

				<div class="col-sm-4">
					<div class="form-group">
						<label>Nama Produk</label>
						<select id="produk-diskon" name="produk" class="form-control">
							<option value="">---Pilih Kategori Produk---</option>
							<?php
							foreach ($produk as $key => $value) {
							?>
								<option data-harga="<?= number_format($value->harga, 0) ?>" value="<?= $value->id_produk ?>" <?php if (set_value('produk') == $value->id_produk) {
																																	echo 'selected';
																																} ?>><?= $value->nama_produk ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label>Level Member</label>
						<select id="produk-diskon" name="level" class="form-control">
							<option value="">---Pilih Level Member---</option>
							<option value="1" <?php if (set_value('level') == '1') {
													echo 'selected';
												} ?>>Gold</option>
							<option value="2" <?php if (set_value('level') == '2') {
													echo 'selected';
												} ?>>Silver</option>
							<option value="3" <?php if (set_value('level') == '3') {
													echo 'selected';
												} ?>>Clasic</option>
						</select>
					</div>
				</div>
				<div class="col-sm-4">
					<!-- text input -->
					<div class="form-group">
						<label>Harga Produk</label>
						<input name="diskon" type="number" class="form-control" placeholder="Besar Diskon" value="<?= set_value('diskon') ?>">
					</div>
				</div>
				<div class="col-sm-4">
					<!-- text input -->
					<div class="form-group">
						<label>Tanggal Selesai</label>
						<input name="tgl" type="date" class="form-control" placeholder="Tanggal Selesai" value="<?= set_value('tgl') ?>">
					</div>
				</div>
				<div class="col-sm-4">
					<!-- text input -->
					<div class="form-group">
						<label>Harga Produk</label>
						<input name="harga" type="text" min="0" class="harga form-control" placeholder="Harga Produk" value="<?= set_value('harga') ?>" readonly>
					</div>
				</div>
			</div>


			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
				<a href="<?= base_url('master_produk/produk') ?>" class="btn btn-warning btn-sm">Kembali</a>
			</div>

			<?php echo form_close() ?>
		</div>
	</div>
</div>


<script>
	console.log = function() {}
	$("#produk-diskon").on('change', function() {

		$(".harga").html($(this).find(':selected').attr('data-harga'));
		$(".harga").val($(this).find(':selected').attr('data-harga'));
	});
</script>