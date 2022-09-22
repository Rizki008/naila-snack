<!-- Hero Section Begin -->
<section class="hero">
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
                            <h5>+62 8572-2918-2010</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
                <div class="hero__item set-bg" data-setbg="<?= base_url() ?>ogani-master/img/hero/banner.jpg">
                    <div class="hero__text">
                        <span>SNACK DAN CATERING</span>
                        <h2>Menu <br />100% Halal</h2>
                        <p>Pemesanan H-7</p>
                        <a href="#" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                <?php foreach ($ketegori as $key => $value) { ?>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="<?= base_url('assets/kategori/' . $value->gambar) ?>">
                            <h5><a href="#"><?= $value->nama_kategori ?></a></h5>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            <?php
            foreach ($menu['paket'] as $key => $value) {
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <?php
                    echo form_open('belanja/add');
                    echo form_hidden('id', $value->id_produk);
                    echo form_hidden('id_diskon', $value->id_diskon);
                    echo form_hidden('qty', 1);
                    echo form_hidden('price', $value->harga);
                    echo form_hidden('stock', $value->stock);
                    echo form_hidden('images', $value->images);
                    echo form_hidden('name', $value->nama_produk);
                    echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                    ?>
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?= base_url('assets/produk/' . $value->images) ?>">
                            <ul class="featured__item__pic__hover">
                                <!-- <li><a href="#"><i class="fa fa-heart"></i></a></li> -->
                                <li><a href="<?= base_url('home/detail_produk/' . $value->id_produk) ?>"><i class="fa fa-retweet"></i></a></li>
                                <!-- <li><a href="<?= base_url('belanja/add') ?>"><i class="fa fa-shopping-cart"></i></a></li> -->
                                <li><button type="submit" class="btn btn-warning"><i class="fa fa-shopping-cart"></i></button></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#"><?= $value->nama_produk ?></a></h6>
                            <h5>Rp. <?= number_format($value->harga, 0) ?></h5>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<!-- <div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="<?= base_url() ?>ogani-master/img/banner/banner-1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="<?= base_url() ?>ogani-master/img/banner/banner-2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Banner End -->

<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Latest Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <?php foreach ($lates as $key => $lates) { ?>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?= base_url('assets/produk/' . $lates->images) ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?= $lates->nama_produk ?></h6>
                                        <span>Rp. <?= number_format($lates->harga, 0) ?></span>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Top Rated Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <?php foreach ($best as $key => $best) { ?>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?= base_url('assets/produk/' . $best->images) ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?= $best->nama_produk ?></h6>
                                        <span>Rp. <?= number_format($best->harga, 0) ?></span>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Diskon Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <?php foreach ($diskon as $key => $prodis) { ?>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?= base_url('assets/produk/' . $prodis->images) ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?= $prodis->nama_produk ?></h6>
                                        <span>Rp. <?= number_format($prodis->harga) ?></span>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- Latest Product Section End -->