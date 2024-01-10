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
                     <h3>Testimoni</h3>
                     <p class="text-subtitle text-muted">RESPON</p>
                  </div>
                  <div class="col-12 col-md-6 order-md-2 order-first">
                     <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Dashboard</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Testimoni</li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
            <section class="section">
               <div class="card">
                  <div class="card-body">
                     <p style="text-align: justify;">pilih tombol <code><i class="bi bi-pencil-square"></i></code> untuk menampilkan detail dan mengubah data</p>
                     <table class="table" id="table1">
                        <thead>
                           <tr>
                              <th width="5%">#</th>
                              <th>Testimoni</th>
                              <th width="9%">**</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $n = 1;
                           foreach ($data as $d) {?>
                              <tr <?php if($d['status'] == '0'){echo "style='background-color:rgba(255,213,0,0.1)'";} ?>>
                                 <td><?php echo $n++ ?></td>
                                 <td><?php echo substr($d['respon'],0,100) ?>...</td>
                                 <td>
                                    <a href="#d<?php echo $d['idrespon'] ?>" class="btn btn-sm btn-warning" data-bs-toggle="modal" title="Klik untuk ubah data"><i class="bi bi-pencil-square"></i></a>
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
   <?php echo view('operator/ascript') ?>
</body>
<?php foreach ($data as $d) {?>
   <div class="modal fade text-left modal-borderless" id="d<?php echo $d['idrespon'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Ubah Detail Data</h5>
               <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i>
               </button>
            </div>
            <form action="<?php echo base_url('o/testimoniubah') ?>" method="post">
               <input type="hidden" name="id" value="<?php echo $d['idrespon'] ?>">
               <?php if($d['status'] == '0'){ ?>
                  <input type="hidden" name="status" value="1">
               <?php }else{ ?>
                  <input type="hidden" name="status" value="0">
               <?php } ?>
               <div class="modal-body">
                  <p style="text-align: justify;">
                     <b>Pengirim :</b><br>
                     <?php if($d['idpengguna'] == '0'){ ?>
                        <?php echo $d['nama'] ?><br>
                        <small><?php echo $d['email'] ?></small><br>
                        <i><?php echo $d['alamat'] ?></i>
                     <?php }else{
                        $p = $db->query("select * from pengguna where idpengguna = '".$d['idpengguna']."'")->getRowArray();
                        ?>
                     <?php } ?>
                     <hr>
                     <i style="font-size: 10pt;">"<?php echo $d['respon'] ?>"</i>
                  </p>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-grey" data-bs-dismiss="modal"><i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Batal</span></button>
                  <button type="submit" class="btn btn-sm btn-success"><i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">
                     <?php
                     if($d['status'] == '0'){
                        echo "Tampilkan Respon";
                     }else{
                        echo "Sembunyikan Respon";
                     }
                     ?>
                  </span></button>
               </div>
            </form>
         </div>
      </div>
   </div>
<?php } ?>
</html>