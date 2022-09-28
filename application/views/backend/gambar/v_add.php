<!-- right column -->
<div class="col-md-12">
	<!-- general form elements disabled -->
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title"><?= $produk->nama_produk ?></h3>
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
			echo form_open_multipart('') ?>
			<!-- text input -->
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label>Keterangan</label>
						<input name="keterangan" type="text" class="form-control" placeholder="Nama Produk" value="<?= set_value('keterangan') ?>">
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label>Gambar Produk</label>
						<input type="file" name="img" class="form-control" id="preview_gambar" required>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<img src="<?= base_url('assets/produk/nopoto.jpg') ?>" id="gambar_load" width="200px">
					</div>
				</div>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
				<a href="<?= base_url('master_produk/gambar') ?>" class="btn btn-warning btn-sm">Kembali</a>
			</div>

			<?php echo form_close() ?>
			<hr>
			<div class="row">
				<?php foreach ($gambar as $key => $value) { ?>
					<div class="col-sm-3">
						<div class="form-group">
							<img src="<?= base_url('assets/gambar/' . $value->img) ?>" height="250px" width="250px" id="gambar_load" />
						</div>
						<label><?= $value->keterangan ?></label>
						<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_gambar ?>"><i class="fa fa-trash"></i></button>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<script>
	function bacaGambar(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#gambar_load').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#preview_gambar").change(function() {
		bacaGambar(this);
	});
</script>


<!-- /.modal Delete -->
<?php foreach ($gambar as $key => $value) { ?>
	<div class="modal fade" id="delete<?= $value->id_gambar ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Delete <?= $value->keterangan ?></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h5>Apakah Anda Yakin Akan Hapus Data ini?</h5>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<a href="<?= base_url('master_produk/delete_gambar/' . $value->id_produk . '/' . $value->id_gambar) ?> " class="btn btn-primary">Delete</a>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
<?php } ?>