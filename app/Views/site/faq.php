<!doctype html>
<html class="no-js" lang="zxx">
<?php echo view('site/ahead') ?>
<body>
    <?php echo view('site/aheader') ?>
    <div class="breadcrumb-area bg-image-3 ptb-150">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h3>FAQ</h3>
                <ul>
                    <li><a href="<?php echo base_url('') ?>">Beranda</a></li>
                    <li class="active">Pertanyaan Umum</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="checkout-area pb-80 pt-100">
        <div class="container">
            <div class="row">
                <div class="ml-auto mr-auto col-lg-9">
                    <div class="checkout-wrapper">
                        <div id="faq" class="panel-group">
                            <?php
                            $n = 1;
                            foreach ($data as $d) {
                                ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span><?php echo $n++ ?></span> <a data-toggle="collapse" data-parent="#faq" href="#faq<?php echo $d['idfaq'] ?>"><?php echo $d['tanya'] ?> </a></h5>
                                    </div>
                                    <div id="faq<?php echo $d['idfaq'] ?>" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                                <p style="text-align: justify;"><?php echo $d['jawab'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
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