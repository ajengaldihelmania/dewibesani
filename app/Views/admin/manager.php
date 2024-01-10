<?php
$db = db_connect();
$jabatan1 = ['Pengawas', 'Penanggung Jawab','Ketua','Wakil Ketua I','Wakil Ketua II','Sekretaris I','Sekretaris II','Bendahara I','Bendahara II'];
$jabatan2 = ['Ketertiban dan Keamanan Akomodasi','Kebersihan dan Kesehatan','PSDM','Humas dan Publikasi','Pengembangan Potensi dan Usaha','Anggota'];
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
                     <h3>Profil Pengelola</h3>
                     <p class="text-subtitle text-muted">KELOLA WEB</p>
                  </div>
                  <div class="col-12 col-md-6 order-md-2 order-first">
                     <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Dashboard</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Profil Pengelola</li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
            <section class="section">
               <div class="card">
                  <div class="card-content">
                     <div class="card-body">
                        <p style="text-align: justify;">masukkan perubahan detail data, lalu pilih tombol <code>Simpan Data</code> untuk menyimpan perubahan data</p>
                        <ul class="list-group">
                           <?php
                           for ($i=0; $i < count($jabatan1); $i++) {
                              $s = "-";
                              $cek = $db->query("select count(*) as jumlah from pengelola where jabatan = '".$jabatan1[$i]."' and status = '1'")->getRowArray()['jumlah'];
                              if($cek > 0){
                                 $s = $db->query("select nama from pengelola where jabatan = '".$jabatan1[$i]."' and status = '1'")->getRowArray()['nama'];
                              }
                              ?>
                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                 <span class="col-3"><?php echo $jabatan1[$i]?></span>
                                 <span class="col-8">: <strong><?php echo $s; ?></strong></span>
                                 <span class="col-1">
                                    <a href="#tambah1<?php echo $i ?>" title="Klik untuk menambah data" data-bs-toggle="modal"><span class="badge bg-success badge-pill badge-round ml-1"><i class="bi bi-folder-plus"></i></span></a>
                                    <?php
                                    if($cek > 0){
                                       $p = $db->query("select idpengelola from pengelola where jabatan = '".$jabatan1[$i]."' and status = '1'")->getRowArray()['idpengelola'];
                                       ?>
                                       <a href="#detail<?php echo $p ?>"  data-bs-toggle="modal" title="Klik untuk mengubah data"><span class="badge bg-warning badge-pill badge-round ml-1"><i class="bi bi-pencil-square"></i></span></a>
                                    <?php } ?>
                                    <a href="#riwayat1<?php echo $i ?>"  data-bs-toggle="modal" title="Klik untuk melihat riwayat <?php echo $jabatan1[$i] ?>"><span class="badge bg-primary badge-pill badge-round ml-1"><i class="bi bi-card-list"></i></span></a>
                                 </span>
                              </li>
                           <?php } ?>
                           <?php
                           for ($i=0; $i < count($jabatan2); $i++) {
                              $s = $db->query("select count(*) as jumlah from pengelola where jabatan = '".$jabatan2[$i]."'")->getRowArray()['jumlah'];
                              ?>
                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                 <span class="col-3"><?php echo $jabatan2[$i]?></span>
                                 <span class="col-8">: <strong><?php echo $s." anggota"; ?></strong></span>
                                 <span class="col-1">
                                    <a href="#tambah2<?php echo $i ?>" title="Klik untuk menambah data" data-bs-toggle="modal"><span class="badge bg-success badge-pill badge-round ml-1"><i class="bi bi-folder-plus"></i></span></a>
                                    <a href="#riwayat2<?php echo $i ?>"  data-bs-toggle="modal" title="Klik untuk melihat riwayat <?php echo $jabatan1[$i] ?>"><span class="badge bg-primary badge-pill badge-round ml-1"><i class="bi bi-card-list"></i></span></a>
                                 </span>
                              </li>
                           <?php } ?>
                        </ul>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>
   <?php echo view('admin/ascript') ?>
</body>
<?php
for ($i=0; $i < count($jabatan1); $i++) {
   $cek = $db->query("select count(*) as jumlah from pengelola where jabatan = '".$jabatan1[$i]."' and status = '1'")->getRowArray()['jumlah'];
   $detail = $db->query("select * from pengelola where jabatan = '".$jabatan1[$i]."' order by status desc, idpengelola asc")->getResultArray();
   ?>
   <div class="modal fade text-left modal-borderless" id="tambah1<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Tambah Data <?php echo $jabatan1[$i] ?></h5>
               <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i>
               </button>
            </div>
            <form action="<?php echo base_url('a/pengelolasimpan') ?>" method="post" enctype="multipart/form-data">
               <input type="hidden" name="proses" value="simpan">
               <input type="hidden" name="jabatan" value="<?php echo $jabatan1[$i] ?>">
               <div class="modal-body">
                  <p style="text-align: justify;">masukkan detail inputan data baru, lalu pilih tombol <code>Simpan Data</code> untuk menyimpan data baru</p>
                  <div class="row">
                     <div class="form-group col-8">
                        <label>Nama</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nama Lengkap" name="nama" maxlength="63" required>
                     </div>
                     <div class="form-group col-4">
                        <label>Jenis Kelamin</label>
                        <select class="form-control form-control-sm" name="jekel" required>
                           <option>Pria</option>
                           <option>Wanita</option>
                        </select>
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-4">
                        <label>Email</label>
                        <input type="email" class="form-control form-control-sm" placeholder="Alamat Email" name="email" maxlength="99">
                     </div>
                     <div class="form-group col-4">
                        <label>Telepon / WhatsApp</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nomor telepon / WhatsApp" name="wa" maxlength="14" onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                     </div>
                     <div class="form-group col-4">
                        <label>Foto</label>
                        <input type="file" name="file" class="form-control form-control-sm" accept="image/*">
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-4">
                        <label>Akun Facebook</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Akun Facebook" name="fb" maxlength="27">
                     </div>
                     <div class="form-group col-4">
                        <label>Akun Instagram</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Akun Instagram" name="ig" maxlength="27">
                     </div>
                     <div class="form-group col-4">
                        <label>Akun Twitter</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Akun Twitter" name="tw" maxlength="27">
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
   <div class="modal fade text-left modal-borderless" id="riwayat1<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Riwayat <?php echo $jabatan1[$i] ?></h5>
               <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i>
               </button>
            </div>
            <div class="modal-body">
               <div class="table-responsive">
                  <table class="table table-hover table-lg">
                     <tbody>
                        <?php
                        foreach ($detail as $dt) {
                           $fp = base_url('assets/gambar/profil/'.$dt['foto']);
                           if($dt['foto'] == ''){
                              $fp = base_url('assets/gambar/default/'.$dt['jekel'].'.png');
                           }
                           ?>
                           <tr>
                              <td class="col-4">
                                 <div class="d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                       <img src="<?php echo $fp ?>">
                                    </div>
                                    <p class="font-bold ms-3 mb-0"><?php echo $dt['nama'] ?></p>
                                 </div>
                              </td>
                              <td class="col-auto">
                                 <p class=" mb-0">
                                    <?php echo $dt['email'].', '.$dt['wa'] ?>
                                    <?php if($dt['status'] == 0){ ?>
                                       <a href="<?php echo base_url('a/pengelolahapus/'.$dt['idpengelola']) ?>" title="Klik untuk menghapus data" style="float: right;">&nbsp;&nbsp;<i class="bi bi-trash"></i></a>
                                       <a href="<?php echo base_url('a/pengelolaaktif/'.$dt['idpengelola']) ?>" title="Klik untuk mengaktifkan data" style="float: right;"><i class="bi bi-emoji-smile"></i></a>
                                    <?php } ?>
                                 </p>
                              </td>
                           </tr>
                        <?php } ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php
   if($cek > 0){
      $p = $db->query("select * from pengelola where jabatan = '".$jabatan1[$i]."' and status = '1'")->getRowArray();
      ?>
      <div class="modal fade text-left modal-borderless" id="detail<?php echo $p['idpengelola'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
         <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Ubah Data <?php echo $p['nama'] ?></h5>
                  <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i>
                  </button>
               </div>
               <form action="<?php echo base_url('a/pengelolasimpan') ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="proses" value="ubah">
                  <input type="hidden" name="id" value="<?php echo $p['idpengelola'] ?>">
                  <div class="modal-body">
                     <p style="text-align: justify;">masukkan detail inputan data baru, lalu pilih tombol <code>Simpan Data</code> untuk menyimpan perubahan detail data</p>
                     <div class="row">
                        <div class="form-group col-8">
                           <label>Nama</label>
                           <input type="text" class="form-control form-control-sm" placeholder="Nama Lengkap" name="nama" value="<?php echo $p['nama'] ?>" maxlength="63" required>
                        </div>
                        <div class="form-group col-4">
                           <label>Jenis Kelamin</label>
                           <select class="form-control form-control-sm" name="jekel" required>
                              <option <?php if($p['jekel'] == 'Pria'){echo "selected";} ?>>Pria</option>
                              <option <?php if($p['jekel'] == 'Wanita'){echo "selected";} ?>>Wanita</option>
                           </select>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-4">
                           <label>Email</label>
                           <input type="email" class="form-control form-control-sm" placeholder="Alamat Email" name="email" value="<?php echo $p['email'] ?>" maxlength="99">
                        </div>
                        <div class="form-group col-4">
                           <label>Telepon / WhatsApp</label>
                           <input type="text" class="form-control form-control-sm" placeholder="Nomor telepon / WhatsApp" name="wa" value="<?php echo $p['wa'] ?>" maxlength="14" onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                        </div>
                        <div class="form-group col-4">
                           <label>Foto</label>
                           <input type="file" name="file" class="form-control form-control-sm" accept="image/*">
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-4">
                           <label>Akun Facebook</label>
                           <input type="text" class="form-control form-control-sm" placeholder="Akun Facebook" name="fb" value="<?php echo $p['fb'] ?>" maxlength="27">
                        </div>
                        <div class="form-group col-4">
                           <label>Akun Instagram</label>
                           <input type="text" class="form-control form-control-sm" placeholder="Akun Instagram" name="ig" value="<?php echo $p['ig'] ?>" maxlength="27">
                        </div>
                        <div class="form-group col-4">
                           <label>Akun Twitter</label>
                           <input type="text" class="form-control form-control-sm" placeholder="Akun Twitter" name="tw" value="<?php echo $p['tw'] ?>" maxlength="27">
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
   <?php } ?>
<?php } ?>

<?php
for ($i=0; $i < count($jabatan2); $i++) {
   $cek = $db->query("select count(*) as jumlah from pengelola where jabatan = '".$jabatan2[$i]."' and status = '1'")->getRowArray()['jumlah'];
   $detail = $db->query("select * from pengelola where jabatan = '".$jabatan2[$i]."' order by status desc, idpengelola asc")->getResultArray();
   ?>
   <div class="modal fade text-left modal-borderless" id="tambah2<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Tambah Data <?php echo $jabatan2[$i] ?></h5>
               <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i>
               </button>
            </div>
            <form action="<?php echo base_url('a/pengelolasimpan') ?>" method="post" enctype="multipart/form-data">
               <input type="hidden" name="proses" value="simpan">
               <input type="hidden" name="jabatan" value="<?php echo $jabatan2[$i] ?>">
               <div class="modal-body">
                  <p style="text-align: justify;">masukkan detail inputan data baru, lalu pilih tombol <code>Simpan Data</code> untuk menyimpan data baru</p>
                  <div class="row">
                     <div class="form-group col-8">
                        <label>Nama</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nama Lengkap" name="nama" maxlength="63" required>
                     </div>
                     <div class="form-group col-4">
                        <label>Jenis Kelamin</label>
                        <select class="form-control form-control-sm" name="jekel" required>
                           <option>Pria</option>
                           <option>Wanita</option>
                        </select>
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-4">
                        <label>Email</label>
                        <input type="email" class="form-control form-control-sm" placeholder="Alamat Email" name="email" maxlength="99">
                     </div>
                     <div class="form-group col-4">
                        <label>Telepon / WhatsApp</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nomor telepon / WhatsApp" name="wa" maxlength="14" onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                     </div>
                     <div class="form-group col-4">
                        <label>Foto</label>
                        <input type="file" name="file" class="form-control form-control-sm" accept="image/*">
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-4">
                        <label>Akun Facebook</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Akun Facebook" name="fb" maxlength="27">
                     </div>
                     <div class="form-group col-4">
                        <label>Akun Instagram</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Akun Instagram" name="ig" maxlength="27">
                     </div>
                     <div class="form-group col-4">
                        <label>Akun Twitter</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Akun Twitter" name="tw" maxlength="27">
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
   <div class="modal fade text-left modal-borderless" id="riwayat2<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Riwayat <?php echo $jabatan2[$i] ?></h5>
               <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i>
               </button>
            </div>
            <div class="modal-body">
               <div class="table-responsive">
                  <table class="table table-hover table-lg">
                     <tbody>
                        <?php
                        foreach ($detail as $dt) {
                           $fp = base_url('assets/gambar/profil/'.$dt['foto']);
                           if($dt['foto'] == ''){
                              $fp = base_url('assets/gambar/default/'.$dt['jekel'].'.png');
                           }
                           ?>
                           <tr>
                              <td class="col-4">
                                 <div class="d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                       <img src="<?php echo $fp ?>">
                                    </div>
                                    <p class="font-bold ms-3 mb-0"><?php echo $dt['nama'] ?></p>
                                 </div>
                              </td>
                              <td class="col-auto">
                                 <p class=" mb-0">
                                    <?php echo $dt['email'].', '.$dt['wa'] ?>
                                    <?php if($dt['status'] == 0){ ?>
                                       <a href="<?php echo base_url('a/pengelolahapus/'.$dt['idpengelola']) ?>" title="Klik untuk menghapus data" style="float: right;">&nbsp;&nbsp;<i class="bi bi-trash"></i></a>
                                       <a href="<?php echo base_url('a/pengelolaaktif/'.$dt['idpengelola']) ?>" title="Klik untuk mengaktifkan data" style="float: right;"><i class="bi bi-emoji-smile"></i></a>
                                    <?php } ?>
                                 </p>
                              </td>
                           </tr>
                        <?php } ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php
   if($cek > 0){
      $p = $db->query("select * from pengelola where jabatan = '".$jabatan2[$i]."' and status = '1'")->getRowArray();
      ?>
      <div class="modal fade text-left modal-borderless" id="detail<?php echo $p['idpengelola'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
         <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Ubah Data <?php echo $p['nama'] ?></h5>
                  <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i>
                  </button>
               </div>
               <form action="<?php echo base_url('a/pengelolasimpan') ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="proses" value="ubah">
                  <input type="hidden" name="id" value="<?php echo $p['idpengelola'] ?>">
                  <div class="modal-body">
                     <p style="text-align: justify;">masukkan detail inputan data baru, lalu pilih tombol <code>Simpan Data</code> untuk menyimpan perubahan detail data</p>
                     <div class="row">
                        <div class="form-group col-8">
                           <label>Nama</label>
                           <input type="text" class="form-control form-control-sm" placeholder="Nama Lengkap" name="nama" value="<?php echo $p['nama'] ?>" maxlength="63" required>
                        </div>
                        <div class="form-group col-4">
                           <label>Jenis Kelamin</label>
                           <select class="form-control form-control-sm" name="jekel" required>
                              <option <?php if($p['jekel'] == 'Pria'){echo "selected";} ?>>Pria</option>
                              <option <?php if($p['jekel'] == 'Wanita'){echo "selected";} ?>>Wanita</option>
                           </select>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-4">
                           <label>Email</label>
                           <input type="email" class="form-control form-control-sm" placeholder="Alamat Email" name="email" value="<?php echo $p['email'] ?>" maxlength="99">
                        </div>
                        <div class="form-group col-4">
                           <label>Telepon / WhatsApp</label>
                           <input type="text" class="form-control form-control-sm" placeholder="Nomor telepon / WhatsApp" name="wa" value="<?php echo $p['wa'] ?>" maxlength="14" onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                        </div>
                        <div class="form-group col-4">
                           <label>Foto</label>
                           <input type="file" name="file" class="form-control form-control-sm" accept="image/*">
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-4">
                           <label>Akun Facebook</label>
                           <input type="text" class="form-control form-control-sm" placeholder="Akun Facebook" name="fb" value="<?php echo $p['fb'] ?>" maxlength="27">
                        </div>
                        <div class="form-group col-4">
                           <label>Akun Instagram</label>
                           <input type="text" class="form-control form-control-sm" placeholder="Akun Instagram" name="ig" value="<?php echo $p['ig'] ?>" maxlength="27">
                        </div>
                        <div class="form-group col-4">
                           <label>Akun Twitter</label>
                           <input type="text" class="form-control form-control-sm" placeholder="Akun Twitter" name="tw" value="<?php echo $p['tw'] ?>" maxlength="27">
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
   <?php } ?>
<?php } ?>
</html>