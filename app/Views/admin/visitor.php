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
                     <h3>Pengunjung</h3>
                     <p class="text-subtitle text-muted">MASTER DATA</p>
                  </div>
                  <div class="col-12 col-md-6 order-md-2 order-first">
                     <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Dashboard</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Pengunjung</li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
            <section class="section">
               <div class="card">
                  <div class="card-body">
                     <p style="text-align: justify;">pilih tombol <code><i class="bi bi-pencil-square"></i></code> untuk menampilkan detail data</p>
                     <table class="table" id="table1">
                        <thead>
                           <tr>
                              <th width="5%">#</th>
                              <th>Nama</th>
                              <th width="27%">Alamat</th>
                              <th>Telepon</th>
                              <th>Email</th>
                              <th>Username</th>
                              <th width="9%">**</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $n = 1;
                           foreach ($data as $d) {?>
                              <tr <?php if($d['status'] == '0'){echo "style='background-color:rgba(235,213,0,0.1)'";} ?>>
                                 <td><?php echo $n++ ?></td>
                                 <td><?php echo $d['nama'] ?></td>
                                 <td><?php echo $d['alamat'] ?></td>
                                 <td><?php echo $d['telepon'] ?></td>
                                 <td><?php echo $d['email'] ?></td>
                                 <td><?php echo $d['username'] ?></td>
                                 <td>
                                    <a href="#d<?php echo $d['idpengguna'] ?>" class="btn btn-sm btn-warning" data-bs-toggle="modal" title="Klik untuk ubah data"><i class="bi bi-pencil-square"></i></a>
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
<?php foreach ($data as $d) {?>
   <div class="modal fade text-left modal-borderless" id="d<?php echo $d['idpengguna'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Ubah Detail Data</h5>
               <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i>
               </button>
            </div>
            <form action="<?php echo base_url('a/pengunjungsimpan') ?>" method="post">
               <input type="hidden" name="proses" value="ubah">
               <input type="hidden" name="id" value="<?php echo $d['idpengguna'] ?>">
               <div class="modal-body">
                  <p style="text-align: justify;">masukkan perubahan detail data, lalu pilih tombol <code>Simpan Data</code> untuk menyimpan perubahan data</p>
                  <div class="form-group">
                     <label>Status Akun</label>
                     <select class="form-control form-control-sm" name="status" required>
                        <option <?php if($d['status'] == '0'){echo "selected";} ?> value="0">Nonaktif</option>
                        <option <?php if($d['status'] == '1'){echo "selected";} ?> value="1">Aktif</option>
                     </select>
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
<?php } ?>
</html>