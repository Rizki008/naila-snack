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

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <?php
        if ($this->session->userdata('success')) {
        ?>
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> <?= $this->session->userdata('success') ?>
                    </h6>
                </div>
            </div>
        <?php
        }
        ?>

        <div class="checkout__form">
            <h4>Detail Pesanan</h4>
            <div class="row">
                <div class="col-lg-6">
                    <p>Pesanan <strong><?= $detail['transaksi']->no_order ?></strong></p>
                    <p>Tanggal Order. <strong><?= $detail['transaksi']->tgl_order ?></strong></p>
                    <?php
                    if ($detail['transaksi']->status_order == '0') {
                        echo '<p>Status Order: <span class="badge badge-danger">Belum Bayar</span></p>';
                    } else if ($detail['transaksi']->status_order == '1') {
                        echo '<p>Status Order: <span class="badge badge-warning">Menunggu Konfirmasi</span></p>';
                    } else if ($detail['transaksi']->status_order == '2') {
                        echo '<p>Status Order: <span class="badge badge-info">Pesanan Diproses</span></p>';
                    } else if ($detail['transaksi']->status_order == '3') {
                        echo '<p>Status Order: <span class="badge badge-primary">Pesanan Dikirim</span></p>';
                    } else if ($detail['transaksi']->status_order == '4') {
                        echo '<p>Status Order: <span class="badge badge-success">Pesanan Diterima</span></p>';
                    } else if ($detail['transaksi']->status_order == '5') {
                        echo '<p>Status Order: <span class="badge badge-danger">Pesanan Dibatalkan</span></p>';
                    }

                    if ($detail['transaksi']->status_order == '3') {
                    ?>
                        <p>Silahkan konfirmasi pesanan jika pesanan telah diterima!</p>
                        <?php echo form_open('pesanan_saya/diterima/' . $detail['transaksi']->id_transaksi); ?>
                        <input type="hidden" name="pelanggan" value="<?= $detail['transaksi']->id_pelanggan ?>">
                        <input type="hidden" name="total_belanja" value="<?= $detail['transaksi']->grand_total ?>">
                        <?php
                        $point = 0;
                        $point = (0.5 / 100) * $detail['transaksi']->grand_total;
                        ?>
                        <input type="hidden" name="point" value="<?= $point ?>">
                        <button type="submit" class="site-btn mt-3 mb-3">Pesanan Diterima</button>
                        <!-- <a href="<?= base_url('pesanan_saya/diterima/' . $detail['transaksi']->id_transaksi) ?>" class="site-btn mt-3 mb-3">Pesanan Diterima</a> -->
                        <?php echo form_close() ?>
                    <?php
                    }
                    ?>
                </div>

                <div class="col-lg-6">
                    <?php
                    if ($detail['transaksi']->status_order == '0') {
                    ?>
                        <h3>Pembayaran</h3>
                        <p class="text-danger">Bank BRI. 0123-343-1233-02-1</p>

                        <?php
                        echo validation_errors('<div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-exclamation-triangle"></i>', '</h5></div>');

                        //notifikasi gagal upload gambar
                        if (isset($error_upload)) {
                            echo '<div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fa fa-exclamation-triangle"></i>' . $error_upload . '</h5></div>';
                        }
                        echo form_open_multipart('pesanan_saya/bayar/' . $detail['transaksi']->id_transaksi) ?>
                        <label>Upload Bukti Pembayaran</label>
                        <input type="file" class="form-control" name="bukti_bayar">
                        <label>Nama Bank</label>
                        <input type="text" class="form-control" name="nama_bank" value="<?= set_value('nama_bank') ?>">
                        <button type="submit" class="site-btn mt-3 mb-3">Kirim</button>
                        <?php echo form_close() ?>
                    <?php
                    }
                    ?>

                </div>
            </div>
            <?php
            if ($detail['transaksi']->status_order == '4') {
            ?>
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="checkout__order">
                            <h4>Penilaian Rating Produk</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>
                                <?php
                                foreach ($detail['pesanan'] as $key => $value) {
                                    if ($value->info_penilaian == '0') {
                                ?>
                                        <form action="<?= base_url('pesanan_saya/rating/' . $value->id_transaksi) ?>" method="POST">
                                            <li><?= $value->nama_produk ?><span>Rp. <?= number_format(($value->harga - ($value->diskon / 100 * $value->harga)) * $value->qty) ?></span>
                                                <input type="hidden" name="id" value="<?= $value->id_penilaian ?>">
                                                <input class="rating-input" type="text" name="rating" title="" />
                                            </li>
                                            <textarea class="form-control" name="review" rows="5" placeholder="Tuliskan review anda*)" required></textarea>
                                            <button class="site-btn" type="submit">Nilai</button>
                                        </form>
                                    <?php
                                    }
                                    ?>


                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

            <br>
            <form action="#">
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>
                                <?php
                                foreach ($detail['pesanan'] as $key => $value) {
                                ?>
                                    <li><?= $value->nama_produk ?> <span>Rp. <?= number_format(($value->harga - ($value->diskon / 100 * $value->harga)) * $value->qty) ?></span></li>
                                <?php
                                }
                                ?>

                            </ul>
                            <div class="checkout__order__subtotal">Subtotal <span>Rp. <?= number_format($detail['transaksi']->grand_total) ?></span></div>
                            <div class="checkout__order__total">Total <span><?= number_format($detail['transaksi']->grand_total) ?></span></div>

                            <a href="<?= base_url('pesanan_saya') ?>" class="site-btn">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Modal -->
<?php
foreach ($detail['pesanan'] as $key => $value) {
?>
    <form action="<?= base_url('pesanan_saya/rating/' . $value->id_transaksi) ?>" method="POST">
        <div class="modal fade" id="nilai<?= $value->id_produk ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Penilaian Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Masukkan Penilaian Anda Terkait Produk <?= $value->nama_barang ?></p>
                        <div id='rate-0'>
                            <input type='text' name='rating' id='rating'>
                            <input type='text' name='id' value="<?= $value->id_penilaian ?>">
                            <?php echo "<ul class='star' onMouseOut=\"resetRating('0')\">"; //untuk menampilan value dari bintang
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= 0) {
                                    $selected = "selected";
                                } else {
                                    $selected = "";
                                }
                                echo "<li class='select' class='$selected' onmouseover=\" highlightStar(this,0)\" onmouseout=\"removeHighlight(0);\" onClick=\"addRating(this,0)\">&#9733;</li>";
                            }
                            echo "<ul></div> "; ?>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="site-btn">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
    </form>
<?php
}
?>