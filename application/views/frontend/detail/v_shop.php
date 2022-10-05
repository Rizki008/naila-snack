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
                            <h5>+62 8572-2918-2010</h5>
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
                    <h2>Naila Snack Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="<?= base_url() ?>">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Department</h4>
                        <?php $kategori = $this->m_home->kategori_produk(); ?>
                        <ul>
                            <?php foreach ($kategori as $key => $value) { ?>
                                <li><a href="<?= base_url('/home/kategori/' . $value->id_kategori) ?>"><?= $value->nama_kategori ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Latest Products</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    <?php foreach ($produk_lates as $key => $lates) { ?>
                                        <a href="<?= base_url('home/detail_produk/' . $lates->id_produk) ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="<?= base_url('assets/produk/' . $lates->images) ?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?= $lates->nama_produk ?></h6>
                                                <span>Rp. <?= number_format($lates->harga - ($lates->diskon / 100 * $lates->harga), 0) ?></span>
                                            </div>
                                        </a>
                                    <?php } ?>
                                </div>
                                <div class="latest-prdouct__slider__item">
                                    <?php foreach ($produk_lates as $key => $lates) { ?>
                                        <a href="<?= base_url('home/detail_produk/' . $lates->id_produk) ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="<?= base_url('assets/produk/' . $lates->images) ?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?= $lates->nama_produk ?></h6>
                                                <span>Rp. <?= number_format($lates->harga - ($lates->diskon / 100 * $lates->harga), 0) ?></span>
                                            </div>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Sale Off</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            <?php foreach ($diskon as $key => $prodis) { ?>
                                <div class="col-lg-4">
                                    <?php
                                    echo form_open('belanja/add');
                                    echo form_hidden('id', $prodis->id_produk);
                                    echo form_hidden('id_diskon', $prodis->id_diskon);
                                    echo form_hidden('qty', 1);
                                    echo form_hidden('price', $prodis->harga - ($prodis->diskon / 100 * $prodis->harga));
                                    echo form_hidden('stock', $prodis->stock);
                                    echo form_hidden('images', $prodis->images);
                                    echo form_hidden('name', $prodis->nama_produk);
                                    echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                                    ?>
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg" data-setbg="<?= base_url('assets/produk/' . $prodis->images) ?>">
                                            <div class="product__discount__percent"><?= $prodis->diskon ?> %</div>
                                            <ul class="product__item__pic__hover">
                                                <!-- <li><a href="#"><i class="fa fa-heart"></i></a></li> -->
                                                <li><a href="<?= base_url('home/detail_produk/' . $prodis->id_produk) ?>"><i class="fa fa-retweet"></i></a></li>
                                                <!-- <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li> -->
                                                <li><button type="submit" class="btn btn-warning"><i class="fa fa-shopping-cart"></i></button></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span><?= $prodis->nama_kategori ?></span>
                                            <h5><a href="#"><?= $prodis->nama_produk ?></a></h5>
                                            <div class="product__item__price">Rp. <?= number_format($prodis->harga - ($prodis->diskon / 100 * $prodis->harga), 0) ?><span>Rp. <?= number_format($prodis->harga, 0) ?> </span></div>
                                        </div>
                                    </div>
                                    <?php echo form_close() ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sort By</span>
                                <select>
                                    <option value="0">Default</option>
                                    <option value="0">Default</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <!-- <h6><span>16</span> Products found</h6> -->
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    foreach ($produk as $key => $value) {
                    ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <?php
                            echo form_open('belanja/add');
                            echo form_hidden('id', $value->id_produk);
                            echo form_hidden('id_diskon', $value->id_diskon);
                            echo form_hidden('qty', 1);
                            echo form_hidden('price', $value->harga - ($value->diskon / 100 * $value->harga));
                            echo form_hidden('stock', $value->stock);
                            echo form_hidden('images', $value->images);
                            echo form_hidden('name', $value->nama_produk);
                            echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                            ?>
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/produk/' . $value->images) ?>">
                                    <ul class="product__item__pic__hover">
                                        <!-- <li><a href="#"><i class="fa fa-heart"></i></a></li> -->
                                        <li><a href="<?= base_url('home/detail_produk/' . $value->id_produk) ?>"><i class="fa fa-retweet"></i></a></li>
                                        <!-- <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li> -->
                                        <li><button type="submit" class="btn btn-warning"><i class="fa fa-shopping-cart"></i></button></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#"><?= $value->nama_produk ?></a></h6>
                                    <h5>Rp. <?= number_format($value->harga - ($value->diskon / 100 * $value->harga), 0) ?></h5>
                                </div>
                            </div>
                            <?php echo form_close() ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="product__pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->