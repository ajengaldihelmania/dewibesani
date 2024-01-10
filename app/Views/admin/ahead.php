<?php
$db = db_connect();
$info = $db->query("select * from profil")->getRowArray();
?>
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Administrator - <?php echo $info['nama'] ?> :: <?php echo $info['tagline'] ?></title>
   <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/pages/simple-datatables.css') ?>">
   <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/main/app.css') ?>">
   <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/main/app-dark.css') ?>">
   <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/gambar/default/'.$info['ikon']) ?>">
   <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/shared/iconly.css') ?>">
</head>