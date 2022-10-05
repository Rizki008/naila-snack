<!-- Hero Section Begin -->
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>
                    <?php $kategori = $this->m_home->kategori_produk(); ?>
                    <ul>
                        <?php foreach ($kategori as $key => $value) { ?>
                            <li><a href="<?= base_url('/home/kategori/' . $value->id_kategori) ?>"><?= $value->nama_kategori ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="<?= base_url('home/pencarian') ?>" method="get">
                            <!-- <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div> -->
                            <input type="text" name="keyword" placeholder="What do yo u need?">
                            <button type="submit" value="cari" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?= base_url() ?>ogani-master/img/breadcrumb1.jpeg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Registrasi</h2>
                    <div class="breadcrumb__option">
                        <a href="<?= base_url() ?>">Home</a>
                        <span>Registrasi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                </h6> -->
            </div>
        </div>
        <?php
        echo validation_errors('<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-exclamation-triangle"></i> Coba Lagi</h5>', '</div>');

        if ($this->session->flashdata('pesan')) {
            echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-check"></i> Sukses</h5>';
            echo $this->session->flashdata('pesan');
            echo '</div>';
        }
        ?>
        <div class="checkout__form">
            <h4>Registrasi Pelanggan</h4>
            <form action="<?= base_url('pelanggan/register') ?>" method="POST">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Nama Lengkap<span>*</span></p>
                                    <input type="text" name="nama_pelanggan" value="<?= set_value('nama_pelanggan') ?>" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>No Hp<span>*</span></p>
                                    <input type="number" name="no_tlpn" value="<?= set_value('no_tlpn') ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Jenis Kelamin<span>*</span></p>
                            <input type="text" name="jenis_kelamin" value="<?= set_value('jenis_kelamin') ?>" required>
                        </div>
                        <div class="checkout__input">
                            <p>Email<span>*</span></p>
                            <input type="email" name="email" value="<?= set_value('email') ?>" required class="checkout__input__add">
                        </div>
                        <div class="checkout__input">
                            <p>Password<span>*</span></p>
                            <input type="password" name="password" value="<?= set_value('password') ?>" required>
                        </div>
                        <div class="checkout__input">
                            <p>Provinsi<span>*</span></p>
                            <input type="text" name="provinsi" value="<?= set_value('provinsi') ?>" required>
                        </div>
                        <div class="checkout__input">
                            <p>Kabupaten<span>*</span></p>
                            <input type="text" name="kabupaten" value="<?= set_value('kabupaten') ?>" required>
                        </div>
                        <div class="checkout__input">
                            <p>Kecamatan<span>*</span></p>
                            <input type="text" name="kecamatan" value="<?= set_value('kecamatan') ?>" required>
                        </div>
                        <div class="checkout__input">
                            <p>Kode Post<span>*</span></p>
                            <input type="text" name="kode_post" value="<?= set_value('kode_post') ?>" required>
                        </div>
                        <div class="checkout__input">
                            <p>Alamat Lengkap<span>*</span></p>
                            <input type="text" name="alamat" value="<?= set_value('alamat') ?>" required>
                        </div>
                        <button type="submit" class="site-btn">REGISTRASI</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->