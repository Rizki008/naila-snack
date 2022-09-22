<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a>
                    <span><?= $title ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            </div>
        </div>
        <?php
        //notifikasi form kosong
        echo validation_errors('<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-exclamation-triangle"></i>', '</h5></div>');

        //notifikasi gagal upload gambar
        if (isset($error_upload)) {
            echo '<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-exclamation-triangle"></i>' . $error_upload . '</h5></div>';
        }
        echo form_open_multipart('pesanan_saya/bayar/' . $pesanan->id_transaksi)
        ?>
        <div class="row">
            <div class="col-lg-8">
                <h5><?= $title ?></h5>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="checkout__form__input">
                            <p>Atas Nama <span>*</span></p>
                            <input type="text" class="form-control" name="id_pelanggan" value="<?= $this->session->userdata('nama_pelanggan') ?>">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="checkout__form__input">
                            <p>Nama Bank<span>*</span></p>
                            <input type="text" class="form-control" name="nama_bank" value="<?= set_value('nama_bank') ?>">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="checkout__form__input">
                            <p>Bukti Bayar <span>*</span></p>
                            <input type="file" class="form-control" name="bukti_bayar">
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <button type="submit" class="site-btn">Upload Bukti Bayar</button>
            </div>
            <div class="col-lg-4">
                <div class="checkout__order">
                    <h5>Pembayaran Ke Rekening</h5>
                    <div class="checkout__order__total">
                        <?php foreach ($rekening as $key => $value) { ?>
                            <ul>
                                <li>Atas Nama <span><?= $value->atas_nama ?></span></li>
                                <li>Nama Bank <span><?= $value->nama_bank ?></span></li>
                                <li>No Rekening <span><?= $value->no_rek ?></span></li>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</section>
<!-- Checkout Section End -->