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
                     <h3>Informasi Dasar</h3>
                     <p class="text-subtitle text-muted">KELOLA WEB</p>
                  </div>
                  <div class="col-12 col-md-6 order-md-2 order-first">
                     <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Dashboard</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Informasi Dasar</li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
            <section class="section">
               <div class="card">
                  <form method="post" action="<?php echo base_url('a/informasiubah') ?>">
                     <div class="card-body">
                        <p style="text-align: justify;">masukkan perubahan detail data, lalu pilih tombol <code>Simpan Data</code> untuk menyimpan perubahan data</p>
                        <div class="form-group">
                           <label>Nama Web</label>
                           <input type="text" class="form-control form-control-sm" placeholder="Nama Website" name="nama" maxlength="36" value="<?php echo $data['nama'] ?>" autofocus required>
                        </div>
                        <div class="form-group">
                           <label>Tagline Web</label>
                           <input type="text" class="form-control form-control-sm" placeholder="Tagline Website" name="tagline" maxlength="99" value="<?php echo $data['tagline'] ?>" required>
                        </div>
                        <div class="form-group">
                           <label>Telepon</label>
                           <input type="text" class="form-control form-control-sm" placeholder="Telepon Web" name="telepon" maxlength="14" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                           value="<?php echo $data['telepon'] ?>" required />
                        </div>
                        <div class="form-group">
                           <label>Alamat</label>
                           <textarea class="form-control form-control-sm" placeholder="Alamat Lengkap" name="alamat" rows="3" style="resize: none;" required><?php echo $data['alamat'] ?></textarea>
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