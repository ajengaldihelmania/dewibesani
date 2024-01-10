<?php
namespace App\Controllers;
use CodeIgniter\Config\Services;
use App\Models\Databasemodel;
class Customer extends BaseController{
	function __construct(){
		$this->mod = new Databasemodel();
		$this->db = db_connect();
	}

	public function index(){
		if(session()->get('high')){
			return redirect()->to(base_url('c'));
		}else if(session()->get('mid')){
			return redirect()->to(base_url('o'));
		}else if(session()->get('low')){
			return view('customer/landing');
		}else{
			return redirect()->to(base_url('a'));
		}
	}

	public function showabout(){
		$data['data'] = $this->db->query("select * from profil")->getRowArray();
		$data['testi'] = $this->mod->getSome('respon',['jenis' => '0', 'status' => '1']);
		$data['pengelola'] = $this->db->query("select * from pengelola where posisi not in('') and status = '1' order by posisi asc")->getResultArray();
		return view('customer/about',$data);
	}

	public function showcontact(){
		$data['data'] = $this->db->query("select * from profil")->getRowArray();
		return view('customer/contact',$data);
	}

	public function showfaq(){
		$data['data'] = $this->mod->getAll('faq');
		return view('customer/faq',$data);
	}

	public function showvision(){
		$data['data'] = $this->db->query("select * from profil")->getRowArray();
		return view('customer/vision',$data);
	}

	public function showfacility(){
		$data['data'] = $this->db->query("select * from profil")->getRowArray();
		return view('customer/facility',$data);
	}

	public function showdisclaimer(){
		$data['data'] = $this->db->query("select * from profil")->getRowArray();
		return view('customer/disclaimer',$data);
	}

	public function showhelp(){
		$data['data'] = $this->db->query("select * from profil")->getRowArray();
		return view('customer/help',$data);
	}

	//-------------------------- Paket
	public function showpackage($x){
		$data['data'] = $this->mod->getData('paket',['idpaket' => $x]);
		$data['agenda'] = $this->db->query("select * from agenda where idpaket = '".$x."' order by idagenda asc")->getResultArray();
		$data['harga'] = $this->db->query("select * from harga where idpaket = '".$x."' order by jenis asc, minimum asc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['paket'] = $this->db->query("select * from paket order by rand() limit 5")->getResultArray();
		return view('customer/packagedetail',$data);
	}

	//-------------------------- Wisata
	public function showtour(){
		$data['data'] = $this->db->query("select * from post where kategori = '0' and status = '1' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '0' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/tour',$data);
	}

	public function detailtour($x){
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['komentar'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '0' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/tourdetail',$data);
	}

	public function creatortour($x){
		$data['data'] = $this->db->query("select * from post where kategori = '0' and status = '1' and idpengguna = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '0' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/tour',$data);
	}

	public function sharetour($x){
		$x = str_replace("_", " ", $x);
		$x = ucwords($x);
		$x = $this->mod->getData('post',['kategori' => '0', 'judul' => $x])['idpost'];
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['komentar'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '0' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/tourdetail',$data);
	}

	//-------------------------- Kuliner
	public function showculinary(){
		$data['data'] = $this->db->query("select * from post where kategori = '1' and status = '1' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '1' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/culinary',$data);
	}

	public function detailculinary($x){
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['komentar'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '1' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/culinarydetail',$data);
	}

	public function creatorculinary($x){
		$data['data'] = $this->db->query("select * from post where kategori = '1' and status = '1' and idpengguna = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '1' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/culinary',$data);
	}

	public function shareculinary($x){
		$x = str_replace("_", " ", $x);
		$x = ucwords($x);
		$x = $this->mod->getData('post',['kategori' => '1', 'judul' => $x])['idpost'];
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['komentar'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '1' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/culinarydetail',$data);
	}

	//-------------------------- Homestay
	public function showhomestay(){
		$data['data'] = $this->db->query("select * from post where kategori = '2' and status = '1' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '2' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/homestay',$data);
	}

	public function detailhomestay($x){
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['komentar'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '2' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/homestaydetail',$data);
	}

	public function creatorhomestay($x){
		$data['data'] = $this->db->query("select * from post where kategori = '2' and status = '1' and idpengguna = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '2' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/homestay',$data);
	}

	public function sharehomestay($x){
		$x = str_replace("_", " ", $x);
		$x = ucwords($x);
		$x = $this->mod->getData('post',['kategori' => '2', 'judul' => $x])['idpost'];
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['komentar'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '2' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/homestaydetail',$data);
	}

	//-------------------------- Fashion
	public function showfashion(){
		$data['data'] = $this->db->query("select * from post where kategori = '3' and status = '1' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '3' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/fashion',$data);
	}

	public function detailfashion($x){
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['komentar'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '3' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/fashiondetail',$data);
	}

	public function creatorfashion($x){
		$data['data'] = $this->db->query("select * from post where kategori = '3' and status = '1' and idpengguna = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '3' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/fashion',$data);
	}

	public function sharefashion($x){
		$x = str_replace("_", " ", $x);
		$x = ucwords($x);
		$x = $this->mod->getData('post',['kategori' => '3', 'judul' => $x])['idpost'];
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['komentar'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '3' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/fashiondetail',$data);
	}

	//-------------------------- Kriya
	public function showcreation(){
		$data['data'] = $this->db->query("select * from post where kategori = '4' and status = '1' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '4' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/creation',$data);
	}

	public function detailcreation($x){
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['komentar'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '4' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/creationdetail',$data);
	}

	public function creatorcreation($x){
		$data['data'] = $this->db->query("select * from post where kategori = '4' and status = '1' and idpengguna = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '4' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/creation',$data);
	}

	public function sharecreation($x){
		$x = str_replace("_", " ", $x);
		$x = ucwords($x);
		$x = $this->mod->getData('post',['kategori' => '4', 'judul' => $x])['idpost'];
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['komentar'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '4' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/creationdetail',$data);
	}

	//-------------------------- Berita
	public function shownews(){
		$data['data'] = $this->db->query("select * from post where kategori = '5' and status = '1' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '5' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/news',$data);
	}

	public function detailnews($x){
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['komentar'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '5' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/newsdetail',$data);
	}

	public function creatornews($x){
		$data['data'] = $this->db->query("select * from post where kategori = '5' and status = '1' and idpengguna = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '5' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/news',$data);
	}

	public function sharenews($x){
		$x = str_replace("_", " ", $x);
		$x = ucwords($x);
		$x = $this->mod->getData('post',['kategori' => '5', 'judul' => $x])['idpost'];
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['komentar'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '5' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/newsdetail',$data);
	}

	//-------------------------- Foto
	public function showphoto(){
		$data['data'] = $this->db->query("select * from post where kategori = '6' and status = '1' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '6' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/photo',$data);
	}

	public function detailphoto($x){
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['komentar'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '6' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/photodetail',$data);
	}

	public function creatorphoto($x){
		$data['data'] = $this->db->query("select * from post where kategori = '6' and status = '1' and idpengguna = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '6' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/photo',$data);
	}

	public function sharephoto($x){
		$x = str_replace("_", " ", $x);
		$x = ucwords($x);
		$x = $this->mod->getData('post',['kategori' => '6', 'judul' => $x])['idpost'];
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['komentar'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '6' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/photodetail',$data);
	}

	//-------------------------- Video
	public function showvideo(){
		$data['data'] = $this->db->query("select * from post where kategori = '7' and status = '1' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '7' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/video',$data);
	}

	public function detailvideo($x){
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['komentar'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '7' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/videodetail',$data);
	}

	public function creatorvideo($x){
		$data['data'] = $this->db->query("select * from post where kategori = '7' and status = '1' and idpengguna = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '7' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/video',$data);
	}

	public function sharevideo($x){
		$x = str_replace("_", " ", $x);
		$x = ucwords($x);
		$x = $this->mod->getData('post',['kategori' => '7', 'judul' => $x])['idpost'];
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['komentar'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '7' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('customer/videodetail',$data);
	}

	public function showprofile(){
		$data['data'] = $this->mod->getData('pengguna',['idpengguna' => session()->get('low')]);
		return view('customer/profile',$data);
	}

	public function changeprofile(){
		$get = $this->request->getPost();
		$data = array(
			'nama' => $get['nama'],
			'alamat' => $get['alamat'],
			'telepon' => $get['telepon'],
			'email' => $get['email'],
			'username' => $get['username']
		);
		$this->mod->updating('pengguna',$data,['idpengguna' => $get['id']]);
		return redirect()->to(base_url('c/profil'));
	}

	public function changeaccess(){
		$get = $this->request->getPost();
		$p1 = $get['p1'];
		$p2 = $get['p2'];
		$p3 = $get['p3'];
		$cek = $this->mod->getSome('pengguna',['idpengguna' => $get['id'],'password' => md5($p1)]);
		if(count($cek)){
			if($p2 == $p3){
				$this->mod->updating('pengguna',['password' => md5($p3)],['idpengguna' => $get['id']]);
			}
		}
		return redirect()->to(base_url('c/profil'));
	}
}
?>