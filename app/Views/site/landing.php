<?php
$db = db_connect();
$slide = $db->query("select * from slide")->getResultArray();
$paket = $db->query("select * from paket order by rand() limit 9")->getResultArray();
$video = $db->query("select * from post where kategori = '7' and thumbnail = '' order by rand() limit 2")->getResultArray();
$foto = $db->query("select * from post where kategori = '6' order by rand() limit 8")->getResultArray();
$testi = $db->query("select * from respon where jenis = '0' and status = '1' order by waktu desc, rand() limit 9")->getResultArray();
?>
<!doctype html>
<html class="no-js" lang="zxx">
<?php echo view('site/ahead') ?>
<body>
    <?php echo view('site/aheader') ?>
    <div class="slider-area">
        <div class="slider-active owl-dot-style owl-carousel">
            <?php foreach ($slide as $s) {?>
                <div class="single-slider ptb-240 bg-img" style="background-image:url(<?php echo base_url('assets/gambar/slide/'.$s['thumbnail']) ?>);object-fit: cover;height: 810px;">
                    <div class="container">
                        <div class="slider-content slider-animated-1">
                            <h1 class="animated"><?php echo $s['tagline'] ?></h1>
                            <p><?php echo $s['caption'] ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="product-area bg-image-1 pt-100 pb-95">
        <div class="container">
            <div class="featured-product-active hot-flower owl-carousel product-nav">
                <?php
                foreach ($paket as $p) {
                    $harga = $db->query("select harga from harga where jenis = '0' and idpaket = '".$p['idpaket']."'")->getRowArray()['harga'];
                    ?>
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="<?php echo base_url('masuk') ?>">
                                <img alt="" src="<?php echo base_url('assets/gambar/thumbnail/'.$p['thumbnail']) ?>" style="object-fit: cover;height: 200px;">
                            </a>
                        </div>
                        <div class="product-content text-left">
                            <div class="product-hover-style">
                                <div class="product-title">
                                    <h4>
                                        <a href="<?php echo base_url('masuk') ?>"><?php echo substr($p['paket'],0,50) ?>...</a>
                                    </h4>
                                </div>
                                <div class="cart-hover">
                                    <h4><a href="<?php echo base_url('masuk') ?>">+ Masuk/Daftar untuk memesan</a></h4>
                                </div>
                            </div>
                            <div class="product-price-wrapper">
                                <span>Rp.<?php echo number_format((float)$harga) ?></span>
                                <span class="product-price-old">Rp.<?php echo number_format((float)($harga*110/100)) ?> </span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="banner-area pt-100 pb-70">
        <div class="container">
            <div class="banner-wrap">
                <div class="row">
                    <?php foreach ($video as $v) {?>
                        <div class="col-lg-6 col-md-6">
                            <div class="single-banner img-zoom mb-30">
                                <a href="<?php echo base_url('video/d/'.$v['idpost']) ?>">
                                    <?php $thumbnail = $db->query("select thumbnail from thumbnail where idpost = '".$v['idpost']."'")->getRowArray()['thumbnail'];?>
                                    <video style="object-fit: cover;width: 100%;"><source src="<?php echo base_url('/assets/video/'.$thumbnail) ?>" type=""/>
                                    </video>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="product-area gray-bg pt-90 pb-65">
        <div class="container">
            <div class="product-top-bar section-border mb-55">
                <div class="section-title-wrap text-center">
                    <h3 class="section-title">Dokumentasi Foto Kegiatan</h3>
                </div>
            </div>
            <div class="tab-content jump">
                <div class="tab-pane active">
                    <div class="featured-product-active owl-carousel product-nav">
                        <?php
                        foreach ($foto as $f) {
                            $thumbnail = $db->query("select thumbnail from thumbnail where idpost = '".$f['idpost']."' order by rand() limit 1")->getRowArray()['thumbnail'];
                            ?>
                            <div class="product-wrapper-single">
                                <div class="product-wrapper mb-30">
                                    <div class="product-img">
                                        <a href="<?php echo base_url('foto/d/'.$f['idpost']) ?>">
                                            <img alt="" src="<?php echo base_url('assets/gambar/thumbnail/'.$thumbnail) ?>" style="object-fit: cover;height: 200px;">
                                        </a>
                                    </div>
                                    <div class="product-content text-left">
                                        <div class="product-hover-style">
                                            <div class="product-title">
                                                <h4>
                                                    <a href="<?php echo base_url('foto/d/'.$f['idpost']) ?>"><?php echo substr($f['judul'],0,50) ?>...</a>
                                                </h4>
                                            </div>
                                            <div class="cart-hover">
                                                <h4><a href="<?php echo base_url('foto/d/'.$f['idpost']) ?>">Lihat Selengkapnya</a></h4>
                                            </div>
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
    <!-- New Products End -->
    <!-- Testimonial Area Start -->
    <div class="testimonials-area bg-img pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="testimonial-active owl-carousel">
                        <?php foreach ($testi as $t) {?>
                            <div class="single-testimonial text-center">
                                <p><?php echo $t['respon'] ?></p>
                                <h4><?php echo $t['nama'] ?></h4>
                                <?php if($t['idpengguna'] == '0'){ ?>
                                    <h5><?php echo $t['alamat'] ?></h5>
                                    <?php
                                }else{
                                    $p = $db->query("select * from pengguna where idpengguna = '".$t['idpengguna']."'")->getRowArray();
                                    ?>
                                    <h5><?php echo $p['alamat'] ?></h5>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo view('site/afooter') ?>
    <?php echo view('site/ascript') ?>
</body>
</html>