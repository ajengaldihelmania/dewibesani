<?php
$db = db_connect();
?>
<!doctype html>
<html class="no-js" lang="zxx">
<?php echo view('site/ahead') ?>
<body>
    <?php echo view('site/aheader') ?>
    <div class="breadcrumb-area bg-image-3 ptb-150">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h3>TENTANG</h3>
                <ul>
                    <li><a href="<?php echo base_url('') ?>">Beranda</a></li>
                    <li class="active">Tentang <?php echo $data['nama'] ?></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="about-us-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 d-flex align-items-center">
                    <div class="overview-content-2">
                        <h4>Selamat Datang di</h4>
                        <h2><?php echo $data['nama'] ?></h2>
                        <p class="peragraph-blog"><?php echo nl2br($data['tentang']) ?></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="overview-img text-center">
                        <div class="clearfix mt-80"></div>
                        <a href="#">
                            <img src="<?php echo base_url('assets/gambar/default/'.$data['thumbnail']) ?>" alt="Candidate Signature">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <div class="team-area pt-95 pb-70">
        <div class="container">
            <div class="product-top-bar section-border mb-50">
                <div class="section-title-wrap style-two text-center">
                    <h3 class="section-title">Pengelola</h3>
                </div>
            </div>
            <div class="row">
                <?php
                foreach ($pengelola as $p) {
                    $thumb = base_url('assets/gambar/profil/'.$p['foto']);
                    if($p['foto'] == ''){
                        $thumb = base_url('assets/gambar/default/'.$p['jekel'].'.png');
                    }
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="team-wrapper mb-30">
                            <div class="team-img">
                                <img src="<?php echo $thumb ?>" alt="">
                                <div class="team-action">
                                    <?php if($p['fb'] != ''){ ?>
                                        <a class="action-cart" href="https://www.facebook.com/<?php echo $p['fb'] ?>" target="blank" style="background-color: #1977f3;">
                                            <i class="fa fa-facebook-square"></i>
                                        </a>
                                    <?php } ?>
                                    <?php if($p['tw'] != ''){ ?>
                                        <a class="action-cart" href="https://twitter.com/<?php echo $p['tw'] ?>" target="blank" style="background-color:#1d9bf0;">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    <?php } ?>
                                    <?php if($p['ig'] != ''){ ?>
                                        <a class="action-cart" href="https://www.instagram.com/<?php echo $p['ig'] ?>" target="blank" style="background-color: #fd6314;">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    <?php } ?>
                                    <?php if($p['wa'] != ''){ ?>
                                        <a class="action-cart" href="https://wa.me/<?php echo $p['wa'] ?>" target="blank" style="background-color: #40c351;">
                                            <i class="fa fa-whatsapp"></i>
                                        </a>
                                    <?php } ?>
                                    <?php if($p['email'] != ''){ ?>
                                        <a class="action-cart" href="mailto:<?php echo $p['email'] ?>" target="blank" style="background-color: #f14336;">
                                            <i class="fa fa-envelope"></i>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h4><?php echo $p['nama'] ?></h4>
                                <span><?php echo $p['jabatan'] ?> </span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php echo view('site/afooter') ?>
    <?php echo view('site/ascript') ?>
</body>
</html>