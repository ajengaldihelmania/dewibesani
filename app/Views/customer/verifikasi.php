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
                    <li class="active">Verifikasi Akun</li>
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
                                            Masukkan Kode OTP yang dikirimkan untuk memverifikasi Akun anda!
                                            <br><code style="color: red;"><?php echo session()->getFlashData('gagal') ?></code>
                                        </p>
                                        <form action="<?php echo base_url('verifikasi') ?>" method="post" class="text-center">
                                            <input type="hidden" name="id" value="<?php echo $id ?>">
                                            <?php for ($i=0; $i < 5; $i++) { ?>
                                                <input type="text" class="otp" maxlength="1" name="otp<?php echo $i ?>" minlength="1" style="width: 50px;text-align: center;font-size: 18pt;font-family: courier;font-weight: bold;color: green;" required autofocus onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                            <?php } ?>
                                            <div class="button-box">
                                                <button type="submit"><span>Verifikasi</span></button>
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
    <script type="text/javascript">
        $(".otp").keyup(function () {
            if (this.value.length == this.maxLength) {
              $(this).next('.otp').focus();
          }
      });
  </script>
</body>
</html>