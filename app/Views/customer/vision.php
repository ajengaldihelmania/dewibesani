<!doctype html>
<html class="no-js" lang="zxx">
<?php echo view('customer/ahead') ?>
<body>
    <?php echo view('customer/aheader') ?>
    <div class="breadcrumb-area bg-image-3 ptb-150">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h3>VISI MISI</h3>
                <ul>
                    <li><a href="<?php echo base_url('') ?>">Beranda</a></li>
                    <li class="active">Visi Misi <?php echo $data['nama'] ?></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="about-us-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 d-flex align-items-center">
                    <div class="overview-content-2">
                        <p class="peragraph-blog">
                            <h4>Visi</h4>
                            <?php echo '"'.nl2br($data['visi']).'"' ?>
                            <br><br><br>
                            <h4>Misi</h4>
                            <?php echo nl2br($data['misi']) ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo view('customer/afooter') ?>
    <?php echo view('customer/ascript') ?>
</body>
</html>