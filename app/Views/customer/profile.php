<?php
$db = db_connect();
?>
<!doctype html>
<html class="no-js" lang="zxx">
<?php echo view('customer/ahead') ?>
<body>
    <?php echo view('customer/aheader') ?>
    <div class="breadcrumb-area bg-image-3 ptb-150">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h3>PROFIL</h3>
                <ul>
                    <li><a href="<?php echo base_url('') ?>">Beranda</a></li>
                    <li class="active">Kelola Profil Akun</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="contact-us ptb-95">
        <div class="container">
            <div class="row">
                <div class="ml-auto mr-auto col-lg-9">
                    <div class="checkout-wrapper">
                        <div id="faq" class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Informasi Dasar Akun</a></h5>
                                </div>
                                <div id="my-account-1" class="panel-collapse collapse show">
                                    <div class="panel-body">
                                        <div class="billing-information-wrapper">
                                            <div class="account-info-wrapper">
                                                <h5>Detail profil akun anda</h5>
                                            </div>
                                            <form method="post" action="<?php echo base_url('c/profilubah') ?>">
                                                <input type="hidden" name="id" value="<?php echo session()->get('low') ?>">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Nama</label>
                                                            <input type="text" value="<?php echo $data['nama'] ?>" name="nama" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Alamat</label>
                                                            <input type="text" value="<?php echo $data['alamat'] ?>" name="alamat" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Telepon</label>
                                                            <input type="text" value="<?php echo $data['telepon'] ?>" name="telepon" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Email</label>
                                                            <input type="text" value="<?php echo $data['email'] ?>" name="email" required>
                                                        </div>
                                                    </div><div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Username</label>
                                                            <input type="text" value="<?php echo $data['username'] ?>" name="username" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit">Simpan Perubahan</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Ubah Password </a></h5>
                                </div>
                                <div id="my-account-2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="billing-information-wrapper">
                                            <div class="account-info-wrapper">
                                                <h4>Ubah Password Akun</h4>
                                                <h5>Kelola password akses anda</h5>
                                            </div>
                                            <form method="post" action="<?php echo base_url('c/aksesubah') ?>">
                                                <input type="hidden" name="id" value="<?php echo session()->get('low') ?>">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Password Lama</label>
                                                            <input type="password" name="p1" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Password Baru</label>
                                                            <input type="password" name="p2" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Ulangi Password Baru</label>
                                                            <input type="password" name="p3" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit">Simpan Perubahan</button>
                                                    </div>
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
    </div>
    <?php echo view('customer/afooter') ?>
    <?php echo view('customer/ascript') ?>
</body>
</html>