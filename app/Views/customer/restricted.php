<?php
$db = db_connect();
$info = $db->query("select * from profil")->getRowArray();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator - <?php echo $info['nama'] ?> :: <?php echo $info['tagline'] ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/gambar/default/'.$info['ikon']) ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/main/app.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/pages/auth.css') ?>">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo text-center">
                        <a href="<?php echo base_url('') ?>"><img src="<?php echo base_url('assets/gambar/default/'.$info['logo']) ?>" style="height: 90px;"></a>
                    </div>
                    <p class="auth-subtitle mb-5">Masukkan Username dan Password akses sistem</p>

                    <form action="<?php echo base_url('getin') ?>" method="post">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Username" name="username" maxlength="99" autofocus required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password" name="password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Akses Masuk</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <?php if(session()->getFlashData('gagal')){ ?>
                            <p class="text-gray-600"><?php echo session()->getFlashData('gagal') ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>
