<?php
$db = db_connect();
$info = $db->query("select * from profil")->getRowArray();
?>
<div id="sidebar" class="active">
   <div class="sidebar-wrapper active">
      <div class="sidebar-header position-relative">
         <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
               <a href="<?php echo base_url('') ?>"><img src="<?php echo base_url('/assets/gambar/default/'.$info['logo']) ?>" style="height: 63px;"></a>
            </div>
            <div class="sidebar-toggler  x">
               <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
         </div>
      </div>
      <div class="sidebar-menu">
         <ul class="menu">
            <li class="sidebar-item">
               <a href="<?php echo base_url('') ?>" class='sidebar-link'><i class="bi bi-grid-fill"></i><span>Dashboard</span></a>
               <a href="<?php echo base_url('o/pengunjung') ?>" class='sidebar-link'><i class="bi bi-person-bounding-box"></i><span>Pengunjung</span></a>
            </li>
            <li class="sidebar-title">Paket dan Pesanan</li>
            <li class="sidebar-item">
               <a href="<?php echo base_url('o/paket') ?>" class='sidebar-link'><i class="bi bi-box2-heart-fill"></i><span>Paket Wisata</span></a>
               <a href="<?php echo base_url('o/pesanan') ?>" class='sidebar-link'><i class="bi bi-calendar4-range"></i><span>Pesanan Tiket</span></a>
            </li>
            <li class="sidebar-title">Postingan</li>
            <li class="sidebar-item">
               <a href="<?php echo base_url('o/wisata') ?>" class='sidebar-link'><i class="bi bi-binoculars-fill"></i><span>Wisata</span></a>
               <a href="<?php echo base_url('o/kuliner') ?>" class='sidebar-link'><i class="bi bi-egg-fried"></i><span>Kuliner</span></a>
               <a href="<?php echo base_url('o/homestay') ?>" class='sidebar-link'><i class="bi bi-house-fill"></i><span>Homestay</span></a>
               <a href="<?php echo base_url('o/fashion') ?>" class='sidebar-link'><i class="bi bi-fan"></i><span>Fashion</span></a>
               <a href="<?php echo base_url('o/kriya') ?>" class='sidebar-link'><i class="bi bi-brush-fill"></i><span>Kriya</span></a>
               <a href="<?php echo base_url('o/berita') ?>" class='sidebar-link'><i class="bi bi-newspaper"></i><span>Berita</span></a>
               <a href="<?php echo base_url('o/foto') ?>" class='sidebar-link'><i class="bi bi-images"></i><span>Foto</span></a>
               <a href="<?php echo base_url('o/video') ?>" class='sidebar-link'><i class="bi bi-film"></i><span>Video</span></a>
            </li>
            <!--<li class="sidebar-title">Respon</li>
            <li class="sidebar-item">
               <a href="<?php echo base_url('o/masukan') ?>" class='sidebar-link'><i class="bi bi-chat-right-text-fill"></i><span>Masukan</span></a>
               <a href="<?php echo base_url('o/testimoni') ?>" class='sidebar-link'><i class="bi bi-chat-quote-fill"></i><span>Testimoni</span></a>
               <a href="<?php echo base_url('o/faq') ?>" class='sidebar-link'><i class="bi bi-patch-question"></i><span>FAQ</span></a>
            </li>
            <li class="sidebar-title">Kelola Web</li>
            <li class="sidebar-item">
               <a href="<?php echo base_url('o/logo') ?>" class='sidebar-link'><i class="bi bi-file-richtext-fill"></i><span>Logo dan Thumbnail</span></a>
               <a href="<?php echo base_url('o/informasi') ?>" class='sidebar-link'><i class="bi bi-kanban-fill"></i><span>Informasi Dasar</span></a>
               <a href="<?php echo base_url('o/visimisi') ?>" class='sidebar-link'><i class="bi bi-flag"></i><span>Visi dan Misi</span></a>
               <a href="<?php echo base_url('o/situs') ?>" class='sidebar-link'><i class="bi bi-globe"></i><span>Situs</span></a>
               <a href="<?php echo base_url('o/infolain') ?>" class='sidebar-link'><i class="bi bi-link-45deg"></i><span>Informasi Lain</span></a>
            </li>-->
            <li class="sidebar-title">Laporan</li>
            <li class="sidebar-item">
               <a href="<?php echo base_url('o/laporankunjungan') ?>" class='sidebar-link'><i class="bi bi-file-bar-graph-fill"></i><span>Kunjungan</span></a>
               <a href="<?php echo base_url('o/laporanpesanan') ?>" class='sidebar-link'><i class="bi bi-file-text-fill"></i><span>Pesanan</span></a>
            </li>
            <li class="sidebar-title">Akun Pengguna</li>
            <li class="sidebar-item">
               <a href="<?php echo base_url('o/profil') ?>" class='sidebar-link'><i class="bi bi-person-lines-fill"></i><span>Profil</span></a>
               <a href="<?php echo base_url('o/akses') ?>" class='sidebar-link'><i class="bi bi-key-fill"></i><span>Akses</span></a>
               <a href="<?php echo base_url('getlogout') ?>" class='sidebar-link'><i class="bi bi-upload"></i><span>Logout</span></a>
            </li>
         </ul>
      </div>
   </div>
</div>