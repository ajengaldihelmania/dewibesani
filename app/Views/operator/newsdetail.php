<?php
$db = db_connect();
?>
<!DOCTYPE html>
<html lang="en">
<?php echo view('operator/ahead') ?>
<link rel="stylesheet" href="<?php echo base_url('assets/admin/css/widgets/chat.css') ?>">
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
                  <div class="col-12 col-md-3 order-md-1 order-last">
                     <h3>Berita</h3>
                     <p class="text-subtitle text-muted">POSTINGAN</p>
                  </div>
                  <div class="col-12 col-md-9 order-md-2 order-first">
                     <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Dashboard</a></li>
                           <li class="breadcrumb-item"><a href="<?php echo base_url('o/berita') ?>">Berita</a></li>
                           <li class="breadcrumb-item active" aria-current="page"><?php echo $data['judul'] ?></li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
            <section class="section">
               <div class="row">
                  <div class="card col-7">
                     <form action="<?php echo base_url('o/beritaubah') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $data['idpost'] ?>">
                        <div class="card-body">
                           <img src="<?php echo base_url('assets/gambar/thumbnail/'.$data['thumbnail']) ?>" class="mb-4" width="100%">
                           <div class="input-group">
                              <input type="file" class="form-control form-control-sm" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="gambar" accept="image/*">
                           </div>
                           <small>pilih gambar untuk mengubah thumbnail</small>
                        </div>
                        <div class="card-body">
                           <h4 class="card-title">Detail Postingan</h4>
                           <p>masukkan perubahan detail data, lalu pilih tombol <code>Simpan Data</code> untuk menyimpan perubahan data</p>
                           <div class="form-group">
                              <label>Judul</label>
                              <input type="text" class="form-control form-control-sm" placeholder="Judul Posting" name="judul" maxlength="99" value="<?php echo $data['judul'] ?>" required>
                           </div>
                           <div class="form-group">
                              <label>Isi</label>
                              <textarea class="form-control form-control-sm" placeholder="Isi atau Konten Artikel" name="isi" rows="20" style="resize: none;" required><?php echo $data['isi'] ?></textarea>
                           </div>
                           <div class="row">
                              <div class="form-group col-8">
                                 <label>Tag</label>
                                 <input type="text" class="form-control form-control-sm" placeholder="Tag atau Kata Kunci Posting" name="tag" value="<?php echo $data['tag'] ?>" required>
                              </div>
                              <div class="form-group col-4">
                                 <label>Status</label>
                                 <select class="form-control form-control-sm" name="status" required>
                                    <option <?php if($data['status'] == '0'){echo "selected";} ?> value="0">Nonaktif</option>
                                    <option <?php if($data['status'] == '1'){echo "selected";} ?> value="1">Aktif</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="card-footer">
                           <a href="<?php echo base_url('o/berita') ?>" class="btn btn-sm btn-primary"><span class="d-none d-sm-block">Batal</span></a>
                           <button type="submit" class="btn btn-sm btn-success" style="float: right;"><i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Simpan Data</span></button>
                        </div>
                     </form>
                  </div>
                  <div class="card col-5">
                     <div class="card-header">
                        <h4 class="card-title">Komentar <?php echo count($comment) ?></h4>
                     </div>
                     <div class="card-body">
                        <form action="<?php echo base_url('o/beritakomentar') ?>" method="post">
                           <input type="hidden" name="id" value="<?php echo $data['idpost'] ?>">
                           <div class="message-form d-flex flex-direction-column">
                              <div class="d-flex col-11">
                                 <textarea class="form-control form-control-sm" placeholder="Masukkan Komentar" name="komentar" rows="3" style="resize: none;" required></textarea>
                              </div>
                              <div class="d-flex col-1">
                                 <button type="submit" class="btn btn-block btn-primary"><i class="bi bi-send"></i></button>
                              </div>
                           </div>
                        </form>
                     </div>
                     <div class="card-body" style="overflow-y: auto;max-height: 500px;">
                        <div class="card-body bg-grey">
                           <div class="chat-content">
                              <?php
                              foreach ($comment as $c) {
                                 $balasan = $db->query("select * from komentar where induk = '".$c['idkomentar']."' and idpost = '".$data['idpost']."' order by waktu desc")->getResultArray();
                                 if($c['induk'] == 0){
                                    $p = $db->query("select * from pengguna where idpengguna = '".$c['idpengguna']."'")->getRowArray();
                                    $thumb = base_url('assets/gambar/profil/'.$p['foto']);
                                    if($p['foto'] == ''){
                                       $thumb = base_url('assets/gambar/default/'.$p['jekel'].'.png');
                                    }
                                    $p = $db->query("select nama from pengguna where idpengguna = '".$c['idpengguna']."'")->getRowArray()['nama'];
                                    ?>
                                    <div class="chat chat-left">
                                       <div class="chat-body">
                                          <div class="chat-message" style="font-size: 9pt;width: 100%;">
                                             <div class="avatar bg-warning me-3">
                                                <img src="<?php echo $thumb ?>" alt="" srcset="">
                                             </div>
                                             <strong><?php echo $p ?></strong><small style="float: right;font-size: 6pt;"><?php echo date('d/m/Y H:i', strtotime($c['waktu'])) ?>&nbsp;&nbsp;<a href="#balas<?php echo $c['idkomentar'] ?>" data-bs-toggle="modal" title="Klik untuk membalas komentar" style="color: white;"><i class="bi bi-arrow-repeat" style="font-size: 1.5em;"></i></a></small><br>
                                             <?php echo nl2br($c['komentar']) ?>
                                             <?php
                                             foreach ($balasan as $b) {
                                                $p = $db->query("select * from pengguna where idpengguna = '".$b['idpengguna']."'")->getRowArray();
                                                $thumb = base_url('assets/gambar/profil/'.$p['foto']);
                                                if($p['foto'] == ''){
                                                   $thumb = base_url('assets/gambar/default/'.$p['jekel'].'.png');
                                                }
                                                $p = $db->query("select nama from pengguna where idpengguna = '".$b['idpengguna']."'")->getRowArray()['nama'];
                                                ?>
                                                <div class="chat-body">
                                                   <div class="chat-message" style="font-size: 9pt;width: 100%;">
                                                      <div class="avatar bg-warning me-3">
                                                         <img src="<?php echo $thumb ?>" alt="" srcset="">
                                                      </div>
                                                      <strong><?php echo $p ?></strong><small style="float: right;font-size: 6pt;"><?php echo date('d/m/Y H:i', strtotime($b['waktu'])) ?></small><br>
                                                      <?php echo nl2br($b['komentar']) ?>
                                                   </div>
                                                </div>
                                             <?php } ?>
                                          </div>
                                       </div>
                                    </div>
                                 <?php } ?>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                     <br><br><br><br><br>
                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>
   <?php echo view('operator/ascript') ?>
</body>
<?php foreach ($comment as $c) {?>
   <div class="modal fade" id="balas<?php echo $c['idkomentar'] ?>" tabindex="-1" role="dialog" aria-labelledby="galleryModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h6>Balas Komentar</h6>
            </div>
            <form action="<?php echo base_url('o/beritabalasan') ?>" method="post">
               <input type="hidden" name="id" value="<?php echo $data['idpost'] ?>">
               <input type="hidden" name="induk" value="<?php echo $c['idkomentar'] ?>">
               <div class="modal-body">
                  <p style="text-align: center;font-style: italic;">"<?php echo $c['komentar'] ?>"</p>
                  <div class="col-md-12 mb-1">
                     <div class="input-group mb-3">
                        <textarea class="form-control form-control-sm" placeholder="Masukkan Balasan" name="komentar" rows="3" style="resize: none;" required></textarea>
                        <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="bi bi-send"></i></button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
<?php } ?>
</html>