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
                     <h3>FAQ (Pertanyaan Umum)</h3>
                     <p class="text-subtitle text-muted">RESPON</p>
                  </div>
                  <div class="col-12 col-md-6 order-md-2 order-first">
                     <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Dashboard</a></li>
                           <li class="breadcrumb-item active" aria-current="page">FAQ (Pertanyaan Umum)</li>
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
                              <th>Pertanyaan</th>
                              <th>Jawaban</th>
                              <th width="9%">**</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $n = 1;
                           foreach ($data as $d) {?>
                              <tr>
                                 <td><?php echo $n++ ?></td>
                                 <td><?php echo $d['tanya'] ?></td>
                                 <td><?php echo $d['jawab'] ?></td>
                                 <td>
                                    <a href="#d<?php echo $d['idfaq'] ?>" class="btn btn-sm btn-warning" data-bs-toggle="modal" title="Klik untuk ubah data"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#h<?php echo $d['idfaq'] ?>" class="btn btn-sm btn-danger" data-bs-toggle="modal" title="Klik untuk hapus data"><i class="bi bi-trash-fill"></i></a>
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
<div class="modal fade text-left modal-borderless" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Tambah Data Baru</h5>
            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i>
            </button>
         </div>
         <form action="<?php echo base_url('a/faqsimpan') ?>" method="post">
            <input type="hidden" name="proses" value="simpan">
            <div class="modal-body">
               <p style="text-align: justify;">masukkan detail inputan data baru, lalu pilih tombol <code>Simpan Data</code> untuk menyimpan data baru</p>
               <div class="form-group">
                  <label>Pertanyaan</label>
                  <textarea  class="form-control form-control-sm" placeholder="Uraian Pertanyaan" name="tanya" rows="5" style="resize: none;" required></textarea>
               </div>
               <div class="form-group">
                  <label>Jawaban</label>
                  <textarea  class="form-control form-control-sm" placeholder="Uraian Jawaban" name="jawab" rows="7" style="resize: none;" required></textarea>
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
   <div class="modal fade text-left modal-borderless" id="d<?php echo $d['idfaq'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Ubah Detail Data</h5>
               <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i>
               </button>
            </div>
            <form action="<?php echo base_url('a/faqsimpan') ?>" method="post">
               <input type="hidden" name="proses" value="ubah">
               <input type="hidden" name="id" value="<?php echo $d['idfaq'] ?>">
               <div class="modal-body">
                  <p style="text-align: justify;">masukkan perubahan detail data, lalu pilih tombol <code>Simpan Data</code> untuk menyimpan perubahan data</p>
                  <div class="form-group">
                     <label>Pertanyaan</label>
                     <textarea  class="form-control form-control-sm" placeholder="Uraian Pertanyaan" name="tanya" rows="5" style="resize: none;" required><?php echo $d['tanya'] ?></textarea>
                  </div>
                  <div class="form-group">
                     <label>Jawaban</label>
                     <textarea  class="form-control form-control-sm" placeholder="Uraian Jawaban" name="jawab" rows="7" style="resize: none;" required><?php echo $d['jawab'] ?></textarea>
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
   <div class="modal fade text-left modal-borderless" id="h<?php echo $d['idfaq'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Hapus Data</h5>
               <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i>
               </button>
            </div>
            <div class="modal-body">
               <p style="text-align: justify;"><strong><code>PENTING!</code></strong> data yang telah dihapus tidak dapat dikembalikan, apakah anda yakin menghapus data terpilih?</strong> pilih tombol <code>Ya, Hapus</code> untuk menghapus data</p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-sm btn-grey" data-bs-dismiss="modal"><i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Batal</span></button>
               <a href="<?php echo base_url('a/faqhapus/'.$d['idfaq']) ?>" class="btn btn-sm btn-danger"><i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Ya, Hapus</span></a>
            </div>
         </div>
      </div>
   </div>
<?php } ?>
</html>