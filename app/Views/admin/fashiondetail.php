<?php
$db = db_connect();
?>
<!DOCTYPE html>
<html lang="en">
<?php echo view('admin/ahead') ?>
<link rel="stylesheet" href="<?php echo base_url('assets/admin/css/widgets/chat.css') ?>">
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
							<h3>Fashion</h3>
							<p class="text-subtitle text-muted">POSTINGAN</p>
						</div>
						<div class="col-12 col-md-6 order-md-2 order-first">
							<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="<?php echo base_url('a/fashion') ?>">Fashion</a></li>
									<li class="breadcrumb-item active" aria-current="page"><?php echo $data['judul'] ?></li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<section class="section">
					<div class="row">
						<div class="card col-7">
							<div class="card-body">
								<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
									<div class="carousel-inner">
										<?php
										$n = 0;
										foreach ($thumbnail as $t) {?>
											<div class="carousel-item <?php if($n++ == '0'){echo "active";} ?>">
												<img src="<?php echo base_url('assets/gambar/thumbnail/'.$t['thumbnail']) ?>" class="d-block w-100" alt="...">
											</div>
										<?php } ?>
									</div>
									<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Previous</span>
									</a>
									<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Next</span>
									</a>
								</div>
								<hr>
								<h4 class="card-title"><?php echo $data['judul'] ?></h4>
								<p style="text-align: justify;"><?php echo nl2br($data['isi']) ?></p>
								<hr>
								<i><?php echo $data['tag'] ?></i>
							</div>
						</div>
						<div class="card col-5">
							<div class="card-header">
								<h4 class="card-title">Komentar <?php echo count($comment) ?></h4>
							</div>
							<div class="card-body" style="overflow-y: auto;max-height: 500px;">
								<div class="card-body bg-grey">
									<div class="chat-content">
										<?php
										foreach ($comment as $c) {
											$balasan = $db->query("select * from komentar where induk = '".$c['idkomentar']."' and idpost = '".$data['idpost']."' order by waktu desc")->getResultArray();
											if($c['induk'] == 0){
												$p = $db->query("select * from pengguna where idpengguna = '".$c['idpengguna']."'")->getRowArray();
												$thumb = base_url('assets/gambar/profil/'.$p['foto']);
												if($p['foto'] == ''){
													$thumb = base_url('assets/gambar/default/'.$p['jekel'].'.png');
												}
												$p = $db->query("select nama from pengguna where idpengguna = '".$c['idpengguna']."'")->getRowArray()['nama'];
												?>
												<div class="chat chat-left">
													<div class="chat-body">
														<div class="chat-message" style="font-size: 9pt;width: 100%;">
															<div class="avatar bg-warning me-3">
																<img src="<?php echo $thumb ?>" alt="" srcset="">
															</div>
															<strong><?php echo $p ?></strong><small style="float: right;font-size: 6pt;"><?php echo date('d/m/Y H:i', strtotime($c['waktu'])) ?></small><br>
															<?php echo nl2br($c['komentar']) ?>
															<?php
															foreach ($balasan as $b) {
																$p = $db->query("select * from pengguna where idpengguna = '".$b['idpengguna']."'")->getRowArray();
																$thumb = base_url('assets/gambar/profil/'.$p['foto']);
																if($p['foto'] == ''){
																	$thumb = base_url('assets/gambar/default/'.$p['jekel'].'.png');
																}
																$p = $db->query("select nama from pengguna where idpengguna = '".$b['idpengguna']."'")->getRowArray()['nama'];
																?>
																<div class="chat-body">
																	<div class="chat-message" style="font-size: 9pt;width: 100%;">
																		<div class="avatar bg-warning me-3">
																			<img src="<?php echo $thumb ?>" alt="" srcset="">
																		</div>
																		<strong><?php echo $p ?></strong><small style="float: right;font-size: 6pt;"><?php echo date('d/m/Y H:i', strtotime($b['waktu'])) ?></small><br>
																		<?php echo nl2br($b['komentar']) ?>
																	</div>
																</div>
															<?php } ?>
														</div>
													</div>
												</div>
											<?php } ?>
										<?php } ?>
									</div>
								</div>
							</div>
							<br><br><br><br><br>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<?php echo view('admin/ascript') ?>
</body>
</html>