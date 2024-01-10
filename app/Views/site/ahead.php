<?php
$db = db_connect();
$info = $db->query("select * from profil")->getRowArray();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $info['nama'] ?> :: <?php echo $info['tagline'] ?></title>
    <meta name="description" content="">
    <meta name="robots" content="noindex, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/gambar/default/'.$info['ikon']) ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/situs/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/situs/css/animate.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/situs/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/situs/css/slick.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/situs/css/chosen.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/situs/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/situs/css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/situs/css/ionicons.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/situs/css/jquery-ui.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/situs/css/meanmenu.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/situs/css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/situs/css/responsive.css') ?>">
    <script src="<?php echo base_url('assets/situs/js/vendor/modernizr-2.8.3.min.js') ?>"></script>
</head>