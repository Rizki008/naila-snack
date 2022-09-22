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
                    <ul>
                        <li><a href="#">Fresh Meat</a></li>
                        <li><a href="#">Vegetables</a></li>
                        <li><a href="#">Fruit & Nut Gifts</a></li>
                        <li><a href="#">Fresh Berries</a></li>
                        <li><a href="#">Ocean Foods</a></li>
                        <li><a href="#">Butter & Eggs</a></li>
                        <li><a href="#">Fastfood</a></li>
                        <li><a href="#">Fresh Onion</a></li>
                        <li><a href="#">Papayaya & Crisps</a></li>
                        <li><a href="#">Oatmeal</a></li>
                        <li><a href="#">Fresh Bananas</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
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
                    <h2>Login</h2>
                    <div class="breadcrumb__option">
                        <a href="<?= base_url() ?>">Home</a>
                        <span>Login</span>
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
        echo validation_errors('<div class="alert alert-warning alert-success-style3 alert-st-bg2">
                        <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                        <span class="icon-sc-cl" aria-hidden="true">&times;</span>
                        </button>
                        <i class="fa fa-exclamation-triangle adminpro-warning-danger admin-check-pro admin-check-pro-clr2" aria-hidden="true"></i>
                        <p><strong>Warning!</strong> Coba Lagi!!!</p>', '</div>');

        if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger alert-mg-b alert-success-style4 alert-st-bg3">
                          <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
              <span class="icon-sc-cl" aria-hidden="true">&times;</span>
            </button>
                          <i class="fa fa-times adminpro-danger-error admin-check-pro admin-check-pro-clr3" aria-hidden="true"></i>
                          <p><strong>Danger!</strong> Gagal.</p>';
            echo $this->session->flashdata('error');
            echo '</div>';
        }

        if ($this->session->flashdata('pesan')) {
            echo '<div class="alert alert-success alert-success-style1 alert-st-bg">
                          <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
              <span class="icon-sc-cl" aria-hidden="true">&times;</span>
            </button>
                          <i class="fa fa-check adminpro-checked-pro admin-check-pro admin-check-pro-clr" aria-hidden="true"></i>
                          <p><strong>Success!</strong>successful</p>';
            echo $this->session->flashdata('pesan');
            echo '</div>';
        }
        ?>
        <div class="checkout__form">
            <h4>Registrasi Pelanggan</h4>
            <form action="<?= base_url('pelanggan/login') ?>" method="POST">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="email" name="email" value="<?= set_value('email') ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Password<span>*</span></p>
                                    <input type="password" name="password" value="<?= set_value('password') ?>">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="site-btn">LOGIN</button>
                        <a href="<?= base_url('pelanggan/register') ?>" class="btn btn-wrning">Registrasi</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->