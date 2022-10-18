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
                            <li><a href="<?= base_url('/home/kategori/' . $value->id_kategori) ?>"><?= $value->nama_kategori ?></a></li>
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
                    <h2>Detail Produk</h2>
                    <div class="breadcrumb__option">
                        <a href="<?= base_url() ?>">Home</a>
                        <a href="<?= base_url() ?>">Vegetables</a>
                        <span>Detail Produk</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="<?= base_url('assets/produk/' . $data['produk']->images) ?>" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        <?php foreach ($gambar as $key => $value) { ?>
                            <img data-imgbigurl="<?= base_url('assets/gambar/' . $value->img) ?>" src="<?= base_url('assets/gambar/' . $value->img) ?>" alt="">
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php
            echo form_open('belanja/add');
            echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
            ?>
            <input type="hidden" name="id" value="<?= $data['produk']->id_produk ?>">
            <input type="hidden" name="id_diskon" value="<?= $data['produk']->id_diskon ?>">
            <input type="hidden" class="price" name="price" value="<?= $data['produk']->harga ?>">
            <input type="hidden" name="name" value="<?= $data['produk']->nama_produk ?>">
            <input type="hidden" name="qty" value="1">
            <input type="hidden" class="stock" name="stock" value="<?= $data['produk']->stock ?>">
            <input type="hidden" name="images" value="<?= $data['produk']->images ?>">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3><?= $data['produk']->nama_produk ?></h3>
                    <!-- <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div> -->
                    <div class="product__details__price">Rp. <?= number_format($data['produk']->harga, 0) ?></div>
                    <p><?= $data['produk']->deskripsi ?></p>
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="number" id="quantity" name="qty" max="<?= $data['produk']->stock ?>" value="1">
                            </div>
                        </div>
                    </div>
                    <button type="submit" href="#" class="primary-btn">ADD TO CARD</button>
                    <!-- <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a> -->
                    <ul>
                        <li><b>Availability</b> <span>In Stock <?= $data['produk']->stock ?></span></li>
                        <!-- <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li> -->
                        <!-- <li><b>Weight</b> <span>0.5 kg</span></li> -->
                        <!-- <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </div>
            <?php echo form_close() ?>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <!-- <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">Information</a> -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Reviews <span></span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p><?= $data['produk']->deskripsi ?></p>
                            </div>
                        </div>
                        <!-- <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                    Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                    sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                    eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                    sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                    diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                    ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                    Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                    Proin eget tortor risus.</p>
                                <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                    elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                    porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                    nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                            </div>
                        </div> -->
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                            <?php
							foreach ($detail['review'] as $key => $value) {
							?>
								<h6><?= $value->nama_lengkap ?></h6>

								<div> <?php
										if ($value->info_penilaian == 5) {
											echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
											echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
											echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
											echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
											echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
										} else if ($value->info_penilaian == 4) {
											echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
											echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
											echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
											echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
											echo '<i class="fa fa-star-o fa-2x"  aria-hidden="true"></i>';
										} else if ($value->info_penilaian == 3) {
											echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
											echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
											echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
											echo '<i class="fa fa-star-o fa-2x"  aria-hidden="true"></i>';
											echo '<i class="fa fa-star-o fa-2x"  aria-hidden="true"></i>';
										} else if ($value->info_penilaian == 2) {
											echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
											echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
											echo '<i class="fa fa-star-o fa-2x" aria-hidden="true"></i>';
											echo '<i class="fa fa-star-o fa-2x" aria-hidden="true"></i>';
											echo '<i class="fa fa-star-o fa-2x" aria-hidden="true"></i>';
										} else if ($value->info_penilaian == 1) {
											echo '<i class="fa fa-star fa-2x text-warning" aria-hidden="true"></i>';
											echo '<i class="fa fa-star-o fa-2x" aria-hidden="true"></i>';
											echo '<i class="fa fa-star-o fa-2x" aria-hidden="true"></i>';
											echo '<i class="fa fa-star-o fa-2x" aria-hidden="true"></i>';
											echo '<i class="fa fa-star-o fa-2x" aria-hidden="true"></i>';
										}
										?></div>
								<h5><span class="badge badge-warning"><?= $value->tanggal ?></span></h5>
								<p><?= $value->review ?></p>
								<hr>
							<?php
							}
							?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Related Product</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if (count($related_produk) > 0) : ?>
                <?php foreach ($related_produk as $product) : ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <?php echo form_open('belanja/add');
                        echo form_hidden('id', $product->id_produk);
                        echo form_hidden('qty', 1);
                        echo form_hidden('price', $product->harga);
                        echo form_hidden('stock', $product->stock);
                        echo form_hidden('images', $product->images);
                        echo form_hidden('name', $product->nama_produk);
                        echo form_hidden('redirect_page', str_replace('index.php/', '', current_url())); ?>
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/produk/' . $product->images) ?>">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#"><?= $product->nama_produk ?></a></h6>
                                <h5>Rp. <?= number_format($product->harga) ?></h5>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Related Product Section End -->