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
                                        <p style="text-align: center;">Masukkan Username dan Password akses akun anda untuk bisa masuk dan memesan tiket Wisata kami</p>
                                        <form action="#" method="post">
                                            <input type="text" name="username" placeholder="Username Akun" maxlength="99" required>
                                            <input type="password" name="password" placeholder="Password Akun" equired>
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