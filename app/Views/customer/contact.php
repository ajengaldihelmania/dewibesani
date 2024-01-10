<!doctype html>
<html class="no-js" lang="zxx">
<?php echo view('customer/ahead') ?>
<body>
    <?php echo view('customer/aheader') ?>
    <div class="breadcrumb-area bg-image-3 ptb-150">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h3>KONTAK</h3>
                <ul>
                    <li><a href="<?php echo base_url('') ?>">Beranda</a></li>
                    <li class="active">Kontak Kami</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="contact-us ptb-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="small-title mb-30">
                        <h2>Kirim Masukan</h2>
                        <p>Kirimkan saran dan kritik anda tentang <?php echo $data['nama'] ?> sebagai pengembangan berkelanjutan kami yang lebih baik dalam pengelolaan maupun pelayanan</p>
                    </div>
                    <form id="contact-form" action="" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="contact-form-style mb-20">
                                    <input name="name" placeholder="Nama Lengkap" type="text" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="contact-form-style mb-20">
                                    <input name="kontak" placeholder="Email atau Telepon" type="text" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="contact-form-style">
                                    <textarea name="isi" placeholder="Tuliskan Masukan Anda" rows="10" style="resize: none;" required></textarea>
                                    <button class="submit" type="submit">KIRIM MASUKAN</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <p class="form-messege"></p>
                </div>
                <div class="col-lg-6">
                    <div class="small-title mb-30">
                        <h2>Kontak Kami</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="contact-information mb-30">
                                <h4>Sekretariat</h4>
                                <p><?php echo $data['alamat'] ?></p>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="contact-information contact-mrg mb-30">
                                <h4>Telepon</h4>
                                <p>
                                    <a href="https://wa.me/<?php echo $data['telepon'] ?>" target="blank"><?php echo $data['telepon'] ?></a>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="contact-information contact-mrg mb-30">
                                <h4>Email dan Situs</h4>
                                <p>
                                    <a href="mailto:<?php echo $data['email'] ?>" target="blank"><?php echo $data['email'] ?></a>
                                    <a href="<?php echo $data['situs'] ?>" target="blank"><?php echo $data['situs'] ?></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contact Address Strat -->
                <!-- Google Map Start -->
                <div class="col-md-12">
                    <div id="store-location">
                        <div class="contact-map pt-80">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d985.8163497351372!2d109.85263808406371!3d-7.091887875347791!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMDUnMzAuOSJTIDEwOcKwNTEnMTAuMCJF!5e1!3m2!1sid!2sid!4v1698231566913!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                <!-- Google Map Start -->
            </div>
        </div>
    </div>
    <?php echo view('customer/afooter') ?>
    <?php echo view('customer/ascript') ?>
</body>
</html>