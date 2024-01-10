<?php
$db = db_connect();
$info = $db->query("select * from profil")->getRowArray();
?>
<footer class="footer-area pt-75 gray-bg-3">
    <div class="footer-top gray-bg-3 pb-35">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title mb-25">
                            <h4>Informasi</h4>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li><a href="<?php echo base_url('c/tentang') ?>">Tentang <?php echo $info['nama'] ?></a></li>
                                <li><a href="<?php echo base_url('c/visimisi') ?>">Visi Misi</a></li>
                                <li><a href="<?php echo base_url('c/fasilitas') ?>">Fasilitas</a></li>
                                <li><a href="<?php echo base_url('c/sk') ?>">Syarat dan Ketentuan</a></li>
                                <li><a href="<?php echo base_url('c/bantuan') ?>">Bantuan Sistem</a></li>
                                <li><a href="<?php echo base_url('c/faq') ?>">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title mb-25">
                            <h4>Akses Pengguna</h4>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li><a href="<?php echo base_url('c/pesanan') ?>">Pesanan</a></li>
                                <li><a href="<?php echo base_url('c/profil') ?>">Profil</a></li>
                                <li><a href="<?php echo base_url('c/testimoni') ?>">Testimoni</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title mb-25">
                            <h4>Media Sosial</h4>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li><a href="https://www.facebook.com/<?php echo $info['fb'] ?>" target="blank"><i class="fa fa-facebook-square"></i> <?php echo $info['fb'] ?></a></li>
                                <li><a href="https://www.instagram.com/<?php echo $info['ig'] ?>" target="blank"><i class="fa fa-instagram"></i> <?php echo $info['ig'] ?></a></li>
                                <li><a href="https://www.youtube.com/@<?php echo $info['yt'] ?>" target="blank"><i class="fa fa-youtube"></i> <?php echo $info['yt'] ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget footer-widget-red footer-black-color mb-40">
                        <div class="footer-title mb-25">
                            <h4>Kontak Kami</h4>
                        </div>
                        <div class="footer-about">
                            <p><?php echo $info['alamat'] ?></p>
                            <div class="footer-contact mt-20">
                                <ul>
                                    <li><a href="https://wa.me/<?php echo $info['telepon'] ?>" target="blank"><i class="fa fa-whatsapp"></i> <?php echo $info['telepon'] ?></a></li>
                                    <li><a href="mailto:<?php echo $info['email'] ?>" target="blank"><i class="fa fa-envelope"></i> <?php echo $info['email'] ?></a></li>
                                    <li><a href="<?php echo $info['situs'] ?>" target="blank"><i class="fa fa-globe"></i> <?php echo $info['nama'] ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>