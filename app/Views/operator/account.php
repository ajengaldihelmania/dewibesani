<?php
$inisial = ['bni','bri','bsa','bsi','btn','cimb','danamon','mandiri','mega','permata'];
$bank = ['Bank Negara Indonesia (BNI)','Bank Rakyat Indonesia (BRI)','Bank BSA','Bank Syariah Indonesia (BSI)','Bank Tabungan Negara (BTN)','Bank CIMB Niaga','Bank Danamon','Bank Mandiri','Bank Mega','Bank Permata Indonesia'];
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
                     <h3>Rekening Bank</h3>
                     <p class="text-subtitle text-muted">MASTER DATA</p>
                  </div>
                  <div class="col-12 col-md-6 order-md-2 order-first">
                     <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Dashboard</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Rekening Bank</li>
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
                              <th>Bank</th>
                              <th>a/n</th>
                              <th width="18%">No. Rekening</th>
                              <th width="9%">**</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $n = 1;
                           foreach ($data as $d) {?>
                              <tr <?php if($d['status'] == '0'){echo "style='background-color:rgba(235,64,52,0.3)'";} ?>>
                                 <td><?php echo $n++ ?></td>
                                 <td><?php echo $bank[array_search($d['bank'],$inisial)]; ?></td>
                                 <td><?php echo $d['an'] ?></td>
                                 <td><?php echo $d['norek'] ?></td>
                                 <td>
                                    <a href="#d<?php echo $d['idrekening'] ?>" class="btn btn-sm btn-warning" data-bs-toggle="modal" title="Klik untuk ubah data"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#h<?php echo $d['idrekening'] ?>" class="btn btn-sm btn-danger" data-bs-toggle="modal" title="Klik untuk hapus data"><i class="bi bi-trash-fill"></i></a>
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
         <form action="<?php echo base_url('a/rekeningsimpan') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="proses" value="simpan">
            <div class="modal-body">
               <p style="text-align: justify;">masukkan detail inputan data baru, lalu pilih tombol <code>Simpan Data</code> untuk menyimpan data baru</p>
               <div class="form-group">
                  <label>Bank</label>
                  <select class="form-control form-control-sm" name="bank" required>
                     <?php for ($i=0; $i < count($inisial); $i++) {?>
                        <option value="<?php echo $inisial[$i] ?>"><?php echo $bank[$i] ?></option>
                     <?php } ?>
                  </select>
               </div>
               <div class="form-group">
                  <label>No. Rekening</label>
                  <input type="text" class="form-control form-control-sm" placeholder="Nomor Rekening" name="norek" maxlength="27" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required />
               </div>
               <div class="form-group">
                  <label>a/n</label>
                  <input type="text" class="form-control form-control-sm" placeholder="Atas Nama (Pemilik)" name="an" maxlength="63" required>
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
   <div class="modal fade text-left modal-borderless" id="d<?php echo $d['idrekening'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Ubah Detail Data</h5>
               <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i>
               </button>
            </div>
            <form action="<?php echo base_url('a/rekeningsimpan') ?>" method="post">
               <input type="hidden" name="proses" value="ubah">
               <input type="hidden" name="id" value="<?php echo $d['idrekening'] ?>">
               <div class="modal-body">
                  <p style="text-align: justify;">masukkan perubahan detail data, lalu pilih tombol <code>Simpan Data</code> untuk menyimpan perubahan data</p>
                  <div class="form-group">
                     <label>Bank</label>
                     <select class="form-control form-control-sm" name="bank" required>
                        <?php for ($i=0; $i < count($inisial); $i++) {?>
                           <option value="<?php echo $inisial[$i] ?>" <?php if($d['bank'] == $inisial[$i]){echo "selected";} ?>><?php echo $bank[$i] ?></option>
                        <?php } ?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label>No. Rekening</label>
                     <input type="text" class="form-control form-control-sm" placeholder="Nomor Rekening" name="norek" maxlength="27" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo $d['norek'] ?>" required />
                  </div>
                  <div class="form-group">
                     <label>a/n</label>
                     <input type="text" class="form-control form-control-sm" placeholder="Atas Nama (Pemilik)" name="an" maxlength="63" value="<?php echo $d['an'] ?>" required>
                  </div>
                  <div class="form-group">
                     <label>Status</label>
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
   <div class="modal fade text-left modal-borderless" id="h<?php echo $d['idrekening'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Hapus Data</h5>
               <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i>
               </button>
            </div>
            <div class="modal-body">
               <p style="text-align: justify;"><strong><code>PENTING!</code></strong> data yang telah dihapus tidak dapat dikembalikan, apakah anda yakin menghapus data <strong><?php echo $d['norek'] ?>?</strong> pilih tombol <code>Ya, Hapus</code> untuk menghapus data</p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-sm btn-grey" data-bs-dismiss="modal"><i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Batal</span></button>
               <a href="<?php echo base_url('a/rekeninghapus/'.$d['idrekening']) ?>" class="btn btn-sm btn-danger"><i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Ya, Hapus</span></a>
            </div>
         </div>
      </div>
   </div>
<?php } ?>
</html>