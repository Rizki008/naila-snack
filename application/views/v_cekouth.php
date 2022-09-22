<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?= base_url() ?>ogani-master/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>ogani-master/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>ogani-master/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>ogani-master/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>ogani-master/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>ogani-master/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>ogani-master/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>ogani-master/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

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
                                <li>Free Shipping for all Order of $99</li>
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
                                    <a href="<?= base_url() ?>"><i class="fa fa-user"></i> <?= $this->session->userdata('nama_pelanggan'); ?></a>
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
                        <a href="<?= base_url() ?>"><img src="<?= base_url() ?>ogani-master/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
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
                            <form action="#">
                                <!-- <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div> -->
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
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
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="<?= base_url() ?>">Home</a>
                            <span>Checkout</span>
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
            echo validation_errors(
                ' <div class="alert alert-danger alert-dismissible" role="alert">',
                '</div>'
            );
            if (isset($error_upload)) {
                echo ' <div class="alert alert-danger alert-dismissible" role="alert">
				' . $error_upload . '
			</div>';
            }
            ?>
            <div class="checkout__form">
                <h4>Details Pemesanan</h4>
                <form action="<?= base_url('belanja/cekout') ?>" method="POST">
                    <?php
                    $i = 1;
                    $j = 1;
                    foreach ($this->cart->contents() as $items) {
                        $id_rinci = random_string('alnum', 5);
                        echo form_hidden('qty' . $i++, $items['qty']);
                        echo form_hidden('id_rinci' . $j++, $id_rinci);
                    }
                    ?>
                    <?php
                    $no_order = date('Ymd') . strtoupper(random_string('alnum', 8)); ?>
                    <input name="no_order" value="<?= $no_order ?>" hidden>
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Nama Lengkap<span>*</span></p>
                                        <input type="text" name="nama_lengkap" value="<?= set_value('nama_lengkap') ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>No Telephone<span>*</span></p>
                                        <input type="number" name="no_tlpn" value="<?= set_value('no_tlpn') ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Alamat Lengkap Penerima<span>*</span></p>
                                <input type="text" name="alamat" value="<?= set_value('alamat') ?>" required>
                            </div>
                            <div class="checkout__input">
                                <p>Kode Post<span>*</span></p>
                                <input type="text" name="kode_pos" value="<?= set_value('kode_pos') ?>">
                            </div>
                            <div class="checkout__input">
                                <p>Pembayaran<span>*</span></p>
                                <select name="pembayaran" id="pembayaran">
                                    <option>---Pilih Pembayaran--</option>
                                    <option value="1">COD</option>
                                    <option value="2">Transfer</option>
                                </select>
                            </div><br><br><br>
                            <div class="checkout__input">
                                <p>Waktu Acara<span>*</span></p>
                                <input type="date" name="waktu_pesan">
                                <span class="badge badge-warning">Pemesanan Minimail h-7</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    <?php
                                    foreach ($this->cart->contents() as $items) {
                                    ?>
                                        <li><?php echo $items['name'] ?><span>Rp. <?= number_format($items['price'] * $items['qty'], 0); ?></span></li>
                                    <?php } ?>
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span><?php echo number_format($this->cart->total(), 0) ?></span></div>
                                <div class="checkout__order__total">Total <span><?php echo number_format($this->cart->total(), 0) ?></span></div>
                                <input name="grand_total" value="<?= $this->cart->total() ?>" hidden>
                                <input name="total_bayar" hidden>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="<?= base_url() ?>"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@colorlib.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="<?= base_url() ?>ogani-master/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>ogani-master/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>ogani-master/js/jquery.nice-select.min.js"></script>
    <script src="<?= base_url() ?>ogani-master/js/jquery-ui.min.js"></script>
    <script src="<?= base_url() ?>ogani-master/js/jquery.slicknav.js"></script>
    <script src="<?= base_url() ?>ogani-master/js/mixitup.min.js"></script>
    <script src="<?= base_url() ?>ogani-master/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>ogani-master/js/main.js"></script>



</body>

</html>