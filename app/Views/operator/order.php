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
									<li class="breadcrumb-item active" aria-current="page">Pesanan Tiket</li>
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
										<th>Pemesan</th>
										<th>Tanggal</th>
										<th>Kuota</th>
										<th>Total</th>
										<th>Status</th>
										<th>**</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$n = 1;
									foreach ($data as $d) {
										$cekdp = $db->query("select ifnull(count(*),0) as jumlah from bayar where idtiket = '".$d['idtiket']."' and status = '0' order by waktu desc limit 1")->getRowArray()['jumlah'];
										if($cekdp > 0){
											$cekdp = $db->query("select * from bayar where idtiket = '".$d['idtiket']."' and status = '0' order by waktu desc limit 1")->getRowArray();
											if($cekdp['uraian'] == 'Dp (Down Payment) / Uang Muka'){
												$cekdp = "-";
											}else{
												$cekdp = "";
											}
										}else{
											$cekdp = "";
										}
										?>
										<tr>
											<td><?php echo $n++ ?></td>
											<td><?php echo $d['an'] ?></td>
											<td><?php echo date('d/m/Y H:i', strtotime($d['waktu'])) ?></td>
											<td><?php echo number_format($d['kuota']).' orang' ?></td>
											<td><?php echo "Rp".number_format($d['total']) ?></td>
											<td
											<?php 
											if($cekdp == '-' || $d['status'] == '0' || $d['status'] == '3'){
												?>
												style="color: orange;"
											<?php }else if($d['status'] == '2' || $d['status'] == 'x'){ ?>
												style="color: red;"
											<?php }else if($d['status'] == '1'){ ?>
												style="color: green;"
												<?php
											} ?>
											>
											<?php
											if($d['status'] == ''){
												echo "Selesai (LUNAS)";
											}else if($d['status'] == '0'){
												echo "Verifikasi Jadwal";
											}else if($d['status'] == '1'){
												echo "Proses Pembayaran";
											}else  if($d['status'] == '2'){
												echo "Tidak Sesuai";
											}else if($d['status'] == '3'){
												echo "Jadwal Penuh";
											}else {
												echo "Dibatalkan";
											}
											?>
										</td>
										<td>
											<a href="<?php echo base_url('o/pesanandetail/'.$d['idtiket']) ?>" class="btn btn-sm btn-warning" title="Klik untuk ubah data"><i class="bi bi-pencil-square"></i></a>
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
<?php echo view('operator/ascript') ?>
</body>
</html>