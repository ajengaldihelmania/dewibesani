<?php
$db = db_connect();
?>
<!DOCTYPE html>
<html lang="en">
<?php echo view('operator/ahead') ?>
<body>
   <div id="app">
      <?php echo view('operator/asidebar') ?>
      <div id="main">
         <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
               <i class="bi bi-justify fs-3"></i>
            </a>
         </header>
         <div class="page-heading">
            <div class="page-title">
               <div class="row">
                  <div class="col-12 col-md-6 order-md-1 order-last">
                     <h3>Data Pesanan</h3>
                     <p class="text-subtitle text-muted">LAPORAN</p>
                  </div>
                  <div class="col-12 col-md-6 order-md-2 order-first">
                     <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Dashboard</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Data Pesanan</li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
            <section class="section">
               <div class="card">
                  <div class="card-body">
                     <form method="post" action="<?php echo base_url('o/laporanpesanantampil') ?>" style="float: right;">
                        <div class="input-group">
                           <input type="date" class="form-control form-control-sm" name="dari" value="<?php echo date('Y-m-d', strtotime($dari)) ?>" onchange="this.form.submit();">
                           <input type="date" class="form-control form-control-sm" name="sampai" value="<?php echo date('Y-m-d', strtotime($sampai)) ?>" onchange="this.form.submit();">
                           <a href="<?php echo base_url('o/laporanpesanancetak/'.$dari.'_'.$sampai) ?>" target="blank" class="btn btn-primary btn-sm">Cetak Data</a>
                        </div>
                     </form>
                     <p style="text-align: justify;">pilih periode laporan, lalu pilih tombol <code>Cetak Data</code> untuk menampilkan laporan data siap cetak</p>
                     <table class="table" id="table1">
                        <thead>
                           <tr>
                              <th width="5%">#</th>
                              <th width="9%">Tanggal</th>
                              <th>Paket</th>
                              <th width="9%">Total</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $n = 1;
                           foreach ($data as $d) {
                              $paket = $db->query("select paket from paket where idpaket = '".$d['idpaket']."'")->getRowArray()['paket'];
                              ?>
                              <tr>
                                 <td><?php echo $n++ ?></td>
                                 <td><?php echo date('d/m/Y', strtotime($d['waktu'])) ?></td>
                                 <td><?php echo $paket ?></td>
                                 <td><?php echo "Rp.".number_format((float)$d['total']) ?></td>
                              </tr>
                           <?php } ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>
   <?php echo view('operator/ascript') ?>
</body>
</html>