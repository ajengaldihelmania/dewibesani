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
                     <a href="#tambah" data-bs-toggle="modal" class="btn icon icon-left btn-success btn-sm" style="float: right;"><i data-feather="plus-square"></i> Tambah Data</a>
                     <p style="text-align: justify;">pilih tombol <code>Tambah Data</code> untuk menambahkan data baru. pilih tombol <code><i class="bi bi-pencil-square"></i></code> untuk mengubah data. pilih tombol <code><i class="bi bi-trash-fill"></i></code> untuk menghapus data</p>
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
                              <tr <?php if($d['status'] == '0'){echo "style='background-color:rgba(255,213,0,0.1)'";} ?>>
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
                                    <a href="<?php echo base_url('o/kriyadetail/'.$d['idpost']) ?>" class="btn btn-sm btn-warning" title="Klik untuk ubah data"><i class="bi bi-pencil-square"></i></a>
                                    <?php if($comment == 0){ ?>
                                       <a href="#h<?php echo $d['idpost'] ?>" class="btn btn-sm btn-danger" data-bs-toggle="modal" title="Klik untuk hapus data"><i class="bi bi-trash-fill"></i></a>
                                    <?php } ?>
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
<div class="modal fade text-left modal-borderless" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Tambah Data Baru</h5>
            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i>
            </button>
         </div>
         <form action="<?php echo base_url('o/kriyasimpan') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="proses" value="simpan">
            <div class="modal-body">
               <p style="text-align: justify;">masukkan detail inputan data baru, lalu pilih tombol <code>Simpan Data</code> untuk menyimpan data baru</p>
               <div class="form-group">
                  <label>Judul</label>
                  <input type="text" class="form-control form-control-sm" placeholder="Judul Posting" name="judul" maxlength="99" required>
               </div>
               <div class="form-group">
                  <label>Isi</label>
                  <textarea class="form-control form-control-sm" placeholder="Isi atau Konten Artikel" name="isi" rows="20" style="resize: none;" required></textarea>
               </div>
               <div class="row">
                  <div class="form-group col-8">
                     <label>Tag</label>
                     <input type="text" class="form-control form-control-sm" placeholder="Tag atau Kata Kunci Posting" name="tag" required>
                  </div>
                  <div class="form-group col-4">
                     <label>Foto</label>
                     <input type="file" name="gambar[]" class="form-control form-control-sm" accept="image/*" multiple required>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-sm btn-grey" data-bs-dismiss="modal"><i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Batal</span></button>
               <button type="submit" class="btn btn-sm btn-success"><i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Simpan Data</span></button>
            </div>
         </form>
      </div>
   </div>
</div>
<?php foreach ($data as $d) {?>
   <div class="modal fade text-left modal-borderless" id="h<?php echo $d['idpost'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Hapus Data</h5>
               <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i>
               </button>
            </div>
            <div class="modal-body">
               <p style="text-align: justify;"><strong><code>PENTING!</code></strong> data yang telah dihapus tidak dapat dikembalikan dan akan menyebabkan semua data yang terkait akan dihapus untuk menghindari kesalahan (<i>error</i>), apakah anda yakin menghapus data <strong><?php echo $d['judul'] ?>?</strong> pilih tombol <code>Ya, Hapus</code> untuk menghapus data</p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-sm btn-grey" data-bs-dismiss="modal"><i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Batal</span></button>
               <a href="<?php echo base_url('o/kriyahapus/'.$d['idpost']) ?>" class="btn btn-sm btn-danger"><i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Ya, Hapus</span></a>
            </div>
         </div>
      </div>
   </div>
<?php } ?>
</html>