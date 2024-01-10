<?php
$db = db_connect();
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
$creator = $db->query("select nama from pengguna where idpengguna = '".$data['idpengguna']."'")->getRowArray()['nama'];
?>
<!doctype html>
<html class="no-js" lang="zxx">
<?php echo view('site/ahead') ?>
<body>
    <?php echo view('site/aheader') ?>
    <div class="breadcrumb-area bg-image-3 ptb-150">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h3>VIDEO</h3>
                <ul>
                    <li><a href="<?php echo base_url('') ?>">Beranda</a></li>
                    <li class="active">Dokumentasi Video Kegiatan</li>
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
                            <?php
                            if($data['thumbnail'] == ''){
                                $thumbnail = $db->query("select thumbnail from thumbnail where idpost = '".$data['idpost']."'")->getRowArray()['thumbnail'];
                                ?>
                                <video style="object-fit: cover;width: 100%;" controls autoplay><source src="<?php echo base_url('/assets/video/'.$thumbnail) ?>" type=""/>
                                </video>
                            <?php }else{
                                $thumbnail = explode("?v=", $data['thumbnail'])[1];
                                ?>
                                <iframe width="100%" height="500" src="https://www.youtube.com/embed/<?php echo $thumbnail ?>"></iframe>
                            <?php } ?>
                            <div class="blog-content">
                                <h2><?php echo $data['judul'] ?></h2>
                                <div class="blog-date-categori">
                                    <ul>
                                        <li><?php echo tgl_indo(date('Y-m-d', strtotime($data['waktu']))) ?></li>
                                        <li><?php echo $creator ?></li>
                                    </ul>
                                </div>
                            </div>
                            <p><?php echo nl2br($data['isi']) ?></p>
                            <?php
                            $creator = $db->query("select * from pengguna where idpengguna = '".$data['idpengguna']."'")->getRowArray();
                            $thumb = base_url('assets/gambar/profil/'.$creator['foto']);
                            if($creator['foto'] == ''){
                                $thumb = base_url('assets/gambar/default/'.$creator['jekel'].'.png');
                            }
                            ?>
                            <div class="administrator-wrapper">
                                <div class="col-lg-2">
                                    <img src="<?php echo $thumb ?>" alt="" width="100%">
                                </div>
                                <div class="col-lg-10">
                                    <div class="administrator-content">
                                        <h4><?php echo $creator['nama'] ?></h4>
                                        <p>
                                            <?php echo $creator['alamat'] ?><br>
                                            <?php echo '********'.substr($creator['telepon'], 8, strlen($creator['telepon'])) ?><br>
                                            <?php
                                            for ($i=0; $i < rand(8,36); $i++) {
                                                echo "*";
                                            }
                                            echo '@'.explode("@", $creator['email'])[1];
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-comment-wrapper mt-55">
                            <h4 class="blog-dec-title">Komentar : <?php echo number_format(count($komentar)) ?></h4>
                            <?php
                            foreach ($komentar as $k) {
                                $s1 = $db->query("select * from pengguna where idpengguna = '".$k['idpengguna']."'")->getRowArray();
                                $thumb1 = base_url('assets/gambar/profil/'.$s1['foto']);
                                if($s1['foto'] == ''){
                                    $thumb1 = base_url('assets/gambar/default/'.$s1['jekel'].'.png');
                                }
                                if($k['induk'] == '0'){
                                    $balasan = $db->query("select * from komentar where induk = '".$k['idkomentar']."' order by waktu desc")->getResultArray();
                                    ?>
                                    <div class="single-comment-wrapper mt-35">
                                        <div class="col-lg-1">
                                            <img src="<?php echo $thumb1 ?>" alt="" width="100%">
                                        </div>
                                        <div class="col-lg-11">
                                            <div class="blog-comment-content">
                                                <h4><?php echo $s1['nama'] ?> <small><i class="fa fa-calendar"> <?php echo tgl_indo(date('Y-m-d', strtotime($k['waktu']))).' '.date('H:i', strtotime($k['waktu'])) ?></i></small></h4>
                                                <p style="font-size: 9pt;line-height: 12pt;font-style: italic;"><?php echo nl2br($k['komentar']) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    foreach ($balasan as $b) {
                                        $s2 = $db->query("select * from pengguna where idpengguna = '".$b['idpengguna']."'")->getRowArray();
                                        $thumb2 = base_url('assets/gambar/profil/'.$s2['foto']);
                                        if($s2['foto'] == ''){
                                            $thumb2 = base_url('assets/gambar/default/'.$s2['jekel'].'.png');
                                        }
                                        ?>
                                        <div class="single-comment-wrapper ml-70">
                                            <div class="col-lg-1">
                                                <img src="<?php echo $thumb2 ?>" alt="" width="100%">
                                            </div>
                                            <div class="col-lg-11">
                                                <div class="blog-comment-content">
                                                    <h4><?php echo $s2['nama'] ?> <small><i class="fa fa-calendar"> <?php echo tgl_indo(date('Y-m-d', strtotime($b['waktu']))).' '.date('H:i', strtotime($b['waktu'])) ?></i></small></h4>
                                                    <p style="font-size: 9pt;line-height: 12pt;font-style: italic;"><?php echo nl2br($b['komentar']) ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="blog-reply-wrapper mt-50">
                            <h4 class="blog-dec-title">TINGGALKAN KOMENTAR</h4>
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-leave">
                                            <textarea placeholder="Komentar Anda..."></textarea>
                                            <input type="submit" value="KIRIM KOMENTAR">
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                            <h4 class="blog-widget-title mb-25">Post Terbaru</h4>
                            <div class="blog-recent-post">
                                <?php foreach ($terbaru as $tb) {?>
                                    <div class="recent-post-wrapper mb-25">
                                        <div class="recent-post-content">
                                            <h4><a href="<?php echo base_url('video/d/'.$tb['idpost']) ?>"><?php echo $tb['judul'] ?></a></h4>
                                            <span><?php echo tgl_indo(date('Y-m-d', strtotime($tb['waktu']))) ?></span>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="blog-widget mb-40">
                            <h4 class="blog-widget-title mb-25">Kategori</h4>
                            <div class="blog-categori">
                                <ul>
                                    <?php
                                    for ($i=0; $i < count($kategori); $i++) {
                                        $count = $db->query("select count(*) as jumlah from post where kategori = '".$i."'")->getRowArray()['jumlah'];
                                        ?>
                                        <li><a href="<?php echo base_url($tautan[$i]) ?>"><?php echo $kategori[$i] ?> (<?php echo number_format($count) ?>)</a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo view('site/afooter') ?>
    <?php echo view('site/ascript') ?>
</body>
</html>