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
                     <h3>Akses Pengguna</h3>
                     <p class="text-subtitle text-muted">AKUN PENGGUNA</p>
                  </div>
                  <div class="col-12 col-md-6 order-md-2 order-first">
                     <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Dashboard</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Akses Pengguna</li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
            <section class="section">
               <div class="card">
                  <form method="post" action="<?php echo base_url('a/aksesubah') ?>">
                     <div class="card-body">
                        <p style="text-align: justify;">masukkan perubahan detail data, lalu pilih tombol <code>Simpan Data</code> untuk menyimpan perubahan data</p>
                        <div class="form-group">
                           <label>Password Lama</label>
                           <input type="password" class="form-control form-control-sm" placeholder="Password Akses Lama" name="p1" autofocus required>
                        </div>
                        <hr>
                        <div class="form-group">
                           <label>Password Baru</label>
                           <input type="password" class="form-control form-control-sm" placeholder="Password Akses Baru" name="p2" required>
                        </div>
                        <div class="form-group">
                           <label>Konfirmasi Password</label>
                           <input type="password" class="form-control form-control-sm" placeholder="Konfirmasi Password Baru" name="p3" required>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-success"><i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Simpan Data</span></button>
                     </div>
                  </form>
               </div>
            </section>
         </div>
      </div>
   </div>
   <?php echo view('admin/ascript') ?>
</body>
</html>