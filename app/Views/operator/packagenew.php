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
									<li class="breadcrumb-item active" aria-current="page">Tambah Data Baru</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<section class="section">
					<div class="card">
						<div class="card-body">
							<a href="#tambahharga" data-bs-toggle="modal" class="btn icon icon-left btn-success btn-sm" style="float: right;"><i data-feather="plus-square"></i> Tambah Tarif</a>
							<a href="#tambahagenda" data-bs-toggle="modal" class="btn icon icon-left btn-success btn-sm" style="float: right;margin-right: 10px;"><i data-feather="plus-square"></i> Tambah Agenda</a>
							<br><br>
							<h5>Paket Wisata</h5>
							<div class="row">
								<div class="col-2">Paket</div>
								<div class="col-10"><strong>: <?php echo $data['paket'] ?></strong></div>
							</div>
							<div class="row">
								<div class="col-2">Durasi</div>
								<div class="col-10"><strong>: <?php echo $data['durasi'] ?></strong></div>
							</div>
							<div class="row">
								<div class="col-2">Konfirmasi</div>
								<div class="col-10"><strong>: <?php echo $data['konfirmasi'].' Minggu' ?></strong></div>
							</div>
						</div>
						<div class="card-body">
							<h5>Agenda Wisata</h5>
							<?php for ($i=0; $i < count($agenda); $i++) {?>
								<div class="row">
									<p style="text-align: justify;">
										<a href="<?php echo base_url('o/pakethapusagenda/'.htmlspecialchars(serialize($data)).'/'.htmlspecialchars(serialize($agenda)).'/'.htmlspecialchars(serialize($harga)).'/'.$i) ?>" title="Klik untuk menghapus data" style="float: right;"><i class="bi bi-x-lg"></i></a>
										<b><?php echo "Hari ke-".$agenda[$i]['hari'] ?></b><br>
										<i><?php echo str_replace("_", "-", $agenda[$i]['waktu']) ?></i><br>
										<?php echo $agenda[$i]['agenda'] ?>
									</p>
								</div>
							<?php } ?>
						</div>
						<div class="card-body">
							<h5>Tarif Wisata</h5>
							<?php for ($i=0; $i < count($harga); $i++) {?>
								<div class="row">
									<p style="text-align: justify;">
										<a href="<?php echo base_url('o/pakethapusharga/'.htmlspecialchars(serialize($data)).'/'.htmlspecialchars(serialize($agenda)).'/'.htmlspecialchars(serialize($harga)).'/'.$i) ?>" title="Klik untuk menghapus data" style="float: right;"><i class="bi bi-x-lg"></i></a>
										<?php if($harga[$i]['jenis'] == '0'){ ?>
											<b>Satuan</b><br>
											<i>Harga per orang</i><br>
										<?php }else{ ?>
											<b>Paket</b><br>
											<i><?php echo "Minimum ".$harga[$i]['minimum']." orang" ?></i><br>
										<?php } ?>
										<?php echo "Rp".number_format($harga[$i]['harga']) ?>
									</p>
								</div>
							<?php } ?>
						</div>
						<?php if(count($agenda) > 0 && count($harga) > 0){ ?>
							<div class="card-footer">
								<form method="post" action="<?php echo base_url('o/paketsimpan') ?>">
									<input type="hidden" name="data" value="<?php echo htmlspecialchars(serialize($data)) ?>">
									<input type="hidden" name="agenda" value="<?php echo htmlspecialchars(serialize($agenda)) ?>">
									<input type="hidden" name="harga" value="<?php echo htmlspecialchars(serialize($harga)) ?>">
									<button type="submit" class="btn icon icon-left btn-success btn-sm" style="float: right;">Simpan Data</button>
								</form>
							</div>
						<?php } ?>
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
			<form action="<?php echo base_url('o/pakettambahagenda') ?>" method="post">
				<input type="hidden" name="data" value="<?php echo htmlspecialchars(serialize($data)) ?>">
				<input type="hidden" name="agenda" value="<?php echo htmlspecialchars(serialize($agenda)) ?>">
				<input type="hidden" name="harga" value="<?php echo htmlspecialchars(serialize($harga)) ?>">
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
			<form action="<?php echo base_url('o/pakettambahharga') ?>" method="post">
				<input type="hidden" name="data" value="<?php echo htmlspecialchars(serialize($data)) ?>">
				<input type="hidden" name="agenda" value="<?php echo htmlspecialchars(serialize($agenda)) ?>">
				<input type="hidden" name="harga" value="<?php echo htmlspecialchars(serialize($harga)) ?>">
				<div class="modal-body">
					<p style="text-align: justify;">masukkan detail inputan data baru, lalu pilih tombol <code>Simpan Data</code> untuk menyimpan data baru</p>
					<div class="row">
						<div class="form-group col-4">
							<label>Jenis</label>
							<select class="form-control form-control-sm" name="jenis" required>
								<?php
								$cari = array_search("0", array_column($harga, 'jenis'));
								if($cari == ''){
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