<?php
$db = db_connect();
?>
<!doctype html>
<html class="no-js" lang="zxx">
<?php echo view('customer/ahead') ?>
<body>
    <?php echo view('customer/aheader') ?>
    <div class="breadcrumb-area bg-image-3 ptb-150">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h3>PESANAN</h3>
                <ul>
                    <li><a href="<?php echo base_url('') ?>">Beranda</a></li>
                    <li class="active">Daftar Pesanan</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="contact-us ptb-95">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-12">
                    <div class="shop-topbar-wrapper">
                        <div class="shop-topbar-left">
                            <ul class="view-mode">
                                <li><a href="#product-grid" data-view="product-grid"><i class="fa fa-th"></i></a></li>
                                <li class="active"><a href="#product-list" data-view="product-list"><i class="fa fa-list-ul"></i></a></li>
                            </ul>
                            <p>Menampilkan <?php echo number_format(count($data)) ?> data  </p>
                        </div>
                        <div class="product-sorting-wrapper">
                            <div class="product-show shorting-style">
                                <label>Tampilkan Sesuai:</label>
                                <select>
                                    <option value="">Tanggal</option>
                                    <option value="">Paket</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="grid-list-product-wrapper">
                        <div class="product-list product-view pb-20">
                            <div class="row">
                                <?php
                                foreach ($data as $d) {
                                    $paket = $db->query("select * from paket where idpaket = '".$d['idpaket']."'")->getRowArray();
                                    ?>
                                    <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <a href="<?php echo base_url('c/pesanan/d/'.$d['idtiket']) ?>">
                                                    <img alt="" src="<?php echo base_url('assets/gambar/thumbnail/'.$paket['thumbnail']) ?>">
                                                </a>
                                                <div class="product-action">
                                                    <a class="action-cart" href="<?php echo base_url('c/pesanan/d/'.$d['idtiket']) ?>" title="Lihat Detail Pesanan">
                                                        <i class="ion-ios-shuffle-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content text-left">
                                                <div class="product-hover-style">
                                                    <div class="product-title">
                                                        <h4>
                                                            <a href="<?php echo base_url('c/pesanan/d/'.$d['idtiket']) ?>"><?php echo $paket['paket'] ?></a>
                                                        </h4>
                                                    </div>
                                                    <div class="cart-hover">
                                                        <h4><a href="<?php echo base_url('c/pesanan/d/'.$d['idtiket']) ?>">Lihat Detail</a></h4>
                                                    </div>
                                                </div>
                                                <div class="product-price-wrapper">
                                                    <span><?php echo "Rp".number_format($d['total']) ?></span>
                                                    <?php
                                                    if($d['status'] == ''){
                                                        echo "[Selesai]";
                                                    }else if($d['status'] == '0'){
                                                        echo "[Verifikasi Jadwal]";
                                                    }else if($d['status'] == '1'){
                                                        echo "[Bayar]";
                                                    }else if($d['status'] == '2'){
                                                        echo "[Tidak Sesuai]";
                                                    }else if($d['status'] == '3'){
                                                        echo "[Jadwal Penuh]";
                                                    }else {
                                                        echo "[Dibatalkan]";
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="product-list-details">
                                                <h4>
                                                    <a href="<?php echo base_url('c/pesanan/d/'.$d['idtiket']) ?>"><?php echo $paket['paket'] ?></a>
                                                </h4>
                                                <div class="product-price-wrapper">
                                                    <span><?php echo "Rp".number_format($d['total']) ?></span>
                                                    <?php
                                                    if($d['status'] == ''){
                                                        echo "[Selesai]";
                                                    }else if($d['status'] == '0'){
                                                        echo "[Verifikasi Jadwal]";
                                                    }else if($d['status'] == '1'){
                                                        echo "[Bayar]";
                                                    }else if($d['status'] == '2'){
                                                        echo "[Tidak Sesuai]";
                                                    }else if($d['status'] == '3'){
                                                        echo "[Jadwal Penuh]";
                                                    }else {
                                                        echo "[Dibatalkan]";
                                                    }
                                                    ?>
                                                </div>
                                                <p><?php echo $paket['deskripsi'] ?></p>
                                                <div class="shop-list-cart-wishlist">
                                                    <a href="<?php echo base_url('c/pesanan/d/'.$d['idtiket']) ?>" title="Lihat Detail Pesanan"><i class="ion-ios-shuffle-strong"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo view('customer/afooter') ?>
        <?php echo view('customer/ascript') ?>
    </body>
    </html>