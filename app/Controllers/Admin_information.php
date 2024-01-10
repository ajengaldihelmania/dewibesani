<?php
namespace App\Controllers;
use CodeIgniter\Config\Services;
use App\Models\Databasemodel;
class Admin_information extends BaseController{
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
			return redirect()->to(base_url(''));
		}
	}

	public function logo(){
		$data['data'] = $this->db->query("select * from profil")->getRowArray();
		return view('admin/logo',$data);
	}

	public function changelogo(){
		$file = $this->request->getFile('file');
		if($file->isValid()){
			$logo = $this->db->query("select logo from profil")->getRowArray()['logo'];
			if($logo != ''){
				unlink('../public/assets/gambar/default/'.$logo);
			}
			$nama = $file->getRandomName();
			$file->move('../public/assets/gambar/default/',$nama);
			$this->mod->updateAll('profil',['logo' => $nama]);
		}
		return redirect()->to(base_url('a/logo'));
	}

	public function changeikon(){
		$file = $this->request->getFile('file');
		if($file->isValid()){
			$ikon = $this->db->query("select ikon from profil")->getRowArray()['ikon'];
			if($ikon != ''){
				unlink('../public/assets/gambar/default/'.$ikon);
			}
			$nama = $file->getRandomName();
			$file->move('../public/assets/gambar/default/',$nama);
			$this->mod->updateAll('profil',['ikon' => $nama]);
		}
		return redirect()->to(base_url('a/logo'));
	}

	public function changethumbnail(){
		$file = $this->request->getFile('file');
		if($file->isValid()){
			$thumbnail = $this->db->query("select thumbnail from profil")->getRowArray()['thumbnail'];
			if($thumbnail != ''){
				unlink('../public/assets/gambar/default/'.$thumbnail);	
			}
			$nama = $file->getRandomName();
			$file->move('../public/assets/gambar/default/',$nama);
			$this->mod->updateAll('profil',['thumbnail' => $nama]);
		}
		return redirect()->to(base_url('a/logo'));
	}

	public function information(){
		$data['data'] = $this->db->query("select * from profil")->getRowArray();
		return view('admin/information',$data);
	}

	public function changeinformation(){
		$get = $this->request->getPost();
		$data = array(
			'telepon' => $get['telepon'],
			'alamat' => $get['alamat'],
			'nama' => $get['nama'],
			'tagline' => $get['tagline']
		);
		$this->mod->updateAll('profil',$data);
		return redirect()->to(base_url('a/informasi'));
	}

	public function manager(){
		return view('admin/manager');
	}

	public function savemanager(){
		$get = $this->request->getPost();
		if($get['proses'] == 'simpan'){
			$foto = $this->request->getFile('file');
			if($foto->isValid()){
				$nama = $foto->getRandomName();
				$foto->move('../public/assets/gambar/profil/',$nama);
				$foto = $nama;
			}else{
				$foto = '';
			}
			$posisi = '';
			$jabatan = $get['jabatan'];
			if($jabatan == 'Pengawas' || $jabatan == 'Penanggung Jawab' || $jabatan == 'Ketua'){
				$posisi = '0';
			}else if($jabatan == 'Wakil Ketua I' || $jabatan == 'Wakil Ketua II'){
				$posisi = '1';
			}else if($jabatan == 'Sekretaris I' || $jabatan == 'Sekretaris II'){
				$posisi = '2';
			}else if($jabatan == 'Bendahara I' || $jabatan == 'Bendahara II'){
				$posisi = '3';
			}else if($jabatan == 'Anggota'){
				$posisi = '5';
			}else{
				$posisi = '4';
			}
			$where = array(
				'jabatan' => $jabatan,
				'posisi' => $posisi,
				'status' => '1'
			);
			$cek = $this->mod->getSome('pengelola',$where);
			if(count($cek) > 0 && $posisi < 4){
				$this->mod->updating('pengelola',['status' => '0'],$where);
			}
			$data = array(
				'idpengelola' => null,
				'nama' => $get['nama'],
				'jekel' => $get['jekel'],
				'jabatan' => $jabatan,
				'posisi' => $posisi,
				'foto' => $foto,
				'fb' => $get['fb'],
				'ig' => $get['ig'],
				'tw' => $get['tw'],
				'wa' => $get['wa'],
				'email' => $get['email'],
				'status' => '1'
			);
			$this->mod->inserting('pengelola',$data);
		}else{
			$foto = $this->request->getFile('file');
			if($foto->isValid()){
				$thumbnail = $this->db->query("select foto from pengelola where idpengelola = '".$get['id']."'")->getRowArray()['foto'];
				if($thumbnail != ''){
					unlink('../public/assets/gambar/profil/'.$thumbnail);	
				}
				$nama = $foto->getRandomName();
				$foto->move('../public/assets/gambar/profil/',$nama);
				$foto = $nama;
			}else{
				$foto = $this->db->query("select foto from pengelola where idpengelola = '".$get['id']."'")->getRowArray()['foto'];
			}
			$data = array(
				'nama' => $get['nama'],
				'jekel' => $get['jekel'],
				'foto' => $foto,
				'fb' => $get['fb'],
				'ig' => $get['ig'],
				'tw' => $get['tw'],
				'wa' => $get['wa'],
				'email' => $get['email']
			);
			$this->mod->updating('pengelola',$data,['idpengelola' => $get['id']]);
		}
		return redirect()->to(base_url('a/pengelola'));
	}

	public function activatemanager($x){
		$jabatan = $this->mod->getData('pengelola',['idpengelola' => $x])['jabatan'];
		$this->mod->updating('pengelola',['status' => '0'],['jabatan' => $jabatan]);
		$this->mod->updating('pengelola',['status' => '1'],['idpengelola' => $x]);
		return redirect()->to(base_url('a/pengelola'));
	}

	public function deletemanager($x){
		$jabatan = $this->mod->getData('pengelola',['idpengelola' => $x])['jabatan'];
		$this->mod->deleting('pengelola',['idpengelola' => $x]);
		return redirect()->to(base_url('a/pengelola'));
	}

	public function vision(){
		$data['data'] = $this->db->query("select * from profil")->getRowArray();
		return view('admin/vision',$data);
	}

	public function changevision(){
		$get = $this->request->getPost();
		$data = array(
			'visi' => $get['visi'],
			'misi' => $get['misi']
		);
		$this->mod->updateAll('profil',$data);
		return redirect()->to(base_url('a/visimisi'));
	}

	public function site(){
		$data['data'] = $this->db->query("select * from profil")->getRowArray();
		return view('admin/site',$data);
	}

	public function changesite(){
		$get = $this->request->getPost();
		$data = array(
			'ig' => $get['ig'],
			'fb' => $get['fb'],
			'yt' => $get['yt'],
			'situs' => $get['situs']
		);
		$this->mod->updateAll('profil',$data);
		return redirect()->to(base_url('a/situs'));
	}

	public function slide(){
		$data['data'] = $this->mod->getAll('slide');
		return view('admin/slide',$data);
	}

	public function saveslide(){
		$get = $this->request->getPost();
		$foto = $this->request->getFile('file');
		$nama = $foto->getRandomName();
		$foto->move('../public/assets/gambar/slide/',$nama);
		$data = array(
			'idslide' => null,
			'thumbnail' => $nama,
			'tagline' => $get['tagline'],
			'caption' => $get['caption']
		);
		$this->mod->inserting('slide',$data);
		return redirect()->to(base_url('a/slide'));
	}

	public function deleteslide($x){
		$thumbnail = $this->db->query("select thumbnail from slide where idslide = '".$x."'")->getRowArray()['thumbnail'];
		unlink('../public/assets/gambar/slide/'.$thumbnail);
		$this->mod->deleting('slide',['idslide' => $x]);
		return redirect()->to(base_url('a/slide'));	
	}

	public function other(){
		$data['data'] = $this->db->query("select * from profil")->getRowArray();
		return view('admin/other',$data);
	}

	public function changeother(){
		$get = $this->request->getPost();
		$data = array(
			'tentang' => $get['tentang'],
			'fasilitas' => $get['fasilitas'],
			'sk' => $get['sk'],
			'bantuan' => $get['bantuan']
		);
		$this->mod->updateAll('profil',$data);
		return redirect()->to(base_url('a/infolain'));
	}
}
?>