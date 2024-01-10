<?php
namespace App\Controllers;
use CodeIgniter\Config\Services;
use App\Models\Databasemodel;
class Root extends BaseController{
	function __construct(){
		$this->mod = new Databasemodel();
		$this->db = db_connect();
	}

	public function index(){
		if(session()->get('high')){
			return redirect()->to(base_url('a'));
		}else if(session()->get('mid')){
			return redirect()->to(base_url('o'));
		}else if(session()->get('low')){
			return redirect()->to(base_url('c'));
		}else{
			session()->setFlashdata('gagal','');
			return view('site/landing');
		}
	}

	public function showabout(){
		$data['data'] = $this->db->query("select * from profil")->getRowArray();
		$data['testi'] = $this->mod->getSome('respon',['jenis' => '0', 'status' => '1']);
		$data['pengelola'] = $this->db->query("select * from pengelola where status = '1' order by posisi asc")->getResultArray();
		return view('site/about',$data);
	}

	public function showcontact(){
		$data['data'] = $this->db->query("select * from profil")->getRowArray();
		return view('site/contact',$data);
	}

	public function saverespons(){
		$get = $this->request->getPost();
		$data = array(
			'idrespon' => null,
			'jenis' => '1',
			'waktu' => date('Y-m-d H:i:s'),
			'nama' => $get['nama'],
			'email' => $get['kontak'],
			'alamat' => '',
			'respon' => $get['isi'],
			'status' => '',
			'idpengguna' => '0'
		);
		$this->mod->inserting('respon',$data);
		return redirect()->to(base_url('kontak'));
	}

	public function showfaq(){
		$data['data'] = $this->mod->getAll('faq');
		return view('site/faq',$data);
	}

	public function showregister(){
		session()->setFlashdata('gagal','');
		return view('site/register');
	}

	public function showlogin(){
		session()->setFlashdata('gagal','');
		return view('site/login');
	}

	public function showvision(){
		$data['data'] = $this->db->query("select * from profil")->getRowArray();
		return view('site/vision',$data);
	}

	public function showfacility(){
		$data['data'] = $this->db->query("select * from profil")->getRowArray();
		return view('site/facility',$data);
	}

	public function showdisclaimer(){
		$data['data'] = $this->db->query("select * from profil")->getRowArray();
		return view('site/disclaimer',$data);
	}

	public function showhelp(){
		$data['data'] = $this->db->query("select * from profil")->getRowArray();
		return view('site/help',$data);
	}

	public function showrestricted(){
		session()->setFlashdata('gagal','');
		return view('site/restricted');
	}

	//-------------------------- Wisata
	public function showtour(){
		$data['data'] = $this->db->query("select * from post where kategori = '0' and status = '1' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '0' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('site/tour',$data);
	}

	public function detailtour($x){
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['komentar'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '0' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('site/tourdetail',$data);
	}

	public function creatortour($x){
		$data['data'] = $this->db->query("select * from post where kategori = '0' and status = '1' and idpengguna = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '0' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('site/tour',$data);
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
		return view('site/tourdetail',$data);
	}

	//-------------------------- Kuliner
	public function showculinary(){
		$data['data'] = $this->db->query("select * from post where kategori = '1' and status = '1' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '1' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('site/culinary',$data);
	}

	public function detailculinary($x){
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['komentar'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '1' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('site/culinarydetail',$data);
	}

	public function creatorculinary($x){
		$data['data'] = $this->db->query("select * from post where kategori = '1' and status = '1' and idpengguna = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '1' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('site/culinary',$data);
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
		return view('site/culinarydetail',$data);
	}

	//-------------------------- Homestay
	public function showhomestay(){
		$data['data'] = $this->db->query("select * from post where kategori = '2' and status = '1' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '2' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('site/homestay',$data);
	}

	public function detailhomestay($x){
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['komentar'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '2' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('site/homestaydetail',$data);
	}

	public function creatorhomestay($x){
		$data['data'] = $this->db->query("select * from post where kategori = '2' and status = '1' and idpengguna = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '2' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('site/homestay',$data);
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
		return view('site/homestaydetail',$data);
	}

	//-------------------------- Fashion
	public function showfashion(){
		$data['data'] = $this->db->query("select * from post where kategori = '3' and status = '1' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '3' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('site/fashion',$data);
	}

	public function detailfashion($x){
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['komentar'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '3' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('site/fashiondetail',$data);
	}

	public function creatorfashion($x){
		$data['data'] = $this->db->query("select * from post where kategori = '3' and status = '1' and idpengguna = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '3' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('site/fashion',$data);
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
		return view('site/fashiondetail',$data);
	}

	//-------------------------- Kriya
	public function showcreation(){
		$data['data'] = $this->db->query("select * from post where kategori = '4' and status = '1' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '4' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('site/creation',$data);
	}

	public function detailcreation($x){
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['komentar'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '4' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('site/creationdetail',$data);
	}

	public function creatorcreation($x){
		$data['data'] = $this->db->query("select * from post where kategori = '4' and status = '1' and idpengguna = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '4' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('site/creation',$data);
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
		return view('site/creationdetail',$data);
	}

	//-------------------------- Berita
	public function shownews(){
		$data['data'] = $this->db->query("select * from post where kategori = '5' and status = '1' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '5' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('site/news',$data);
	}

	public function detailnews($x){
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['komentar'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '5' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('site/newsdetail',$data);
	}

	public function creatornews($x){
		$data['data'] = $this->db->query("select * from post where kategori = '5' and status = '1' and idpengguna = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '5' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('site/news',$data);
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
		return view('site/newsdetail',$data);
	}

	//-------------------------- Foto
	public function showphoto(){
		$data['data'] = $this->db->query("select * from post where kategori = '6' and status = '1' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '6' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('site/photo',$data);
	}

	public function detailphoto($x){
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['komentar'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '6' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('site/photodetail',$data);
	}

	public function creatorphoto($x){
		$data['data'] = $this->db->query("select * from post where kategori = '6' and status = '1' and idpengguna = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '6' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('site/photo',$data);
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
		return view('site/photodetail',$data);
	}

	//-------------------------- Video
	public function showvideo(){
		$data['data'] = $this->db->query("select * from post where kategori = '7' and status = '1' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '7' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('site/video',$data);
	}

	public function detailvideo($x){
		$data['data'] = $this->mod->getData('post',['idpost' => $x]);
		$data['thumbnail'] = $this->mod->getSome('thumbnail',['idpost' => $x]);
		$data['komentar'] = $this->db->query("select * from komentar where idpost = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '7' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('site/videodetail',$data);
	}

	public function creatorvideo($x){
		$data['data'] = $this->db->query("select * from post where kategori = '7' and status = '1' and idpengguna = '".$x."' order by waktu desc")->getResultArray();
		$data['ketua'] = $this->mod->getData('pengelola',['posisi' => '0', 'status' => '1']);
		$data['terbaru'] = $this->db->query("select * from post where kategori = '7' and status = '1' order by waktu desc limit 5")->getResultArray();
		return view('site/video',$data);
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
		return view('site/videodetail',$data);
	}

	public function kirim($nomor,$otp,$username){
		error_reporting(0);
		$my_apikey = "11NOZCUI45RUU8JA45AM";
		$destination = $nomor;
		$message = "Kode OTP untuk verifikasi akun anda *".$username." (123456)* adalah : *".$otp."*";
		$api_url = "http://panel.rapiwha.com/send_message.php";
		$api_url .= "?apikey=". urlencode ($my_apikey);
		$api_url .= "&number=". urlencode ($destination);
		$api_url .= "&text=". urlencode ($message);
		$my_result_object = json_decode(file_get_contents($api_url, false));
		$my_result_object->success;
		$description_temp = $my_result_object->description;
		$laporan = $my_result_object->result_code; 
		return view('site/landing');
	}

	public function actloginadmin(){
		$get = $this->request->getPost();
		$username = $get['username'];
		$password = $get['password'];
		$cek = $this->db->query("select * from pengguna where level not in ('3') and username = '".$username."'")->getResultArray();
		if(count($cek) > 0){
			$cek = $this->db->query("select * from pengguna where level not in ('3') and username = '".$username."'")->getRowArray();
			if($cek['password'] == md5($password)){
				if($cek['status'] == '0'){
					session()->setFlashdata('gagal','Akses akun anda ditolak!');
					return view('site/restricted');
				}else{
					session()->set($cek['level'],$cek['idpengguna']);
					return redirect()->to(base_url(''));
				}
			}else{
				session()->setFlashdata('gagal','Kombinasi Username dan Password tidak sesuai!');
				return view('site/restricted');
			}
		}else{
			session()->setFlashdata('gagal','Akun tidak ditemukan!');
			return view('site/restricted');
		}
	}

	public function actlogin(){
		$get = $this->request->getPost();
		$username = $get['username'];
		$password = $get['password'];
		$cek = $this->db->query("select * from pengguna where level = 'low' and username = '".$username."'")->getResultArray();
		if(count($cek) > 0){
			$cek = $this->db->query("select * from pengguna where level = 'low' and username = '".$username."'")->getRowArray();
			if($cek['password'] == md5($password)){
				if($cek['status'] == '0'){
					session()->setFlashdata('gagal','Akses akun anda ditolak!');
					return view('site/login');
				}else{
					session()->set('low',$cek['idpengguna']);
					return redirect()->to(base_url(''));
				}
			}else{
				session()->setFlashdata('gagal','Kombinasi Username dan Password tidak sesuai!');
				return view('site/login');
			}
		}else{
			session()->setFlashdata('gagal','Akun tidak ditemukan!');
			return view('site/login');
		}
	}

	function buatusername($x){
		$x = explode(" ", $x);
		$ada = true;
		while ($ada) {
			$username = strtolower($x[0]).rand(100,999);
			$cek = $this->mod->getSome('pengguna',['username' => $username]);
			if(count($cek) == 0){
				$ada = false;
			}
		}
		return $username;
	}

	public function actregister(){
		$get = $this->request->getPost();
		$otp = 0;
		$nama = $get['nama'];
		$jekel = $get['jekel'];
		$pass = md5($get['password']);
		$telepon = $get['telepon'];
		$username = $this->buatusername($get['nama']);
		$x = $telepon[0];
		if($x == 0){
			$telepon = "62".substr($telepon, 1, strlen($telepon));
		}else{
			$telepon = "62".$telepon;
		}
		$ada = true;
		while($ada){
			$otp = rand(10000,99999);
			$cek = $this->mod->getSome('pengguna',['level' => 'low','otp' => $otp,'status' => '']);
			if(count($cek) == 0){
				$ada = false;
			}
		}
		$x = substr($telepon, 1, strlen($telepon));
		$cek = $this->db->query("select * from pengguna where telepon like '%".$x."'")->getResultArray();
		if(count($cek) == 0){
			$data = array(
				'idpengguna' => null,
				'nama' => $get['nama'],
				'jekel' => $get['jekel'],
				'alamat' => '',
				'telepon' => $get['telepon'],
				'email' => '',
				'username' => $username,
				'password' => $pass,
				'level' => 'low',
				'foto' => '',
				'otp' => $otp,
				'status' => ''
			);
			$this->mod->inserting('pengguna',$data);
			$this->kirim($telepon,$otp,$username);
			$data['id'] = $this->db->query("select idpengguna from pengguna where level = 'low' and otp = '".$otp."' and status = ''")->getRowArray()['idpengguna'];
			session()->setFlashdata('gagal','');
			return view('site/verifikasi',$data);
		}else{
			session()->setFlashdata('gagal','Maaf, nomor anda sudah digunakan pada akun lain!');
			return view('site/register');
		}
	}

	public function actverify(){
		$get = $this->request->getPost();
		$otp = '';
		for ($i=0; $i < 5; $i++) { 
			$x = "otp".$i;
			$otp .= $get[$x];
		}
		$id = $get['id'];
		$cek = $this->mod->getSome('pengguna',['idpengguna' => $id,'otp' => $otp]);
		if(count($cek) == 0){
			$data['id'] = $id;
			session()->setFlashdata('gagal','OTP tidak sesuai, masukkan ulang!');
			return view('site/verifikasi',$data);
		}else{
			$this->mod->updating('pengguna',['status' => '1'],['idpengguna' => $id]);
			session()->set('low',$id);
			return redirect()->to(base_url(''));
		}
	}

	public function logout(){
		session_unset();
		session()->destroy();
		return redirect()->to(base_url(''));
	}
}
?>