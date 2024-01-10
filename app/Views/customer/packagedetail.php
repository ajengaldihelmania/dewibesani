<?php
$db = db_connect();
date_default_timezone_set("Asia/Bangkok");
function tgl_indo($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
$kategori = ['Wisata','Kuliner','Homestay','Fashion','Kriya','Berita','Foto','Video'];
$tautan = ['wisata','kuliner','homestay','fashion','kriya','berita','foto','video'];
?>
<!doctype html>
<html class="no-js" lang="zxx">
<?php echo view('customer/ahead') ?>
<body>
    <?php echo view('customer/aheader') ?>
    <div class="breadcrumb-area bg-image-3 ptb-150">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h3>BERITA</h3>
                <ul>
                    <li><a href="<?php echo base_url('') ?>">Beranda</a></li>
                    <li class="active">Berita dan Kabar Terkini</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="blog-page-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-9 col-md-8">
                    <div class="blog-details-wrapper">
                        <div class="single-blog-wrapper">
                            <div class="blog-img mb-30">
                                <img src="<?php echo base_url('assets/gambar/thumbnail/'.$data['thumbnail']) ?>" alt="">
                            </div>
                            <div class="blog-content">
                                <h2><?php echo $data['paket'] ?></h2>
                                <div class="blog-date-categori">
                                    <ul>
                                        <li><?php echo $data['durasi'] ?></li>
                                        <li><?php echo "Waktu Konfirmasi : ".$data['konfirmasi']." minggu" ?></li>
                                    </ul>
                                </div>
                            </div>
                            <p>
                                <?php echo nl2br($data['deskripsi']) ?><br><br>
                                <strong>Agenda</strong><br>
                                <?php foreach ($agenda as $a) {?>
                                    <code style="color: black;font-weight: bold;"><?php echo str_replace("_", "-", $a['waktu']) ?></code><br>
                                    <?php echo $a['agenda'] ?><br>
                                <?php } ?>
                                <br>
                                <strong>Fasilitas</strong><br>
                                <?php echo nl2br($data['fasilitas']) ?><br><br>
                                <strong>Harga</strong><br>
                                <?php foreach ($harga as $h) {?>
                                    <?php if($h['jenis'] == 0){ ?>
                                        <strong> <?php echo "Rp".number_format($h['harga'])."/orang" ?></strong>
                                    <?php }else{ ?>
                                        <?php echo "Rp".number_format($h['harga'])."/orang (min. ".number_format($h['minimum'])." orang)" ?>
                                    <?php } ?>
                                    <br>
                                <?php } ?>
                            </p>
                            <div class="blog-reply-wrapper mt-50">
                                <h4 class="blog-dec-title">MASUKKAN DETAIL UNTUK MEMESAN TIKET</h4>
                                <form action="<?php echo base_url('c/pesanan/s') ?>" method="post">
                                    <input type="hidden" name="paket" value="<?php echo $data['idpaket'] ?>">
                                    <input type="hidden" name="pemesan" value="<?php echo session()->get('low') ?>">
                                    <input type="hidden" name="id" value="<?php echo rand(100000000,999999999) ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <input type="text" name="an" placeholder="Nama Pemesan" required autofocus>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="number" name="kuota" placeholder="Kuota" min="1" required><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <input type="date" name="tanggal" value="<?php echo date('Y-m-d') ?>" required>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="time" name="jam" value="<?php echo date('H:i') ?>" min="<?php echo date('H:i', strtotime('08:00')) ?>" max="<?php echo date('H:i', strtotime('20:00')) ?>" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="telepon" placeholder="Nomor yang bisa dihubungi" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="14" minlength="6" required />
                                                </div>
                                            </div><br><br>
                                            <textarea name="alamat" placeholder="Alamat Lengkap" style="resize: none;" required></textarea><br><br>
                                            <textarea name="keterangan" placeholder="Keterangan Tambahan" style="resize: none;" required></textarea><br><br>
                                            <div class="text-leave">
                                                <code>PENTING! Pastikan semua detail pesanan sudah sesuai, sebelum memilih tombol "PESAN PAKET"</code><br>
                                                <input type="submit" value="PESAN PAKET">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-4">
                    <div class="blog-sidebar-wrapper sidebar-mrg">
                        <?php
                        $thumb = base_url('assets/gambar/thumbnail/'.$ketua['foto']);
                        if($ketua['foto'] == ''){
                            $thumb = base_url('assets/gambar/default/'.$ketua['jekel'].'.png');
                        }
                        ?>
                        <div class="blog-widget mb-40">
                            <div class="blog-author">
                                <a href="#"><img src="<?php echo $thumb ?>" alt="" width="100%"></a>
                                <h4><a href="#"><?php echo $ketua['nama'] ?></a></h4>
                                <span><?php echo $ketua['jabatan'] ?></span>
                            </div>
                        </div>
                        <div class="blog-widget mb-45">
                            <h4 class="blog-widget-title mb-25">Paket Lain</h4>
                            <div class="blog-recent-post">
                                <?php foreach ($paket as $tb) {?>
                                    <div class="recent-post-wrapper mb-25">
                                        <div class="recent-post-img">
                                            <a href="<?php echo base_url('c/paket/d/'.$tb['idpaket']) ?>"><img src="<?php echo base_url('assets/gambar/thumbnail/'.$tb['thumbnail']) ?>" alt=""></a>
                                        </div>
                                        <div class="recent-post-content">
                                            <h4><a href="<?php echo base_url('c/paket/d/'.$tb['idpaket']) ?>"><?php echo $tb['paket'] ?></a></h4>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo view('customer/afooter') ?>
    <?php echo view('customer/ascript') ?>
</body>
</html>