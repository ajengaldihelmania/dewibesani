<?php
$db = db_connect();
date_default_timezone_set("Asia/Bangkok");
$user = $db->query("select * from pengguna where idpengguna = '".session()->get('high')."'")->getRowArray();
$fp = base_url('assets/gambar/profil/'.$user['foto']);
if($user['foto'] == ''){
   $fp = base_url('assets/gambar/default/'.$user['jekel'].'.png');
}
$d1 = $db->query("select count(*) as jumlah from paket")->getRowArray()['jumlah'];
$d2 = $db->query("select count(*) as jumlah from post")->getRowArray()['jumlah'];
$d3 = $db->query("select count(*) as jumlah from respon")->getRowArray()['jumlah'];
$periode = date('Y');
$cek = $db->query("select count(*) as jumlah from tiket")->getRowArray()['jumlah'];
if($cek > 0){
   $periode = $db->query("select year(waktu) as periode from tiket")->getRowArray()['periode'];
}
if($tahun == date('Y')){
   $p1 = $db->query("select sum(kuota) as jumlah from tiket where date(waktu) = '".date('Y-m-d')."'")->getRowArray()['jumlah'];
   $p2 = $db->query("select avg(kuota) as jumlah from tiket where date(waktu) <= '".date('Y-m-d')."' and year(waktu) >= '".$tahun."'")->getRowArray()['jumlah'];
   $p3 = $db->query("select sum(kuota) as jumlah from tiket where date(waktu) <= '".date('Y-m-d')."' and year(waktu) >= '".$tahun."'")->getRowArray()['jumlah'];
   $p4 = $db->query("select sum(total) as jumlah from tiket where date(waktu) <= '".date('Y-m-d')."' and year(waktu) >= '".$tahun."'")->getRowArray()['jumlah'];
}else{
   $p1 = $db->query("select sum(kuota) as jumlah from tiket where date(waktu) = '".$tahun.date('-m-d')."'")->getRowArray()['jumlah'];
   $p2 = $db->query("select avg(kuota) as jumlah from tiket where year(waktu) = '".$tahun."'")->getRowArray()['jumlah'];
   $p3 = $db->query("select sum(kuota) as jumlah from tiket where year(waktu) = '".$tahun."'")->getRowArray()['jumlah'];
   $p4 = $db->query("select sum(total) as jumlah from tiket where year(waktu) = '".$tahun."'")->getRowArray()['jumlah'];
}
?>
<!DOCTYPE html>
<html lang="en">
<?php echo view('admin/ahead') ?>
<body>
   <div id="app">
      <?php echo view('admin/asidebar') ?>
      <div id="main">
         <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
               <i class="bi bi-justify fs-3"></i>
            </a>
         </header>
         <div class="page-content">
            <section class="row">
               <div class="col-12">
                  <div class="card">
                     <div class="card-header">
                        <h4>Statistik Data</h4>
                     </div>
                  </div>
               </div>
               <div class="col-12 col-lg-12">
                  <div class="row">
                     <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                           <div class="card-body px-3 py-4-5">
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="stats-icon purple">
                                       <i class="fa fa-trash"></i>
                                    </div>
                                 </div>
                                 <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Paket Wisata</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo number_format((float)$d1).' data' ?></h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                           <div class="card-body px-3 py-4-5"> 
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="stats-icon blue">
                                    </div>
                                 </div>
                                 <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Postingan</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo number_format((float)$d2).' data' ?></h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                           <div class="card-body px-3 py-4-5">
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="stats-icon green">
                                    </div>
                                 </div>
                                 <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Masukan dan Testimoni</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo number_format((float)$d3).' data' ?></h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                           <div class="card-body px-3 py-4-5">
                              <div class="row">
                                 <div class="col-md-3">
                                    <div class="avatar avatar-lg align-items-center">
                                       <img src="<?php echo $fp ?>" alt="Face 1">
                                    </div>
                                 </div>
                                 <div class="col-md-9">
                                    <h5 class="font-bold"><?php echo $user['nama'] ?></h5>
                                    <h6 class="text-muted mb-0">@<?php echo $user['username'] ?></h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-12">
                  <div class="card">
                     <div class="card-header">
                        <form action="<?php echo base_url('a/statistik') ?>" method="post" enctype="multipart/form-data" style="float: right;">
                           <div class="form-group">
                              <select class="form-control" name="tahun" required onchange="this.form.submit();">
                                 <?php for ($i=2020; $i <= date('Y') ; $i++) {?>
                                    <option <?php if($tahun == $i){echo "selected";} ?>><?php echo $i ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </form>
                        <h4 class="col-6">Statistik Kunjungan Tahun <?php echo $tahun ?></h4>
                     </div>
                  </div>
               </div>
               <div class="col-12 col-lg-12">
                  <div class="row">
                     <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                           <div class="card-body px-3 py-4-5">
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="stats-icon purple">
                                       <i class="fa fa-trash"></i>
                                    </div>
                                 </div>
                                 <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Kunjungan Hari Ini</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo number_format((float)$p1).' pengunjung' ?></h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                           <div class="card-body px-3 py-4-5">
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="stats-icon purple">
                                       <i class="fa fa-trash"></i>
                                    </div>
                                 </div>
                                 <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Rerata Kunjungan Harian</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo number_format((float)$p2).' pengunjung' ?></h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                           <div class="card-body px-3 py-4-5">
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="stats-icon purple">
                                       <i class="fa fa-trash"></i>
                                    </div>
                                 </div>
                                 <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Total Pengunjung</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo number_format((float)$p3).' pengunjung' ?></h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                           <div class="card-body px-3 py-4-5">
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="stats-icon purple">
                                       <i class="fa fa-trash"></i>
                                    </div>
                                 </div>
                                 <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Total Pendapatan</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo "Rp.".number_format((float)$p4) ?></h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-6 col-lg-9 col-md-6">
                        <div class="card">
                           <div class="card-body">
                              <div id="chart-profile-visit"></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                           <div class="card-body">
                              <div id="chart-visitors-profile"></div>  
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>
   <?php echo view('admin/ascript') ?>
</body>
</html>