<?php
$db = db_connect();
$info = $db->query("select * from profil")->getRowArray();
?>
<div id="sidebar" class="active">
   <div class="sidebar-wrapper active">
      <div class="sidebar-header position-relative">
         <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
               <a href="<?php echo base_url('') ?>"><img src="<?php echo base_url('assets/gambar/default/'.$info['logo']) ?>" style="height: 63px;"></a>
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
            </li>
            <li class="sidebar-title">Master Data</li>
            <li class="sidebar-item">
               <a href="<?php echo base_url('a/pengguna') ?>" class='sidebar-link'><i class="bi bi-person-badge-fill"></i><span>Bagian Penjualan</span></a>
               <a href="<?php echo base_url('a/pengunjung') ?>" class='sidebar-link'><i class="bi bi-person-bounding-box"></i><span>Pengunjung</span></a>
               <a href="<?php echo base_url('a/rekening') ?>" class='sidebar-link'><i class="bi bi-cash-stack"></i><span>Rekening Bank</span></a>
            </li>
            <li class="sidebar-title">Postingan</li>
            <li class="sidebar-item">
               <a href="<?php echo base_url('a/wisata') ?>" class='sidebar-link'><i class="bi bi-binoculars-fill"></i><span>Wisata</span></a>
               <a href="<?php echo base_url('a/kuliner') ?>" class='sidebar-link'><i class="bi bi-egg-fried"></i><span>Kuliner</span></a>
               <a href="<?php echo base_url('a/homestay') ?>" class='sidebar-link'><i class="bi bi-house-fill"></i><span>Homestay</span></a>
               <a href="<?php echo base_url('a/fashion') ?>" class='sidebar-link'><i class="bi bi-fan"></i><span>Fashion</span></a>
               <a href="<?php echo base_url('a/kriya') ?>" class='sidebar-link'><i class="bi bi-brush-fill"></i><span>Kriya</span></a>
               <a href="<?php echo base_url('a/berita') ?>" class='sidebar-link'><i class="bi bi-newspaper"></i><span>Berita</span></a>
               <a href="<?php echo base_url('a/foto') ?>" class='sidebar-link'><i class="bi bi-images"></i><span>Foto</span></a>
               <a href="<?php echo base_url('a/video') ?>" class='sidebar-link'><i class="bi bi-film"></i><span>Video</span></a>
            </li>
            <li class="sidebar-title">Respon</li>
            <li class="sidebar-item">
               <a href="<?php echo base_url('a/masukan') ?>" class='sidebar-link'><i class="bi bi-chat-right-text-fill"></i><span>Masukan</span></a>
               <a href="<?php echo base_url('a/testimoni') ?>" class='sidebar-link'><i class="bi bi-chat-quote-fill"></i><span>Testimoni</span></a>
               <a href="<?php echo base_url('a/faq') ?>" class='sidebar-link'><i class="bi bi-patch-question"></i><span>FAQ</span></a>
            </li>
            <li class="sidebar-title">Kelola Web</li>
            <li class="sidebar-item">
               <a href="<?php echo base_url('a/logo') ?>" class='sidebar-link'><i class="bi bi-file-richtext-fill"></i><span>Logo dan Thumbnail</span></a>
               <a href="<?php echo base_url('a/informasi') ?>" class='sidebar-link'><i class="bi bi-kanban-fill"></i><span>Informasi Dasar</span></a>
               <a href="<?php echo base_url('a/pengelola') ?>" class='sidebar-link'><i class="bi bi-person-rolodex"></i><span>Profil Pengelola</span></a>
               <a href="<?php echo base_url('a/visimisi') ?>" class='sidebar-link'><i class="bi bi-flag"></i><span>Visi dan Misi</span></a>
               <a href="<?php echo base_url('a/situs') ?>" class='sidebar-link'><i class="bi bi-globe"></i><span>Situs</span></a>
               <a href="<?php echo base_url('a/slide') ?>" class='sidebar-link'><i class="bi bi-view-list"></i><span>Tampilan Slide</span></a>
               <a href="<?php echo base_url('a/infolain') ?>" class='sidebar-link'><i class="bi bi-link-45deg"></i><span>Informasi Lain</span></a>
            </li>
            <li class="sidebar-title">Akun Pengguna</li>
            <li class="sidebar-item">
               <a href="<?php echo base_url('a/profil') ?>" class='sidebar-link'><i class="bi bi-person-lines-fill"></i><span>Profil</span></a>
               <a href="<?php echo base_url('a/akses') ?>" class='sidebar-link'><i class="bi bi-key-fill"></i><span>Akses</span></a>
               <a href="<?php echo base_url('getlogout') ?>" class='sidebar-link'><i class="bi bi-upload"></i><span>Logout</span></a>
            </li>
         </ul>
      </div>
   </div>
</div>