<?php
$db = db_connect();
$info = $db->query("select * from profil")->getRowArray();
$profil = $db->query("select * from pengguna where idpengguna = '".session()->get('low')."'")->getRowArray();
?>
<header class="header-area gray-bg clearfix">
    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="logo">
                        <a href="<?php echo base_url('c/') ?>">
                            <img alt="" src="<?php echo base_url('assets/gambar/default/'.$info['logo']) ?>" width="81%">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-8 col-6">
                    <div class="header-bottom-right">
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li><a href="<?php echo base_url('c/') ?>">Beranda</a></li>
                                    <li><a href="<?php echo base_url('c/tentang') ?>">Tentang</a></li>
                                    <li><a href="<?php echo base_url('c/wisata') ?>">Wisata</a></li>
                                    <li class="top-hover"><a href="#">Fasilitas</a>
                                        <ul class="submenu">
                                            <li><a href="<?php echo base_url('c/kuliner') ?>">Kuliner</a></li>
                                            <li><a href="<?php echo base_url('c/homestay') ?>">Homestay</a></li>
                                            <li><a href="<?php echo base_url('c/fashion') ?>">Fashion</a></li>
                                            <li><a href="<?php echo base_url('c/kriya') ?>">Kriya</a></li>
                                        </ul>
                                    </li>
                                    <li class="top-hover"><a href="#">Galeri</a>
                                        <ul class="submenu">
                                            <li><a href="<?php echo base_url('c/foto') ?>">Foto</a></li>
                                            <li><a href="<?php echo base_url('c/video') ?>">Video</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo base_url('c/berita') ?>">Berita</a></li>
                                    <li><a href="<?php echo base_url('c/kontak') ?>">Kontak</a></li>
                                    <li><a href="<?php echo base_url('c/faq') ?>">FAQ</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-currency">
                            <span class="digit"><?php echo $profil['username'] ?> <i class="ti-angle-down"></i></span>
                            <div class="dollar-submenu">
                                <ul>
                                    <li><a href="<?php echo base_url('c/pesanan') ?>">Pesanan</a></li>
                                    <li><a href="<?php echo base_url('c/profil') ?>">Profil</a></li>
                                    <li><a href="<?php echo base_url('c/testimoni') ?>">Testimoni</a></li>
                                    <li><a href="<?php echo base_url('getlogout') ?>">Log Out</a></li>
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
                            <li><a href="<?php echo base_url('c/') ?>">Beranda</a></li>
                            <li><a href="<?php echo base_url('c/tentang') ?>">Tentang</a></li>
                            <li><a href="<?php echo base_url('c/wisata') ?>">Wisata</a></li>
                            <li class="top-hover"><a href="#">Fasilitas</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo base_url('c/kuliner') ?>">Kuliner</a></li>
                                    <li><a href="<?php echo base_url('c/homestay') ?>">Homestay</a></li>
                                    <li><a href="<?php echo base_url('c/fashion') ?>">Fashion</a></li>
                                    <li><a href="<?php echo base_url('c/kriya') ?>">Kriya</a></li>
                                </ul>
                            </li>
                            <li class="top-hover"><a href="#">Galeri</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo base_url('c/foto') ?>">Foto</a></li>
                                    <li><a href="<?php echo base_url('c/video') ?>">Video</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url('c/berita') ?>">Berita</a></li>
                            <li><a href="<?php echo base_url('c/kontak') ?>">Kontak</a></li>
                            <li><a href="<?php echo base_url('c/faq') ?>">FAQ</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>