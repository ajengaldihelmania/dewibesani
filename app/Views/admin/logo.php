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
                     <h3>Logo dan Thumbnail</h3>
                     <p class="text-subtitle text-muted">KELOLA WEB</p>
                  </div>
                  <div class="col-12 col-md-6 order-md-2 order-first">
                     <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Dashboard</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Logo dan Thumbnail</li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
            <section class="section">
               <div class="card">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-xl-4 col-md-6 col-sm-12">
                           <div class="card">
                              <div class="card-content">
                                 <div class="card-body">
                                    <h4 class="card-title">Logo Web</h4>
                                    <p class="card-text">
                                       pilih file gambar, lalu pilih tombol <code>Upload</code> untuk menyimpan perubahan
                                    </p>
                                 </div>
                                 <p style="text-align: center;">
                                    <img class="img-fluid" src="<?php echo base_url('assets/gambar/default/'.$data['logo']) ?>" style="height: 180px;">
                                 </p>
                                 <form action="<?php echo base_url('a/logoubah') ?>" method="post" enctype="multipart/form-data">
                                    <fieldset>
                                       <div class="input-group">
                                          <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="file" accept="image/*" required>
                                          <button class="btn btn-primary" type="submit" id="inputGroupFileAddon04">Upload</button>
                                       </div>
                                    </fieldset>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-sm-12">
                           <div class="card">
                              <div class="card-content">
                                 <div class="card-body">
                                    <h4 class="card-title">Ikon Web</h4>
                                    <p class="card-text">
                                       pilih file gambar, lalu pilih tombol <code>Upload</code> untuk menyimpan perubahan
                                    </p>
                                 </div>
                                 <p style="text-align: center;">
                                    <img class="img-fluid" src="<?php echo base_url('assets/gambar/default/'.$data['ikon']) ?>" style="height: 180px;">
                                 </p>
                                 <form action="<?php echo base_url('a/ikonubah') ?>" method="post" enctype="multipart/form-data">
                                    <fieldset>
                                       <div class="input-group">
                                          <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="file" accept="image/*" required>
                                          <button class="btn btn-primary" type="submit" id="inputGroupFileAddon04">Upload</button>
                                       </div>
                                    </fieldset>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-sm-12">
                           <div class="card">
                              <div class="card-content">
                                 <div class="card-body">
                                    <h4 class="card-title">Thumbnail Info Web</h4>
                                    <p class="card-text">
                                       pilih file gambar, lalu pilih tombol <code>Upload</code> untuk menyimpan perubahan
                                    </p>
                                 </div>
                                 <p style="text-align: center;">
                                    <img class="img-fluid" src="<?php echo base_url('assets/gambar/default/'.$data['thumbnail']) ?>" style="height: 180px;">
                                 </p>
                                 <form action="<?php echo base_url('a/thumbnailubah') ?>" method="post" enctype="multipart/form-data">
                                    <fieldset>
                                       <div class="input-group">
                                          <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="file" accept="image/*" required>
                                          <button class="btn btn-primary" type="submit" id="inputGroupFileAddon04">Upload</button>
                                       </div>
                                    </fieldset>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>
   <?php echo view('admin/ascript') ?>
</body>
</html>