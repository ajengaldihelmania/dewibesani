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
?>
<!doctype html>
<html class="no-js" lang="zxx">
<?php echo view('site/ahead') ?>
<body>
    <?php echo view('site/aheader') ?>
    <div class="breadcrumb-area bg-image-3 ptb-150">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h3>HOMESTAY</h3>
                <ul>
                    <li><a href="<?php echo base_url('') ?>">Beranda</a></li>
                    <li class="active">Homestay</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="blog-page-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-9 col-md-8">
                    <div class="blog-wrapper">
                        <?php
                        foreach ($data as $d) {
                            $x = explode(",", $d['tag']);
                            for ($i=0; $i < count($x); $i++) {

                            }
                            $thumb = $db->query("select thumbnail from thumbnail where idpost = '".$d['idpost']."' order by rand() limit 1")->getRowArray()['thumbnail'];
                            $creator = $db->query("select nama from pengguna where idpengguna = '".$d['idpengguna']."'")->getRowArray()['nama'];
                            $s = strtolower($d['judul']);
                            $s = str_replace(" ", "_", $s);
                            ?>
                            <div class="single-blog-wrapper mb-40">
                                <div class="blog-img mb-30">
                                    <a href="<?php echo base_url('homestay/d/'.$d['idpost']) ?>">
                                        <img src="<?php echo base_url('assets/gambar/thumbnail/'.$thumb) ?>" alt="">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <h2><a href="<?php echo base_url('homestay/d/'.$d['idpost']) ?>"><?php echo $d['judul'] ?></a></h2>
                                    <div class="blog-date-categori">
                                        <ul>
                                            <li><?php echo tgl_indo(date('Y-m-d', strtotime($d['waktu']))) ?></li>
                                            <li><a href="<?php echo base_url('homestay/c/'.$d['idpengguna']) ?>"><?php echo $creator ?> </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <p style="text-align: justify;"><?php echo nl2br(substr($d['isi'], 0, 400)) ?>....</p>
                                <div class="blog-btn-social mt-30">
                                    <div class="blog-btn">
                                        <a href="<?php echo base_url('homestay/d/'.$d['idpost']) ?>">Baca Semua</a>
                                    </div>
                                    <div class="blog-social">
                                        <span>Bagikan :</span>
                                        <ul>
                                            <li><a href="https://twitter.com/share?url=<?php echo base_url('homestay/s/'.$s) ?>" target="blank"><i class="ion-social-twitter"></i></a></li>
                                            <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url('homestay/s/'.$s) ?>" target="blank"><i class="ion-social-facebook"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="pagination-total-pages mt-50">
                            <div class="pagination-style">
                                <ul>
                                    <li><a class="prev-next prev" href="#"><i class="ion-ios-arrow-left"></i> Post Baru</a></li>
                                    <li><a class="active" href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">...</a></li>
                                    <li><a href="#">10</a></li>
                                    <li><a class="prev-next next" href="#">Post Lama<i class="ion-ios-arrow-right"></i> </a></li>
                                </ul>
                            </div>
                            <div class="total-pages">
                                <p>Menampilkan 1 - 20 dari 30 post  </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-4">
                    <div class="blog-sidebar-wrapper sidebar-mrg">
                        <!--<div class="blog-widget mb-50">
                            <div class="blog-search">
                                <form class="news-form">
                                    <input type="text" placeholder="Search.....">
                                    <button type="submit">
                                        <i class="ion-ios-search-strong"></i>
                                    </button>
                                </form>
                            </div>
                        </div>-->
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
                                <?php
                                foreach ($terbaru as $tb) {
                                    $thumb = $db->query("select thumbnail from thumbnail where idpost = '".$tb['idpost']."' order by rand() limit 1")->getRowArray()['thumbnail'];
                                    ?>
                                    <div class="recent-post-wrapper mb-25">
                                        <div class="recent-post-img">
                                            <a href="<?php echo base_url('homestay/d/'.$tb['idpost']) ?>"><img src="<?php echo base_url('assets/gambar/thumbnail/'.$thumb) ?>" alt=""></a>
                                        </div>
                                        <div class="recent-post-content">
                                            <h4><a href="<?php echo base_url('homestay/d/'.$tb['idpost']) ?>"><?php echo $tb['judul'] ?></a></h4>
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
                        <!--<div class="blog-widget">
                            <h4 class="blog-widget-title mb-25">Tag, Kata Kunci</h4>
                            <div class="blog-tags">
                                <ul>
                                    <li><a href="#">Green</a></li>
                                </ul>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo view('site/afooter') ?>
    <?php echo view('site/ascript') ?>
</body>
</html>