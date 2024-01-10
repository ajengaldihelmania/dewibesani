<!doctype html>
<html class="no-js" lang="zxx">
<?php echo view('site/ahead') ?>
<body>
    <?php echo view('site/aheader') ?>
    <div class="breadcrumb-area bg-image-3 ptb-150">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h3>FASILITAS</h3>
                <ul>
                    <li><a href="<?php echo base_url('') ?>">Beranda</a></li>
                    <li class="active">Fasilitas <?php echo $data['nama'] ?></li>
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
                            <?php echo nl2br($data['fasilitas']) ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo view('site/afooter') ?>
    <?php echo view('site/ascript') ?>
</body>
</html>