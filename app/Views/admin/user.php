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
                     <h3>Bagian Penjualan</h3>
                     <p class="text-subtitle text-muted">MASTER DATA</p>
                  </div>
                  <div class="col-12 col-md-6 order-md-2 order-first">
                     <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Dashboard</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Bagian Penjualan</li>
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
                           foreach ($data as $d) {
                              $cek = $db->query("select * from komentar where idpengguna = '".$d['idpengguna']."'")->getResultArray();
                              if(count($cek) == 0){
                                 $cek = $db->query("select * from post where idpengguna = '".$d['idpengguna']."'")->getResultArray();
                              }
                              ?>
                              <tr <?php if($d['status'] == '0'){echo "style='background-color:rgba(255,213,0,0.1)'";} ?>>
                                 <td><?php echo $n++ ?></td>
                                 <td><?php echo $d['nama'] ?></td>
                                 <td><?php echo $d['alamat'] ?></td>
                                 <td><?php echo $d['telepon'] ?></td>
                                 <td><?php echo $d['email'] ?></td>
                                 <td><?php echo $d['username'] ?></td>
                                 <td>
                                    <a href="#d<?php echo $d['idpengguna'] ?>" class="btn btn-sm btn-warning" data-bs-toggle="modal" title="Klik untuk ubah data"><i class="bi bi-pencil-square"></i></a>
                                    <?php if(count($cek) == 0){ ?>
                                       <a href="#h<?php echo $d['idpengguna'] ?>" class="btn btn-sm btn-danger" data-bs-toggle="modal" title="Klik untuk hapus data"><i class="bi bi-trash-fill"></i></a>
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
         <form action="<?php echo base_url('a/penggunasimpan') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="proses" value="simpan">
            <div class="modal-body">
               <p style="text-align: justify;">masukkan detail inputan data baru, lalu pilih tombol <code>Simpan Data</code> untuk menyimpan data baru</p>
               <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control form-control-sm" placeholder="Nama Lengkap" name="nama" maxlength="63" required>
               </div>
               <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control form-control-sm" name="jekel" required>
                     <option>Pria</option>
                     <option>Wanita</option>
                  </select>
               </div>
               <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control form-control-sm" placeholder="Alamat Email" name="email" maxlength="99" required>
               </div>
               <div class="form-group">
                  <label>Telepon</label>
                  <input type="text" class="form-control form-control-sm" placeholder="Nomor telepon" name="telepon" maxlength="14" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required />
               </div>
               <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control form-control-sm" placeholder="Alamat Lengkap" name="alamat" rows="3" style="resize: none;" required></textarea>
               </div>
               <div class="form-group">
                  <label>Foto</label>
                  <input type="file" name="foto" class="form-control form-control-sm" accept="image/*">
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
   <div class="modal fade text-left modal-borderless" id="d<?php echo $d['idpengguna'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Ubah Detail Data</h5>
               <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i>
               </button>
            </div>
            <form action="<?php echo base_url('a/penggunasimpan') ?>" method="post">
               <input type="hidden" name="proses" value="ubah">
               <input type="hidden" name="id" value="<?php echo $d['idpengguna'] ?>">
               <div class="modal-body">
                  <p style="text-align: justify;">masukkan perubahan detail data, lalu pilih tombol <code>Simpan Data</code> untuk menyimpan perubahan data</p>
                  <div class="form-group">
                     <label>Nama</label>
                     <input type="text" class="form-control form-control-sm" placeholder="Nama Lengkap" name="nama" maxlength="63" value="<?php echo $d['nama'] ?>" required>
                  </div>
                  <div class="form-group">
                     <label>Jenis Kelamin</label>
                     <select class="form-control form-control-sm" name="jekel" required>
                        <option <?php if($d['jekel'] == 'Pria'){echo "selected";} ?>>Pria</option>
                        <option <?php if($d['jekel'] == 'Wanita'){echo "selected";} ?>>Wanita</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Email</label>
                     <input type="email" class="form-control form-control-sm" placeholder="Alamat Email" name="email" maxlength="99" value="<?php echo $d['email'] ?>" required>
                  </div>
                  <div class="form-group">
                     <label>Telepon</label>
                     <input type="text" class="form-control form-control-sm" placeholder="Nomor telepon" name="telepon" maxlength="14" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                     value="<?php echo $d['telepon'] ?>" required />
                  </div>
                  <div class="form-group">
                     <label>Alamat</label>
                     <textarea class="form-control form-control-sm" placeholder="Alamat Lengkap" name="alamat" rows="3" style="resize: none;" required><?php echo $d['alamat'] ?></textarea>
                  </div>
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
   <div class="modal fade text-left modal-borderless" id="h<?php echo $d['idpengguna'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Hapus Data</h5>
               <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i>
               </button>
            </div>
            <div class="modal-body">
               <p style="text-align: justify;"><strong><code>PENTING!</code></strong> data yang telah dihapus tidak dapat dikembalikan, apakah anda yakin menghapus data <strong><?php echo $d['nama'] ?>?</strong> pilih tombol <code>Ya, Hapus</code> untuk menghapus data</p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-sm btn-grey" data-bs-dismiss="modal"><i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Batal</span></button>
               <a href="<?php echo base_url('a/penggunahapus/'.$d['idpengguna']) ?>" class="btn btn-sm btn-danger"><i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Ya, Hapus</span></a>
            </div>
         </div>
      </div>
   </div>
<?php } ?>
</html>