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
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="<?= base_url() ?>">Home</a>
                        <span>Shopping Cart</span>
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
        <?php echo form_open('belanja/update'); ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php
                            // $total_berat = 0;
                            $total = 0;
                            foreach ($this->cart->contents() as $items) {
                                // $produk = $this->m_home->detail_produk($items['id']);
                                // $berat = $items['qty'] * $items['netto'];
                                // $total_berat = $total_berat + $berat 
                            ?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="<?php echo base_url('assets/produk/' . $items['images']) ?>" alt="">
                                        <h5><?php echo $items['name'] ?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        Rp. <?= number_format($items['price'], 0); ?>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <!-- <div class="pro-qty"> -->
                                            <?php echo form_input(
                                                array(
                                                    'name' => $i . '[qty]',
                                                    'value' => $items['qty'],
                                                    'maxlength' => '3',
                                                    'min' => '0',
                                                    'max' => 'stock',
                                                    'size' => '5',
                                                    'type' => 'number',
                                                    'class' => 'form-control'
                                                )
                                            ); ?>
                                            <!-- <input type="text" value="1"> -->
                                            <!-- </div> -->
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        Rp. <?= number_format($items['subtotal'], 0); ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close"><a href="<?= base_url('belanja/delete/') . $items['rowid'] ?>"></span>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="<?= base_url() ?>" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <button type="submit" href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Upadate Cart</button>
                </div>
            </div>
            <!-- <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal <span>Rp. <?= number_format($this->cart->total(), 0) ?></span></li>
                        <li>Total <span>Rp. <?= number_format($this->cart->total(), 0) ?></span></li>
                    </ul>
                    <a href="<?= base_url('belanja/cekout') ?>" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</section>
<!-- Shoping Cart Section End -->