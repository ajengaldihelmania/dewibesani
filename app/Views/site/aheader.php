<?php
$db = db_connect();
$info = $db->query("select * from profil")->getRowArray();
?>
<header class="header-area gray-bg clearfix">
    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="logo">
                        <a href="<?php echo base_url('') ?>">
                            <img alt="" src="<?php echo base_url('assets/gambar/default/'.$info['logo']) ?>" width="81%">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-8 col-6">
                    <div class="header-bottom-right">
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li><a href="<?php echo base_url('') ?>">Beranda</a></li>
                                    <li><a href="<?php echo base_url('tentang') ?>">Tentang</a></li>
                                    <li><a href="<?php echo base_url('wisata') ?>">Wisata</a></li>
                                    <li class="top-hover"><a href="#">Fasilitas</a>
                                        <ul class="submenu">
                                            <li><a href="<?php echo base_url('kuliner') ?>">Kuliner</a></li>
                                            <li><a href="<?php echo base_url('homestay') ?>">Homestay</a></li>
                                            <li><a href="<?php echo base_url('fashion') ?>">Fashion</a></li>
                                            <li><a href="<?php echo base_url('kriya') ?>">Kriya</a></li>
                                        </ul>
                                    </li>
                                    <li class="top-hover"><a href="#">Galeri</a>
                                        <ul class="submenu">
                                            <li><a href="<?php echo base_url('foto') ?>">Foto</a></li>
                                            <li><a href="<?php echo base_url('video') ?>">Video</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo base_url('berita') ?>">Berita</a></li>
                                    <li><a href="<?php echo base_url('kontak') ?>">Kontak</a></li>
                                    <li><a href="<?php echo base_url('faq') ?>">FAQ</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-currency">
                            <span class="digit">Akses Akun <i class="ti-angle-down"></i></span>
                            <div class="dollar-submenu">
                                <ul>
                                    <li><a href="<?php echo base_url('daftar') ?>">Daftar</a></li>
                                    <li><a href="<?php echo base_url('masuk') ?>">Masuk</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-area">
                <div class="mobile-menu">
                    <nav id="mobile-menu-active">
                        <ul class="menu-overflow">
                            <li><a href="<?php echo base_url('') ?>">Beranda</a></li>
                            <li><a href="<?php echo base_url('tentang') ?>">Tentang</a></li>
                            <li><a href="<?php echo base_url('wisata') ?>">Wisata</a></li>
                            <li class="top-hover"><a href="#">Fasilitas</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo base_url('kuliner') ?>">Kuliner</a></li>
                                    <li><a href="<?php echo base_url('homestay') ?>">Homestay</a></li>
                                    <li><a href="<?php echo base_url('fashion') ?>">Fashion</a></li>
                                    <li><a href="<?php echo base_url('kriya') ?>">Kriya</a></li>
                                </ul>
                            </li>
                            <li class="top-hover"><a href="#">Galeri</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo base_url('foto') ?>">Foto</a></li>
                                    <li><a href="<?php echo base_url('video') ?>">Video</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url('berita') ?>">Berita</a></li>
                            <li><a href="<?php echo base_url('kontak') ?>">Kontak</a></li>
                            <li><a href="<?php echo base_url('faq') ?>">FAQ</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>