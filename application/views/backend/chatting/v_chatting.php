<!-- DIRECT CHAT PRIMARY -->
<div class="card card-prirary cardutline direct-chat direct-chat-primary">
	<div class="card-header">
		<h3 class="card-title">Direct Chat</h3>

		<div class="card-tools">
			<span data-toggle="tooltip" title="3 New Messages" class="badge bg-primary">3</span>
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
			</button>
			<button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
				<i class="fas fa-comments"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
			</button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<!-- Conversations are loaded here -->
		<div class="direct-chat-messages">
			<?php foreach ($pesan as $key => $value) {
				$id_pelanggan = $value->id_pelanggan;
				if ($value->pesan != '0') {
			?>
					<div class="direct-chat-msg">
						<div class="direct-chat-infos clearfix">
							<span class="direct-chat-name float-left"><?= $value->nama ?></span>
							<span class="direct-chat-timestamp float-right"><?= $value->time_chatting ?></span>
						</div>
						<div class="direct-chat-text">
							<?= $value->pesan ?>
						</div>
					</div>
				<?php } elseif ($value->balas != '0') {
				?>
					<div class="direct-chat-msg right">
						<div class="direct-chat-infos clearfix">
							<span class="direct-chat-name float-right">Admin</span>
							<span class="direct-chat-timestamp float-left"><?= $value->time_chatting ?></span>
						</div>
						<div class="direct-chat-text">
							<?= $value->balas ?>
						</div>
					</div>
			<?php }
			} ?>
		</div>
		<div class="card-footer">
			<form action="<?= base_url('chatting_admin/send') ?>" method="post">
				<div class="input-group">
					<input type="text" name="pesan" placeholder="Type Message ..." class="form-control">
					<input type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?= $id_pelanggan ?>">
					<span class="input-group-append">
						<button type="submit" class="btn btn-primary">Send</button>
					</span>
				</div>
			</form>
		</div>
	</div>
	<!-- /.card-body -->

	<!-- /.card-footer-->
</div>
<!-- /.col -->
