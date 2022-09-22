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
			</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>Gambar Produk</label>
						<input type="file" name="img" class="form-control" id="preview_gambar" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<img src="<?= base_url('assets/produk/nopoto.jpg') ?>" id="gambar_load" width="400px">
					</div>
				</div>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
				<a href="<?= base_url('master_produk/gambar') ?>" class="btn btn-warning btn-sm">Kembali</a>
			</div>

			<?php echo form_close() ?>
		</div>
	</div>
</div>
<ul id="single-product-tab">
	<?php foreach ($gambar as $key => $value) { ?>
		<li class="active">
			<a href="#single-tab1"><img src="<?= base_url('assets/gambar/' . $value->img) ?>" id="gambar_load" alt="" /></a>
			<h1><?= $value->keterangan ?></h1>
			<a href="#" data-toggle="modal" data-target="#DangerModalalert<?= $value->id_gambar ?>" title="Edit" class="btn btn-ctl-bt waves-effect waves-light"><i class="fa fa-trash" aria-hidden="true"></i></a>
		</li>
	<?php } ?>
</ul>

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