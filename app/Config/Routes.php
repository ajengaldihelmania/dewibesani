<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Root');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->add('/', 'Root::index');
$routes->add('/paket/d/(:any)', 'Root::detailpackage/$1');
$routes->add('/tentang', 'Root::showabout');
$routes->add('/wisata', 'Root::showtour');
$routes->add('/wisata/d/(:any)', 'Root::detailtour/$1');
$routes->add('/wisata/c/(:any)', 'Root::creatortour/$1');
$routes->add('/wisata/s/(:any)', 'Root::sharetour/$1');
$routes->add('/kuliner', 'Root::showculinary');
$routes->add('/kuliner/d/(:any)', 'Root::detailculinary/$1');
$routes->add('/kuliner/c/(:any)', 'Root::creatorculinary/$1');
$routes->add('/kuliner/s/(:any)', 'Root::shareculinary/$1');
$routes->add('/homestay', 'Root::showhomestay');
$routes->add('/homestay/d/(:any)', 'Root::detailhomestay/$1');
$routes->add('/homestay/c/(:any)', 'Root::creatorhomestay/$1');
$routes->add('/homestay/s/(:any)', 'Root::sharehomestay/$1');
$routes->add('/fashion', 'Root::showfashion');
$routes->add('/fashion/d/(:any)', 'Root::detailfashion/$1');
$routes->add('/fashion/c/(:any)', 'Root::creatorfashion/$1');
$routes->add('/fashion/s/(:any)', 'Root::sharefashion/$1');
$routes->add('/kriya', 'Root::showcreation');
$routes->add('/kriya/d/(:any)', 'Root::detailcreation/$1');
$routes->add('/kriya/c/(:any)', 'Root::creatorcreation/$1');
$routes->add('/kriya/s/(:any)', 'Root::sharecreation/$1');
$routes->add('/berita', 'Root::shownews');
$routes->add('/berita/d/(:any)', 'Root::detailnews/$1');
$routes->add('/berita/c/(:any)', 'Root::creatornews/$1');
$routes->add('/berita/s/(:any)', 'Root::sharenews/$1');
$routes->add('/foto', 'Root::showphoto');
$routes->add('/foto/d/(:any)', 'Root::detailphoto/$1');
$routes->add('/foto/c/(:any)', 'Root::creatorphoto/$1');
$routes->add('/foto/s/(:any)', 'Root::sharephoto/$1');
$routes->add('/video', 'Root::showvideo');
$routes->add('/video/d/(:any)', 'Root::detailvideo/$1');
$routes->add('/video/c/(:any)', 'Root::creatorvideo/$1');
$routes->add('/video/s/(:any)', 'Root::sharevideo/$1');
$routes->add('/kontak', 'Root::showcontact');
$routes->add('/respon/s', 'Root::saverespons');
$routes->add('/faq', 'Root::showfaq');
$routes->add('/daftar', 'Root::showregister');
$routes->add('/register', 'Root::actregister');
$routes->add('/verifikasi', 'Root::actverify');
$routes->add('/masuk', 'Root::showlogin');
$routes->add('/visimisi', 'Root::showvision');
$routes->add('/fasilitas', 'Root::showfacility');
$routes->add('/sk', 'Root::showdisclaimer');
$routes->add('/bantuan', 'Root::showhelp');
$routes->add('/aksesadmin', 'Root::showrestricted');
$routes->add('/getin', 'Root::actloginadmin');

$routes->add('/getlogin', 'Root::actlogin');
$routes->add('/getlogout', 'Root::logout');

// ADMINISTRATOR =======================================
$routes->add('/a', 'Admin::index');
$routes->add('/a/statistik', 'Admin::showstatistic');
$routes->add('/a/profil', 'Admin::showprofile');
$routes->add('/a/profilubah', 'Admin::changeprofile');
$routes->add('/a/akses', 'Admin::showaccess');
$routes->add('/a/aksesubah', 'Admin::changeaccess');

$routes->add('/a/pengguna', 'Admin_user::index');
$routes->add('/a/penggunasimpan', 'Admin_user::save');
$routes->add('/a/penggunahapus/(:any)', 'Admin_user::delete/$1');

$routes->add('/a/pengunjung', 'Admin_visitor::index');
$routes->add('/a/pengunjungsimpan', 'Admin_visitor::save');

$routes->add('/a/rekening', 'Admin_account::index');
$routes->add('/a/rekeningsimpan', 'Admin_account::save');
$routes->add('/a/rekeninghapus/(:any)', 'Admin_account::delete/$1');

$routes->add('/a/wisata', 'Admin_posting::showtour');
$routes->add('/a/wisatadetail/(:any)', 'Admin_posting::detailtour/$1');
$routes->add('/a/kuliner', 'Admin_posting::showculinary');
$routes->add('/a/kulinerdetail/(:any)', 'Admin_posting::detailculinary/$1');
$routes->add('/a/homestay', 'Admin_posting::showhomestay');
$routes->add('/a/homestaydetail/(:any)', 'Admin_posting::detailhomestay/$1');
$routes->add('/a/fashion', 'Admin_posting::showfashion');
$routes->add('/a/fashiondetail/(:any)', 'Admin_posting::detailfashion/$1');
$routes->add('/a/kriya', 'Admin_posting::showcreation');
$routes->add('/a/kriyadetail/(:any)', 'Admin_posting::detailcreation/$1');
$routes->add('/a/berita', 'Admin_posting::shownews');
$routes->add('/a/beritadetail/(:any)', 'Admin_posting::detailnews/$1');
$routes->add('/a/foto', 'Admin_posting::showphoto');
$routes->add('/a/fotodetail/(:any)', 'Admin_posting::detailphoto/$1');
$routes->add('/a/video', 'Admin_posting::showvideo');
$routes->add('/a/videodetail/(:any)', 'Admin_posting::detailvideo/$1');

$routes->add('/a/masukan', 'Admin_respon::showsuggestion');
$routes->add('/a/testimoni', 'Admin_respon::showtestimony');
$routes->add('/a/testimoniubah', 'Admin_respon::changetestimony');

$routes->add('/a/faq', 'Admin_faq::index');
$routes->add('/a/faqsimpan', 'Admin_faq::save');
$routes->add('/a/faqhapus/(:any)', 'Admin_faq::delete/$1');

$routes->add('/a/logo', 'Admin_information::logo');
$routes->add('/a/logoubah', 'Admin_information::changelogo');
$routes->add('/a/ikonubah', 'Admin_information::changeikon');
$routes->add('/a/thumbnailubah', 'Admin_information::changethumbnail');
$routes->add('/a/informasi', 'Admin_information::information');
$routes->add('/a/informasiubah', 'Admin_information::changeinformation');
$routes->add('/a/pengelola', 'Admin_information::manager');
$routes->add('/a/pengelolasimpan', 'Admin_information::savemanager');
$routes->add('/a/pengelolaaktif/(:any)', 'Admin_information::activatemanager/$1');
$routes->add('/a/pengelolahapus/(:any)', 'Admin_information::deletemanager/$1');
$routes->add('/a/visimisi', 'Admin_information::vision');
$routes->add('/a/visimisiubah', 'Admin_information::changevision');
$routes->add('/a/situs', 'Admin_information::site');
$routes->add('/a/situsubah', 'Admin_information::changesite');
$routes->add('/a/slide', 'Admin_information::slide');
$routes->add('/a/slidesimpan', 'Admin_information::saveslide');
$routes->add('/a/slidehapus/(:any)', 'Admin_information::deleteslide/$1');
$routes->add('/a/infolain', 'Admin_information::other');
$routes->add('/a/infolainubah', 'Admin_information::changeother');

// BAGIAN PENJUALAN =======================================
$routes->add('/o', 'Operator::index');
$routes->add('/o/profil', 'Operator::showprofile');
$routes->add('/o/profilubah', 'Operator::changeprofile');
$routes->add('/o/akses', 'Operator::showaccess');
$routes->add('/o/aksesubah', 'Operator::changeaccess');

$routes->add('/o/pengunjung', 'Operator_visitor::index');
$routes->add('/o/pengunjungsimpan', 'Operator_visitor::save');

$routes->add('/o/paket', 'Operator_package::index');
$routes->add('/o/paketbaru', 'Operator_package::new');
$routes->add('/o/pakettambahagenda', 'Operator_package::add');
$routes->add('/o/pakettambahharga', 'Operator_package::addcost');
$routes->add('/o/pakethapusagenda/(:any)/(:any)/(:any)/(:any)', 'Operator_package::remove/$1/$2/$3/$4');
$routes->add('/o/pakethapusharga/(:any)/(:any)/(:any)/(:any)', 'Operator_package::removecost/$1/$2/$3/$4');
$routes->add('/o/paketsimpan', 'Operator_package::save');
$routes->add('/o/paketdetail/(:any)', 'Operator_package::detail/$1');
$routes->add('/o/paketubah', 'Operator_package::change');
$routes->add('/o/paketubahagenda', 'Operator_package::changeagenda');
$routes->add('/o/paketubahharga', 'Operator_package::changecost');
$routes->add('/o/pakethapusagenda/(:any)', 'Operator_package::deleteagenda/$1');
$routes->add('/o/pakethapusharga/(:any)', 'Operator_package::deletecost/$1');
$routes->add('/o/pakethapus/(:any)', 'Operator_package::hapus/$1');

$routes->add('/o/pesanan', 'Operator_order::index');
$routes->add('/o/pesanandetail/(:any)', 'Operator_order::detail/$1');
$routes->add('/o/pesanan/terima/(:any)', 'Operator_order::accept/$1');
$routes->add('/o/pesanan/tolak/(:any)', 'Operator_order::decline/$1');
$routes->add('/o/pesanan/simpanjadwal/(:any)', 'Operator_order::keep/$1');
$routes->add('/o/pesanan/ubahjadwal/(:any)', 'Operator_order::reschedule/$1');

$routes->add('/o/laporankunjungan', 'Operator_report::visitor');
$routes->add('/o/laporankunjungantampil', 'Operator_report::showvisitor');
$routes->add('/o/laporankunjungancetak/(:any)', 'Operator_report::printvisitor/$1');
$routes->add('/o/laporanpesanan', 'Operator_report::order');
$routes->add('/o/laporanpesanantampil', 'Operator_report::showorder');
$routes->add('/o/laporanpesanancetak/(:any)', 'Operator_report::printorder/$1');

$routes->add('/o/wisata', 'Operator_tour::index');
$routes->add('/o/wisatasimpan', 'Operator_tour::save');
$routes->add('/o/wisatadetail/(:any)', 'Operator_tour::detail/$1');
$routes->add('/o/wisataubah', 'Operator_tour::change');
$routes->add('/o/wisatakomentar', 'Operator_tour::comment');
$routes->add('/o/wisatabalasan', 'Operator_tour::reply');
$routes->add('/o/wisatatambahgambar', 'Operator_tour::addimage');
$routes->add('/o/wisatahapusgambar/(:any)', 'Operator_tour::deleteimage/$1');
$routes->add('/o/wisatahapus/(:any)', 'Operator_tour::delete/$1');

$routes->add('/o/kuliner', 'Operator_culinary::index');
$routes->add('/o/kulinersimpan', 'Operator_culinary::save');
$routes->add('/o/kulinerdetail/(:any)', 'Operator_culinary::detail/$1');
$routes->add('/o/kulinerubah', 'Operator_culinary::change');
$routes->add('/o/kulinerkomentar', 'Operator_culinary::comment');
$routes->add('/o/kulinerbalasan', 'Operator_culinary::reply');
$routes->add('/o/kulinertambahgambar', 'Operator_culinary::addimage');
$routes->add('/o/kulinerhapusgambar/(:any)', 'Operator_culinary::deleteimage/$1');
$routes->add('/o/kulinerhapus/(:any)', 'Operator_culinary::delete/$1');

$routes->add('/o/homestay', 'Operator_homestay::index');
$routes->add('/o/homestaysimpan', 'Operator_homestay::save');
$routes->add('/o/homestaydetail/(:any)', 'Operator_homestay::detail/$1');
$routes->add('/o/homestayubah', 'Operator_homestay::change');
$routes->add('/o/homestaykomentar', 'Operator_homestay::comment');
$routes->add('/o/homestaybalasan', 'Operator_homestay::reply');
$routes->add('/o/homestaytambahgambar', 'Operator_homestay::addimage');
$routes->add('/o/homestayhapusgambar/(:any)', 'Operator_homestay::deleteimage/$1');
$routes->add('/o/homestayhapus/(:any)', 'Operator_homestay::delete/$1');

$routes->add('/o/fashion', 'Operator_fashion::index');
$routes->add('/o/fashionsimpan', 'Operator_fashion::save');
$routes->add('/o/fashiondetail/(:any)', 'Operator_fashion::detail/$1');
$routes->add('/o/fashionubah', 'Operator_fashion::change');
$routes->add('/o/fashionkomentar', 'Operator_fashion::comment');
$routes->add('/o/fashionbalasan', 'Operator_fashion::reply');
$routes->add('/o/fashiontambahgambar', 'Operator_fashion::addimage');
$routes->add('/o/fashionhapusgambar/(:any)', 'Operator_fashion::deleteimage/$1');
$routes->add('/o/fashionhapus/(:any)', 'Operator_fashion::delete/$1');

$routes->add('/o/kriya', 'Operator_creation::index');
$routes->add('/o/kriyasimpan', 'Operator_creation::save');
$routes->add('/o/kriyadetail/(:any)', 'Operator_creation::detail/$1');
$routes->add('/o/kriyaubah', 'Operator_creation::change');
$routes->add('/o/kriyakomentar', 'Operator_creation::comment');
$routes->add('/o/kriyabalasan', 'Operator_creation::reply');
$routes->add('/o/kriyatambahgambar', 'Operator_creation::addimage');
$routes->add('/o/kriyahapusgambar/(:any)', 'Operator_creation::deleteimage/$1');
$routes->add('/o/kriyahapus/(:any)', 'Operator_creation::delete/$1');

$routes->add('/o/berita', 'Operator_news::index');
$routes->add('/o/beritasimpan', 'Operator_news::save');
$routes->add('/o/beritadetail/(:any)', 'Operator_news::detail/$1');
$routes->add('/o/beritaubah', 'Operator_news::change');
$routes->add('/o/beritakomentar', 'Operator_news::comment');
$routes->add('/o/beritabalasan', 'Operator_news::reply');
$routes->add('/o/beritatambahgambar', 'Operator_news::addimage');
$routes->add('/o/beritahapusgambar/(:any)', 'Operator_news::deleteimage/$1');
$routes->add('/o/beritahapus/(:any)', 'Operator_news::delete/$1');

$routes->add('/o/foto', 'Operator_photo::index');
$routes->add('/o/fotosimpan', 'Operator_photo::save');
$routes->add('/o/fotodetail/(:any)', 'Operator_photo::detail/$1');
$routes->add('/o/fotoubah', 'Operator_photo::change');
$routes->add('/o/fotokomentar', 'Operator_photo::comment');
$routes->add('/o/fotobalasan', 'Operator_photo::reply');
$routes->add('/o/fototambahgambar', 'Operator_photo::addimage');
$routes->add('/o/fotohapusgambar/(:any)', 'Operator_photo::deleteimage/$1');
$routes->add('/o/fotohapus/(:any)', 'Operator_photo::delete/$1');

$routes->add('/o/video', 'Operator_video::index');
$routes->add('/o/videosimpan', 'Operator_video::save');
$routes->add('/o/videodetail/(:any)', 'Operator_video::detail/$1');
$routes->add('/o/videoubah', 'Operator_video::change');
$routes->add('/o/videokomentar', 'Operator_video::comment');
$routes->add('/o/videobalasan', 'Operator_video::reply');
$routes->add('/o/videotambahgambar', 'Operator_video::addimage');
$routes->add('/o/videohapusgambar/(:any)', 'Operator_video::deleteimage/$1');
$routes->add('/o/videohapus/(:any)', 'Operator_video::delete/$1');

$routes->add('/o/masukan', 'Operator_respon::showsuggestion');
$routes->add('/o/masukanubah', 'Operator_respon::changesuggestion');
$routes->add('/o/testimoni', 'Operator_respon::showtestimony');
$routes->add('/o/testimoniubah', 'Operator_respon::changetestimony');
$routes->add('/o/faq', 'Operator_respon::showfaq');
$routes->add('/o/faqsimpan', 'Operator_respon::savefaq');
$routes->add('/o/faqhapus/(:any)', 'Operator_respon::deletefaq/$1');


// PENGUNJUNG =======================================
$routes->add('/c', 'Customer::index');
$routes->add('/c/paket/d/(:any)', 'Customer::showpackage/$1');
$routes->add('/c/tentang', 'Customer::showabout');
$routes->add('/c/wisata', 'Customer::showtour');
$routes->add('/c/wisata/d/(:any)', 'Customer::detailtour/$1');
$routes->add('/c/wisata/c/(:any)', 'Customer::creatortour/$1');
$routes->add('/c/wisata/s/(:any)', 'Customer::sharetour/$1');
$routes->add('/c/kuliner', 'Customer::showculinary');
$routes->add('/c/kuliner/d/(:any)', 'Customer::detailculinary/$1');
$routes->add('/c/kuliner/c/(:any)', 'Customer::creatorculinary/$1');
$routes->add('/c/kuliner/s/(:any)', 'Customer::shareculinary/$1');
$routes->add('/c/homestay', 'Customer::showhomestay');
$routes->add('/c/homestay/d/(:any)', 'Customer::detailhomestay/$1');
$routes->add('/c/homestay/c/(:any)', 'Customer::creatorhomestay/$1');
$routes->add('/c/homestay/s/(:any)', 'Customer::sharehomestay/$1');
$routes->add('/c/fashion', 'Customer::showfashion');
$routes->add('/c/fashion/d/(:any)', 'Customer::detailfashion/$1');
$routes->add('/c/fashion/c/(:any)', 'Customer::creatorfashion/$1');
$routes->add('/c/fashion/s/(:any)', 'Customer::sharefashion/$1');
$routes->add('/c/kriya', 'Customer::showcreation');
$routes->add('/c/kriya/d/(:any)', 'Customer::detailcreation/$1');
$routes->add('/c/kriya/c/(:any)', 'Customer::creatorcreation/$1');
$routes->add('/c/kriya/s/(:any)', 'Customer::sharecreation/$1');
$routes->add('/c/berita', 'Customer::shownews');
$routes->add('/c/berita/d/(:any)', 'Customer::detailnews/$1');
$routes->add('/c/berita/c/(:any)', 'Customer::creatornews/$1');
$routes->add('/c/berita/s/(:any)', 'Customer::sharenews/$1');
$routes->add('/c/foto', 'Customer::showphoto');
$routes->add('/c/foto/d/(:any)', 'Customer::detailphoto/$1');
$routes->add('/c/foto/c/(:any)', 'Customer::creatorphoto/$1');
$routes->add('/c/foto/s/(:any)', 'Customer::sharephoto/$1');
$routes->add('/c/video', 'Customer::showvideo');
$routes->add('/c/video/d/(:any)', 'Customer::detailvideo/$1');
$routes->add('/c/video/c/(:any)', 'Customer::creatorvideo/$1');
$routes->add('/c/video/s/(:any)', 'Customer::sharevideo/$1');
$routes->add('/c/kontak', 'Customer::showcontact');
$routes->add('/c/faq', 'Customer::showfaq');
$routes->add('/c/visimisi', 'Customer::showvision');
$routes->add('/c/fasilitas', 'Customer::showfacility');
$routes->add('/c/sk', 'Customer::showdisclaimer');
$routes->add('/c/bantuan', 'Customer::showhelp');
$routes->add('/c/profil', 'Customer::showprofile');
$routes->add('/c/profilubah', 'Customer::changeprofile');
$routes->add('/c/aksesubah', 'Customer::changeaccess');

$routes->add('/c/pesanan', 'Customer_order::index');
$routes->add('/c/pesanan/d/(:any)', 'Customer_order::detail/$1');
$routes->add('/c/pesanan/s', 'Customer_order::save');
$routes->add('/c/pesanan/b', 'Customer_order::payment');
$routes->add('/c/pesanan/rs', 'Customer_order::reschedule');

$routes->add('/c/testimoni', 'Customer_respon::testimony');
$routes->add('/c/testimoni/s', 'Customer_respon::savetestimony');
$routes->add('/c/testimoni/d/(:any)', 'Customer_respon::deletetestimony/$1');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
