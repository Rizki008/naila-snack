<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?= base_url('admin') ?>" class="brand-link">
		<!-- <img src="<?= base_url() ?>template/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
		<span class="brand-text font-weight-light">
			<h5>Snack & Catering</h5>
		</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url() ?>template/dist/img/logos.png" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="<?= base_url('admin') ?>" class="d-block">
					<?= $this->session->userdata('nama'); ?>
				</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?= base_url('admin') ?>" class="nav-link <?php if (
																			$this->uri->segment(1) == 'admin' and $this->uri->segment(2) == " "
																		) {
																			echo "active";
																		} ?>">
						<i class="nav-icon fas fa-home"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('master_produk/kategori') ?>" class="nav-link <?php if (
																							$this->uri->segment(1) == 'kategori'
																						) {
																							echo "active";
																						} ?>">
						<i class="nav-icon fas fa-sort-amount-down-alt"></i>
						<p>
							Kategori
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('master_produk/produk') ?>" class="nav-link <?php if (
																							$this->uri->segment(1) == 'produk'
																						) {
																							echo "active";
																						} ?>">
						<i class="nav-icon fas fa-tags"></i>
						<p>
							Produk
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('master_produk/gambar') ?>" class="nav-link <?php if (
																							$this->uri->segment(1) == 'gambar'
																						) {
																							echo "active";
																						} ?>">
						<i class="nav-icon fas fa-images"></i>
						<p>
							Gambar Produk
						</p>
					</a>
				</li>
				<!-- <li class="nav-item">
					<a href="<?= base_url('rekening') ?>" class="nav-link <?php if (
																				$this->uri->segment(1) == 'rekening'
																			) {
																				echo "active";
																			} ?>">
						<i class="nav-icon fas fa-address-book"></i>
						<p>
							Rekening Toko
						</p>
					</a>
				</li> -->

				<li class="nav-item">
					<a href="<?= base_url('master_produk/diskon') ?>" class="nav-link <?php if (
																							$this->uri->segment(1) == 'diskon'
																						) {
																							echo "active";
																						} ?>">
						<i class="nav-icon fas fa-percent"></i>
						<p>
							Diskon Produk
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('transaksi') ?>" class="nav-link <?php if (
																				$this->uri->segment(2) == 'transaksi' and $this->uri->segment(1) == 'admin'
																			) {
																				echo "active";
																			} ?>">
						<i class="nav-icon fas fa-money-check-alt"></i>
						<p>
							Transaksi
							<span class="badge badge-info right"></span>
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?= base_url('laporan') ?>" class="nav-link <?php if (
																				$this->uri->segment(1) == 'laporan'
																			) {
																				echo "active";
																			} ?>">
						<i class="nav-icon fas fa-address-book"></i>
						<p>
							Laporan
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('history') ?>" class="nav-link <?php if (
																				$this->uri->segment(1) == 'history'
																			) {
																				echo "active";
																			} ?>">
						<i class="nav-icon fas fa-address-book"></i>
						<p>
							Master Data Pelanggan
						</p>
					</a>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-chart-bar"></i>
						<p>
							Data Analisis
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('analisis/produk') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Analisis Produk</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('analisis/pelanggan') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Analisis Pelanggan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('analisis/uang') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Analisis Keuangan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('analisis/alamat') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Analisis Alamat</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item">
					<a href="<?= base_url('admin/user') ?>" class="nav-link <?php if (
																				$this->uri->segment(1) == 'user'
																			) {
																				echo "active";
																			} ?>">
						<i class="nav-icon fas fa-users"></i>
						<p>
							User
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?= base_url('auth/logout') ?>" class="nav-link">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>
							Keluar
						</p>
					</a>
				</li>

			</ul>
		</nav>
	</div>
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"><?= $title ?></h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">