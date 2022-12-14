<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="<?= base_url() ?>ogani-master/img/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
        </ul>
        <div class="header__cart__price">item: <span>$150.00</span></div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <img src="<?= base_url() ?>ogani-master/img/language.png" alt="">
            <div>English</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="#">Spanis</a></li>
                <li><a href="#">English</a></li>
            </ul>
        </div>
        <div class="header__top__right__auth">
            <a href="#"><i class="fa fa-user"></i> Login</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="<?= base_url() ?>">Home</a></li>
            <li><a href="./shop-grid.html">Shop</a></li>
            <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
                    <li><a href="./shop-details.html">Shop Details</a></li>
                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                    <li><a href="./checkout.html">Check Out</a></li>
                    <li><a href="./blog-details.html">Blog Details</a></li>
                </ul>
            </li>
            <li><a href="./blog.html">Blog</a></li>
            <li><a href="./contact.html">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
            <li>Free Shipping for all Order of $99</li>
        </ul>
    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> nalika-snack@gmail.com</li>
                            <?php if ($this->session->userdata('email') == "") { ?>
                                <li> - </li>
                            <?php } else { ?>
                                <?php if ($this->session->userdata('level_member') == '3') { ?>
                                    <li>Member Clasic</li>
                                <?php } elseif ($this->session->userdata('level_member') == '2') { ?>
                                    <li>Member Silver</li>
                                <?php } elseif ($this->session->userdata('level_member') == '1') { ?>
                                    <li>Member Gold</li>
                                <?php } ?>
                                <!-- <li><?= $this->session->userdata('level_member'); ?></li> -->
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        <!-- <div class="header__top__right__language">
                            <img src="img/language.png" alt="">
                            <div>English</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="#">Spanis</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div> -->
                        <div class="header__top__right__auth">
                            <?php if ($this->session->userdata('email') == "") { ?>
                                <a href="<?= base_url('pelanggan/login') ?>"><i class="fa fa-user"></i> Login</a>
                            <?php } else { ?>
                                <a href="<?= base_url('pelanggan/logout') ?>"><i class="fa fa-user"></i> <?= $this->session->userdata('nama_pelanggan'); ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="<?= base_url() ?>"><img src="<?= base_url() ?>ogani-master/img/logos.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="<?= base_url() ?>">Home</a></li>
                        <li><a href="<?= base_url('home/shop') ?>">Shop</a></li>
                        <!-- <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="./shop-details.html">Shop Details</a></li>
                                <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                <li><a href="./checkout.html">Check Out</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="./blog.html">Blog</a></li>-->
                        <?php if ($this->session->userdata('email') == "") { ?>
                            <!-- <li><a href="<?= base_url('pesanan_saya') ?>">Pesanan Saya</a></li> -->
                        <?php } else { ?>
                            <li><a href="<?= base_url('pesanan_saya') ?>">Pesanan Saya</a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <?php $keranjang = $this->cart->contents();
                    $jml_item = 0;
                    foreach ($keranjang as $key => $value) {
                        $jml_item = $jml_item + $value['qty'];
                    } ?>
                    <ul>
                        <!-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> -->
                        <li><a href="<?= base_url('belanja') ?>"><i class="fa fa-shopping-bag"></i> <span><?= $jml_item ?></span></a></li>
                    </ul>
                    <div class="header__cart__price">item: <span>Rp. <?= number_format($this->cart->total()) ?></span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->