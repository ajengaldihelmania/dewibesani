<!doctype html>
<html class="no-js" lang="zxx">
<?php echo view('site/ahead') ?>
<body>
    <?php echo view('site/aheader') ?>
    <div class="breadcrumb-area bg-image-3 ptb-150">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h3>MASUK</h3>
                <ul>
                    <li><a href="<?php echo base_url('') ?>">Beranda</a></li>
                    <li class="active">Masuk Akun</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="login-register-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a href="#">
                                <h4> Akses Akun Sistem </h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div id="lg2" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <p style="text-align: center;">
                                            Masukkan Username dan Password akses akun anda untuk bisa masuk dan memesan tiket Wisata kami
                                            <br><code style="color: red;"><?php echo session()->getFlashData('gagal') ?></code>
                                        </p>
                                        <form action="<?php echo base_url('getlogin') ?>" method="post">
                                            <input type="text" name="username" placeholder="Username Akun" maxlength="99" required autofocus>
                                            <input type="password" name="password" placeholder="Password Akun" required>
                                            <p style="text-align: justify;">Belum memiliki akun? silahkan daftarkan akun anda <a href="<?php echo base_url('daftar') ?>">disini</a></p>
                                            <div class="button-box">
                                                <button type="submit"><span>Masuk</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo view('site/afooter') ?>
    <?php echo view('site/ascript') ?>
</body>
</html>