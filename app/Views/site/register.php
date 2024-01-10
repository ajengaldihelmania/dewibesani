<!doctype html>
<html class="no-js" lang="zxx">
<?php echo view('site/ahead') ?>
<body>
    <?php echo view('site/aheader') ?>
    <div class="breadcrumb-area bg-image-3 ptb-150">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h3>DAFTAR</h3>
                <ul>
                    <li><a href="<?php echo base_url('') ?>">Beranda</a></li>
                    <li class="active">Daftar Akun</li>
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
                                <h4> Daftar Akun Sistem </h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div id="lg2" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <p style="text-align: center;">
                                            Buat akun akses sistem terlebih dahulu untuk bisa masuk dan memesan tiket Wisata kami
                                            <br><code style="color: red;"><?php echo session()->getFlashData('gagal') ?></code>
                                        </p>
                                        <form action="<?php echo base_url('register') ?>" method="post">
                                            <input type="text" name="nama" placeholder="Nama Lengkap" required autofocus>
                                            <input type="radio" id="pria" name="jekel" value="Pria" checked style="height:10px; width:10px">&nbsp;&nbsp;<label for="pria">Pria</label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="wanita" name="jekel" value="Wanita" style="height:10px; width:10px">&nbsp;&nbsp;<label for="wanita">Wanita</label>
                                            <input type="password" name="password" minlength="6" placeholder="Password Akun" required>
                                            <input name="telepon" placeholder="Nomor WhatsApp (Verifikasi OTP)" type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="14" required />
                                            <p style="text-align: justify;">Sudah memiliki akun? silahkan akses akun anda <a href="<?php echo base_url('masuk') ?>">disini</a></p>
                                            <div class="button-box">
                                                <button type="submit"><span>Daftar</span></button>
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