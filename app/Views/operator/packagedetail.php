<?php
$db = db_connect();
date_default_timezone_set('Asia/Jakarta');
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
							<h3>Paket Wisata</h3>
							<p class="text-subtitle text-muted">PAKET DAN PESANAN</p>
						</div>
						<div class="col-12 col-md-6 order-md-2 order-first">
							<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="<?php echo base_url('o/paket') ?>">Paket Wisata</a></li>
									<li class="breadcrumb-item active" aria-current="page">Detail Paket <?php echo $data['paket'] ?></li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<section class="section">
					<div class="card">
						<form method="post" action="<?php echo base_url('o/paketubah') ?>">
							<input type="hidden" name="id" value="<?php echo $data['idpaket'] ?>">
							<div class="card-body">
								<a href="#tambahharga" data-bs-toggle="modal" class="btn icon icon-left btn-success btn-sm" style="float: right;"><i data-feather="plus-square"></i> Tambah Tarif</a>
								<a href="#tambahagenda" data-bs-toggle="modal" class="btn icon icon-left btn-success btn-sm" style="float: right;margin-right: 10px;"><i data-feather="plus-square"></i> Tambah Agenda</a>
								<br><br>
								<h5>Paket Wisata</h5>
								<div class="row">
									<div class="form-group col-8">
										<label>Paket</label>
										<input type="text" name="paket" class="form-control form-control-sm" placeholder="Nama Paket Wisata" value="<?php echo $data['paket'] ?>" maxlength="99" required>
									</div>
									<div class="form-group col-2">
										<label>Durasi</label>
										<input type="text" name="durasi" class="form-control form-control-sm" placeholder="Durasi Paket Wisata" value="<?php echo $data['durasi'] ?>" maxlength="27" required>
									</div>
									<div class="form-group col-2">
										<label>Batas Konfirmasi</label>
										<input type="number" name="konfirmasi" class="form-control form-control-sm" placeholder="Batas Konfirmasi (minggu)" value="<?php echo $data['konfirmasi'] ?>" min="1" max="9" required>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-6">
										<label>Deskripsi</label>
										<textarea class="form-control form-control-sm" placeholder="Deskripsi Paket Wisata" name="deskripsi" rows="8" style="resize: none;" required><?php echo nl2br($data['deskripsi']) ?></textarea>
									</div>
									<div class="form-group col-6">
										<label>Fasilitas</label>
										<textarea class="form-control form-control-sm" placeholder="Fasilitas Paket Wisata" name="fasilitas" rows="8" style="resize: none;" required><?php echo nl2br($data['fasilitas']) ?></textarea>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<a href="<?php echo base_url('o/paket') ?>" class="btn btn-sm btn-primary"><span class="d-none d-sm-block">Batal</span></a>
								<button type="submit" class="btn btn-sm btn-success" style="float: right;"><i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Simpan Data</span></button>
							</div>
						</form>
						<hr>
						<div class="card-body">
							<h5>Agenda Wisata</h5>
							<?php foreach ($agenda as $a) {?>
								<div class="row">
									<p style="text-align: justify;">
										<?php if(count($agenda) > 1){ ?>
											<a href="<?php echo base_url('o/pakethapusagenda/'.$a['idagenda']) ?>" title="Klik untuk menghapus data" style="float: right;"><i class="bi bi-x-lg"></i></a>
										<?php } ?>
										<b><?php echo "Hari ke-".$a['hari'] ?></b><br>
										<i><?php echo str_replace("_", "-", $a['waktu']) ?></i><br>
										<?php echo $a['agenda'] ?>
									</p>
								</div>
							<?php } ?>
						</div>
						<div class="card-body">
							<h5>Tarif Wisata</h5>
							<?php foreach ($harga as $h) {?>
								<div class="row">
									<p style="text-align: justify;">
										<?php if(count($harga) > 1){ ?>
											<a href="<?php echo base_url('o/pakethapusharga/'.$h['idharga']) ?>" title="Klik untuk menghapus data" style="float: right;"><i class="bi bi-x-lg"></i></a>
										<?php } ?>
										<?php if($h['jenis'] == '0'){ ?>
											<b>Satuan</b><br>
											<i>Harga per orang</i><br>
										<?php }else{ ?>
											<b>Paket</b><br>
											<i><?php echo "Minimum ".$h['minimum']." orang" ?></i><br>
										<?php } ?>
										<?php echo "Rp".number_format($h['harga']) ?>
									</p>
								</div>
							<?php } ?>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<?php echo view('operator/ascript') ?>
</body>
<div class="modal fade text-left modal-borderless" id="tambahagenda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Agenda Baru</h5>
				<button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i>
				</button>
			</div>
			<form action="<?php echo base_url('o/paketubahagenda') ?>" method="post">
				<input type="hidden" name="id" value="<?php echo $data['idpaket'] ?>">
				<div class="modal-body">
					<p style="text-align: justify;">masukkan detail inputan data baru, lalu pilih tombol <code>Simpan Data</code> untuk menyimpan data baru</p>
					<div class="row">
						<div class="form-group col-4">
							<label>Hari ke-</label>
							<input type="number" name="hari" class="form-control form-control-sm" placeholder="Hari ke-" min="1" max="9" required>
						</div>
						<div class="form-group col-4">
							<label>Dari</label>
							<input type="time" name="dari" class="form-control form-control-sm" value="<?php echo date('H:i') ?>" required>
						</div>
						<div class="form-group col-4">
							<label>Sampai</label>
							<input type="time" name="sampai" class="form-control form-control-sm" value="<?php echo date('H:i') ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label>Agenda</label>
						<textarea class="form-control form-control-sm" placeholder="Uraian Agenda" name="kegiatan" rows="8" style="resize: none;" required></textarea>
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
<div class="modal fade text-left modal-borderless" id="tambahharga" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Tarif Baru</h5>
				<button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i>
				</button>
			</div>
			<form action="<?php echo base_url('o/paketubahharga') ?>" method="post">
				<input type="hidden" name="id" value="<?php echo $data['idpaket'] ?>">
				<div class="modal-body">
					<p style="text-align: justify;">masukkan detail inputan data baru, lalu pilih tombol <code>Simpan Data</code> untuk menyimpan data baru</p>
					<div class="row">
						<div class="form-group col-4">
							<label>Jenis</label>
							<select class="form-control form-control-sm" name="jenis" required>
								<?php
								$cari = $db->query("select * from harga where jenis = '0' and idpaket = '".$data['idpaket']."'")->getResultArray();
								if(count($cari) == '0'){
									?>
									<option value="0">Per Orang</option>
								<?php } ?>
								<option value="1">Paket</option>
							</select>
						</div>
						<div class="form-group col-3">
							<label>Minimum</label>
							<input type="number" name="minimum" class="form-control form-control-sm" placeholder="Min. Orang" min="1" value="1" required>
						</div>
						<div class="form-group col-5">
							<label>Harga</label>
							<input type="number" name="jumlah" class="form-control form-control-sm" placeholder="Harga Paket" min="10000" value="10000" required>
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
</html>