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
                     <h3>Tampilan Slide</h3>
                     <p class="text-subtitle text-muted">KELOLA WEB</p>
                  </div>
                  <div class="col-12 col-md-6 order-md-2 order-first">
                     <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Dashboard</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Tampilan Slide</li>
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
                     <div class="row">
                        <?php foreach ($data as $d) {?>
                           <div class="col-xl-4 col-md-6 col-sm-12">
                              <div class="card">
                                 <div class="card-content">
                                    <div class="card-body">
                                       <h4 class="card-title"><?php echo $d['tagline'] ?></h4>
                                       <p class="card-text"><?php echo nl2br($d['caption']) ?></p>
                                    </div>
                                    <p style="text-align: center;">
                                       <img class="img-fluid" src="<?php echo base_url('assets/gambar/slide/'.$d['thumbnail']) ?>" style="height: 306px;">
                                    </p>
                                    <div class="card-footer d-flex justify-content-between">
                                       <a href="<?php echo base_url('a/slidehapus/'.$d['idslide']) ?>" class="btn btn-light-danger">Hapus Slide</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        <?php } ?>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>
   <?php echo view('admin/ascript') ?>
</body>
<div class="modal fade text-left modal-borderless" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Tambah Data Baru</h5>
            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i>
            </button>
         </div>
         <form action="<?php echo base_url('a/slidesimpan') ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
               <p style="text-align: justify;">masukkan detail inputan data baru, lalu pilih tombol <code>Simpan Data</code> untuk menyimpan data baru</p>

               <div class="form-group">
                  <label>Tagline</label>
                  <input type="text" name="tagline" placeholder="Tagline Slide" maxlength="36" class="form-control form-control-sm" required>
               </div>
               <div class="form-group">
                  <label>Caption</label>
                  <textarea  class="form-control form-control-sm" placeholder="Caption Slide" name="caption" rows="7" maxlength="180" style="resize: none;" required></textarea>
               </div>
               <div class="form-group">
                  <label>Gambar Slide</label>
                  <input type="file" name="file" class="form-control form-control-sm" accept="image/*" required>
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
</html>