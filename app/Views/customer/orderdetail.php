<?php
$db = db_connect();
$paket = $db->query("select * from paket where idpaket = '".$data['idpaket']."'")->getRowArray();
$total = 0;
foreach ($bayar as $b) {
    if($b['status'] == '0'){
        $total += $b['jumlah'];
    }
}
$cekdp = $db->query("select ifnull(count(*),0) as jumlah from bayar where idtiket = '".$data['idtiket']."' and status = '0' order by waktu desc limit 1")->getRowArray()['jumlah'];
if($cekdp > 0){
    $cekdp = $db->query("select * from bayar where idtiket = '".$data['idtiket']."' and status = '0' order by waktu desc limit 1")->getRowArray();
    if($cekdp['uraian'] == 'Dp (Down Payment) / Uang Muka'){
        $cekdp = "-";
    }else{
        $cekdp = "";
    }
}else{
    $cekdp = "";
}
?>
<!doctype html>
<html class="no-js" lang="zxx">
<?php echo view('customer/ahead') ?>
<body>
    <?php echo view('customer/aheader') ?>
    <div class="breadcrumb-area bg-image-3 ptb-150">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h3>PESANAN</h3>
                <ul>
                    <li><a href="<?php echo base_url('') ?>">Beranda</a></li>
                    <li><a href="<?php echo base_url('c/pesanan') ?>">Daftar Pesanan</a></li>
                    <li class="active">Detail Pesanan</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="contact-us ptb-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="checkout-progress">
                        <h4>Status Pesanan</h4>
                        <ul>
                            <li>Tiket : #<?php echo $data['idtiket'] ?></li>
                            <li>Paket : <?php echo $data['idpaket'] ?></li>
                            <li>Kuota : <?php echo number_format($data['kuota'])." orang" ?></li>
                            <li>Total : <?php echo "Rp".number_format($data['total']) ?></li>
                            <li
                            <?php
                            if($cekdp == '-' || $data['status'] == '0' || $data['status'] == '3'){
                                ?>
                                style="color: orange;"
                            <?php }else if($data['status'] == '2' || $data['status'] == 'x'){ ?>
                                style="color: red;"
                            <?php }else if($data['status'] == '1'){ ?>
                                style="color: green;"
                                <?php
                            } ?>
                            >
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
                        </li>
                    </ul>
                </div>
            </div>
            <div class="<?php if($data['total'] != $total && ($data['status'] == '1' || $data['status'] == '2')){echo "col-lg-5";}else{echo "col-lg-9";} ?>">
                <?php if($data['status'] == '3'){ ?>
                    <div class="checkout-progress">
                        <h4>Ubah Jadwal Wisata</h4>
                        <p style="text-align: center;font-size: 12pt;"><code>MOHON MAAF! <br>Jadwal kunjungan wisata yang anda pilih sudah kami periksa dan sudah penuh (<i>full booked</i>). Harap pilih jadwal lain untuk kami periksa kembali sesuai dengan jadwal kunjungan wisata yang tersedia.<br> Terima Kasih</code></p>
                        <ul>
                            <li>
                                <form method="post" action="<?php echo base_url('c/pesanan/rs') ?>">
                                    <input type="hidden" name="id" value="<?php echo $data['idtiket'] ?>">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="mt-2">Pilih jadwal lain</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="date" name="tanggal" value="<?php echo date('Y-m-d', strtotime($data['waktu'])) ?>" required>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="time" name="jam" value="<?php echo date('H:i', strtotime($data['waktu'])) ?>" min="<?php echo date('H:i', strtotime('08:00')) ?>" max="<?php echo date('H:i', strtotime('20:00')) ?>" required>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn mt-2" >UBAH JADWAL</button>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                <?php } ?>
                <div class="checkout-progress">
                    <h4>Detail Pesanan <a href="<?php echo base_url('') ?>" target="blank" title="Cetak Invoice"><i class="fa fa-print" style="font-size: 1.2em;float: right;"></i></a></h4>
                    <ul>
                        <strong>PEMESAN</strong>
                        <li><?php echo $data['an'] ?></li>
                        <li><?php echo $data['alamat'] ?></li>
                        <li><?php echo $data['telepon'] ?></li>
                        <li><?php echo $data['uraian'] ?></li>

                        <strong>PAKET</strong>
                        <li><?php echo $paket['paket'] ?></li>
                        <li><?php echo $paket['deskripsi'] ?></li>

                        <strong>PEMBAYARAN</strong>
                        <li>Harga : <?php echo "Rp".number_format($data['harga']) ?></li>
                        <li>Kuota : <?php echo number_format($data['kuota']) ?></li>
                        <li>Total : <?php echo "Rp".number_format($data['total']) ?></li>
                        <li>Terbayar : <?php echo "Rp".number_format($total) ?></li>

                        <strong>DETAIL PEMBAYARAN</strong>
                        <?php foreach ($bayar as $b) {?>
                            <?php if($b['status'] == 0){ ?>
                                <?php if($b['uraian'] == 'Dp (Down Payment) / Uang Muka'){ ?>
                                    <li style="color: orange;">
                                    <?php }else{ ?>
                                        <li>
                                        <?php } ?>
                                        <?php echo date('d/m/Y', strtotime($b['waktu'])) ?> : <?php echo "Rp".number_format($b['jumlah']).' ['.$b['uraian'].']' ?>

                                    </li>
                                <?php }else if($b['status'] == 1){ ?>
                                    <li><?php echo date('d/m/Y', strtotime($b['waktu'])) ?> : <?php echo "Rp".number_format($b['jumlah']).' [verifikasi]' ?></li>
                                <?php }else{ ?>
                                    <li><?php echo date('d/m/Y', strtotime($b['waktu'])) ?> : <?php echo "Rp".number_format($b['jumlah']).' [tidak sesuai]' ?></li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <?php if($data['total'] != $total && ($data['status'] == '1' || $data['status'] == '2')){ ?>
                    <div class="col-lg-4">
                        <div class="checkout-progress">
                            <h4>Pembayaran</h4>
                            <br>
                            <form action="<?php echo base_url('c/pesanan/b') ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="tiket" value="<?php echo $data['idtiket'] ?>">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="billing-info col-md-12">
                                            <label>Pengirim / a.n. </label>
                                            <input type="text" name="an" placeholder="Pengirim" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="billing-select col-md-12">
                                            <label>Pembayaran Untuk</label>
                                            <select name="uraian" required>
                                                <option>Dp (Down Payment) / Uang Muka</option>
                                                <option>Titipan</option>
                                                <option>Pelunasan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="billing-info col-md-12">
                                            <label>Jumlah</label>
                                            <input type="number" name="jumlah" placeholder="Jml. Bayar" min="10000" maxlength="<?php echo $data['total'] - $total ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="billing-select col-md-12">
                                            <label>Rekening Tujuan</label>
                                            <select name="rekening" required>
                                                <?php foreach ($bank as $r) {?>
                                                    <option value="<?php echo $r['idrekening'] ?>"><?php echo $r['bank'].' : '.$r['norek'].' ['.$r['an'].']' ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="billing-info col-md-12">
                                            <label>Bukti Transfer</label>
                                            <input type="file" name="bukti" accept="image/*" required>
                                        </div>
                                    </div>
                                    <div class="billing-back-btn">
                                        <div class="billing-btn">
                                            <button type="submit">Proses Pembayaran</button>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php echo view('customer/afooter') ?>
<?php echo view('customer/ascript') ?>
</body>
</html>