<?php
$db = db_connect();
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
							<h3>Pesanan Tiket</h3>
							<p class="text-subtitle text-muted">PESANAN</p>
						</div>
						<div class="col-12 col-md-6 order-md-2 order-first">
							<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="<?php echo base_url('o/pesanan') ?>">Pesanan Tiket</a></li>
									<li class="breadcrumb-item active" aria-current="page">Detail Pesanan #<?php echo $data['idtiket'] ?></li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<section class="section">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-8">
									<div class="row">
										<div class="col-2">Kode Pesan</div>
										<div class="col-10"><strong>: #<?php echo $data['idtiket'] ?></strong></div>
									</div>
									<div class="row">
										<div class="col-2">Tanggal</div>
										<div class="col-10">
											<?php if($data['status'] == '0'){ ?>
												<button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#verifikasi" type="button" title="Klik untuk memverifikasi jadwal kunjungan wisata" style="font-size: 8pt;">
													<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="height: 11px;width: 11px;"></span>
													<?php echo date('d/m/Y H:i', strtotime($data['waktu'])) ?>
												</button>
											<?php }else{ ?>
												<strong>: <?php echo date('d/m/Y H:i', strtotime($data['waktu'])) ?></strong>
											<?php } ?>
										</div>
									</div>
									<div class="row">
										<div class="col-2">Pemesan</div>
										<div class="col-10"><strong>: <?php echo $data['an'] ?></strong></div>
									</div>
									<div class="row">
										<div class="col-2">Alamat</div>
										<div class="col-10"><strong>: <?php echo $data['alamat'] ?></strong></div>
									</div>
									<div class="row">
										<div class="col-2">Telepon</div>
										<div class="col-10"><strong>: <?php echo $data['telepon'] ?></strong></div>
									</div>
									<hr>
									<div class="row">
										<div class="col-2">Paket</div>
										<div class="col-10"><strong>: <?php echo $paket['paket'] ?></strong></div>
									</div>
									<div class="row">
										<div class="col-2">Durasi</div>
										<div class="col-10"><strong>: <?php echo $paket['durasi'] ?></strong></div>
									</div>
									<div class="row">
										<div class="col-2">Kuota</div>
										<div class="col-10"><strong>: <?php echo $data['kuota'].' orang' ?></strong></div>
									</div>
									<div class="row">
										<div class="col-2">Harga</div>
										<div class="col-10"><strong>: <?php echo "Rp".number_format($data['harga']) ?></strong></div>
									</div>
									<div class="row">
										<div class="col-2">Total</div>
										<div class="col-10"><strong>: <?php echo "Rp".number_format($data['total']) ?></strong></div>
									</div>
									<div class="row">
										<div class="col-2">Status</div>
										<div class="col-10"><strong>:
											<?php
											if($data['status'] == ''){
												echo "Selesai (LUNAS)";
											}else if($data['status'] == '0'){
												echo "Verifikasi Jadwal";
											}else if($data['status'] == '1'){
												echo "Proses Pembayaran";
											}else  if($data['status'] == '2'){
												echo "Tidak Sesuai";
											}else if($data['status'] == '3'){
												echo "Jadwal Penuh";
											}else {
												echo "Dibatalkan";
											}
											?>
										</strong></div>
									</div>
								</div>
								<div class="col-4">
									<p style="text-align: center;">
										<img src="<?php echo base_url('assets/gambar/thumbnail/'.$paket['thumbnail']) ?>" width="100%">
									</p>
								</div>
							</div>
							<hr>
							<div class="row">
								<h4>Detail Pembayaran</h4>
								<table class="table">
									<thead>
										<tr>
											<th width="5%">#</th>
											<th>Tanggal</th>
											<th>Keterangan</th>
											<th>Ditangguhkan</th>
											<th>Terbayar</th>
											<th>**</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$n = 1;
										$n1 = 0;
										$n2 = 0;
										foreach ($bayar as $b) {
											?>
											<?php if($b['uraian'] == 'Dp (Down Payment) / Uang Muka'){ ?>
												<tr style="color: orange;"><?php }else{ ?><tr><?php } ?>
												<td width="5%"><?php echo $n++ ?></td>
												<td><?php echo date('d/m/Y H:i', strtotime($b['waktu'])) ?></td>
												<td><?php echo $b['uraian'] ?></td>
												<td>
													<?php
													if($b['status'] == '1' || $b['status'] == '2'){
														$n1 += $b['jumlah'];
														echo "Rp".number_format($b['jumlah']);
													}
													?>
												</td>
												<td>
													<?php
													if($b['status'] == '0'){
														$n2 += $b['jumlah'];
														echo "Rp".number_format($b['jumlah']);
													}
													?>
												</td>
												<td>
													<a href="#d<?php echo $b['idbayar'] ?>" data-bs-toggle="modal">Bukti</a>
												</td>
											</tr>
										<?php } ?>
									</tbody>
									<tfoot>
										<tr>
											<th colspan="3">JUMLAH TERBAYAR</th>
											<th><?php echo "Rp".number_format($n1) ?></th>
											<th colspan="2"><?php echo "Rp".number_format($n2) ?></th>
										</tr>
										<tr>
											<th colspan="4">TOTAL BIAYA</th>
											<th colspan="2"><?php echo "Rp".number_format($data['total']) ?></th>
										</tr>
										<tr>
											<th colspan="4">SISA (KEKURANGAN)</th>
											<th colspan="2"><?php echo "Rp".number_format($data['total'] - $n2) ?></th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<?php echo view('operator/ascript') ?>
</body>
<div class="modal fade text-left modal-borderless" id="verifikasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Verifikasi Jadwal Kunjungan Wisata</h5>
				<button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i>
				</button>
			</div>
			<div class="modal-body">
				<p style="text-align: justify;">
					Pastikan anda sudah memeriksa jadwal kunjungan yang tersedia lalu pilih tombol verifikasi dibawah. Jika jadwal tersedia pilih tombol <code>Simpan Jadwal</code>. Jika jadwal tidak tersedia pilih tombol <code>Ubah Jadwal</code>
				</p>
			</div>
			<div class="modal-footer">
				<a href="<?php echo base_url('o/pesanan/simpanjadwal/'.$data['idtiket']) ?>" class="btn btn-sm btn-success">Simpan Jadwal</a>
				<a href="<?php echo base_url('o/pesanan/ubahjadwal/'.$data['idtiket']) ?>" class="btn btn-sm btn-danger">Ubah Jadwal</a>
			</div>
		</div>
	</div>
</div>
<?php foreach ($bayar as $b) {?>
	<div class="modal fade text-left modal-borderless" id="d<?php echo $b['idbayar'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Detail Data Pembayaran</h5>
					<button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<?php if($b['status'] == '1'){ ?>
						<p style="text-align: justify;">pilih tombol <code>Sesuai</code> untuk menerima bukti pembayaran, pilih tombol <code>Tidak Sesuai</code> untuk menolak bukti pembayaran</p>
					<?php } ?>
					<img src="<?php echo base_url('assets/gambar/thumbnail/'.$b['bukti']) ?>" width="100%">
				</div>
				<div class="modal-footer">
					<?php if($b['status'] == '1'){ ?>
						<a href="<?php echo base_url('o/pesanan/terima/'.$b['idbayar']) ?>" class="btn btn-sm btn-success">Sesuai</a>
						<a href="<?php echo base_url('o/pesanan/tolak/'.$b['idbayar']) ?>" class="btn btn-sm btn-danger">Tidak Sesuai</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
</html>