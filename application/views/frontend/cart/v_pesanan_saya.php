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
                    <?php foreach ($kategori as $key => $value) { ?>
                        <ul>
                            <li><a href="#"><?= $value->nama_kategori ?></a></li>
                        </ul>
                    <?php } ?>
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
<section class="breadcrumb-section set-bg" data-setbg="<?= base_url() ?>ogani-master/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Detail Pesanan</h2>
                    <div class="breadcrumb__option">
                        <a href="<?= base_url() ?>">Home</a>
                        <span>Detail Pesanan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <h3>Status Order Pelanggan</h3><br>
                    <table class="table table-active">
                        <thead>
                            <tr>
                                <th class="shoping__product">
                                    <h4>Id Transaksi</h4>
                                </th>
                                <th>
                                    <h4>Atas Nama</h4>
                                </th>
                                <th>
                                    <h4>Tanggal Order</h4>
                                </th>
                                <th>
                                    <h4>Total Order</h4>
                                </th>
                                <th>
                                    <h4>Detail</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($transaksi as $key => $value) {
                            ?>
                                <tr>
                                    <td class="shoping__cart__item"><?= $value->id_transaksi ?></td>
                                    <td><?= $value->nama_lengkap ?></td>
                                    <td><?= $value->tgl_order ?></td>
                                    <td>Rp. <?= number_format($value->grand_total)  ?></td>
                                    <td> <a href="<?= base_url('pesanan_saya/detail_pesanan/' . $value->id_transaksi) ?>" class="site-btn">...</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->