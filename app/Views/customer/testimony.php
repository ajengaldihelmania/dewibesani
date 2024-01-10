<?php
$db = db_connect();
$p = $db->query("select * from pengguna where idpengguna = '".session()->get('low')."'")->getRowArray();
?>
<!doctype html>
<html class="no-js" lang="zxx">
<?php echo view('customer/ahead') ?>
<body>
    <?php echo view('customer/aheader') ?>
    <div class="breadcrumb-area bg-image-3 ptb-150">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h3>TESTIMONI</h3>
                <ul>
                    <li><a href="<?php echo base_url('') ?>">Beranda</a></li>
                    <li class="active">Testimoni Layanan dan Produk</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="contact-us ptb-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Testimoni</th>
                                    <th>**</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $n = 1;
                                foreach ($data as $d) {
                                    ?>
                                    <tr>
                                        <td><?php echo $n++ ?></td>
                                        <td style="text-align: justify;"><?php echo $d['respon'] ?></td>
                                        <td class="product-remove">
                                            <a href="<?php echo base_url('c/testimoni/d/'.$d['idrespon']) ?>"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="<?php echo base_url('c/testimoni/s') ?>" method="post">
                        <input type="hidden" name="nama" value="<?php echo $p['nama'] ?>">
                        <input type="hidden" name="email" value="<?php echo $p['email'] ?>">
                        <input type="hidden" name="alamat" value="<?php echo $p['alamat'] ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="contact-form-style">
                                    <textarea name="respon" style="resize: none;height: 100px;" placeholder="Testimoni Layanan dan Produk" required></textarea>
                                    <button class="submit" type="submit">KIRIM TESTIMONI</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php echo view('customer/afooter') ?>
    <?php echo view('customer/ascript') ?>
</body>
</html>