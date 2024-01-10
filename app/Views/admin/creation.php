<?php
$db = db_connect();
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
         <div class="page-heading">
            <div class="page-title">
               <div class="row">
                  <div class="col-12 col-md-6 order-md-1 order-last">
                     <h3>Kriya</h3>
                     <p class="text-subtitle text-muted">POSTINGAN</p>
                  </div>
                  <div class="col-12 col-md-6 order-md-2 order-first">
                     <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Dashboard</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Kriya</li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
            <section class="section">
               <div class="card">
                  <div class="card-body">
                     <p style="text-align: justify;">pilih tombol <code><i class="bi bi-box-arrow-up-right"></i></code> untuk menampilkan detail data</i></code></p>
                     <table class="table" id="table1">
                        <thead>
                           <tr>
                              <th width="5%">#</th>
                              <th width="27%">Judul</th>
                              <th>Konten</th>
                              <th width="18%">Penulis</th>
                              <th width="9%">**</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $n = 1;
                           foreach ($data as $d) {
                              $creator = $db->query("select nama from pengguna where idpengguna = '".$d['idpengguna']."'")->getRowArray()['nama'];
                              $comment = $db->query("select count(*) as jumlah from komentar where idpost = '".$d['idpost']."'")->getRowArray()['jumlah'];
                              ?>
                              <tr <?php if($d['status'] == '0'){echo "style='background-color:rgba(235,64,52,0.3)'";} ?>>
                                 <td><?php echo $n++ ?></td>
                                 <td><?php echo $d['judul'] ?></td>
                                 <td>
                                    <?php
                                    echo substr($d['isi'],0,126)."...<br>";
                                    echo "<small><i>".$d['tag']."<br>".number_format($comment)." komentar</i></small>";
                                    ?>
                                 </td>
                                 <td><?php echo $creator ?></td>
                                 <td>
                                    <a href="<?php echo base_url('a/kriyadetail/'.$d['idpost']) ?>" class="btn btn-sm btn-warning" title="Klik untuk ubah data"><i class="bi bi-box-arrow-up-right"></i></a>
                                 </td>
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
   <?php echo view('admin/ascript') ?>
</body>
</html>