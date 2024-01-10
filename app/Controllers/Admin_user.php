<?php
namespace App\Controllers;
use CodeIgniter\Config\Services;
use App\Models\Databasemodel;
class Admin_user extends BaseController{
	function __construct(){
		$this->mod = new Databasemodel();
		$this->db = db_connect();
	}

	public function index(){
		if(session()->get('high')){
			$data['data'] = $this->mod->getSome('pengguna',['level' => 'mid']);
			return view('admin/user',$data);
		}else if(session()->get('mid')){
			return redirect()->to(base_url('o'));
		}else if(session()->get('low')){
			return redirect()->to(base_url('c'));
		}else{
			return redirect()->to(base_url('a'));
		}
	}

	public function generateusername($x){
		$x = explode(" ", $x)[0];
		$ada = true;
		while($ada){
			$username = strtolower($x).rand(10,100);
			$cek = $this->mod->getSome('pengguna',['username' => $username]);
			if(count($cek) == 0){
				$ada = false;
			}
		}
		return $username;
	}

	public function save(){
		$get = $this->request->getPost();
		if($get['proses'] == 'simpan'){
			$foto = "";
			$file = $this->request->getPost('foto');
			if ( ! empty($file)) {
				$file = $this->request->getFile('foto');
				$foto = $file->getRandomName();
				$file->move('./assets/gambar/profil/', $foto);
			}
			$data = array(
				'idpengguna' => null,
				'nama' => $get['nama'],
				'jekel' => $get['jekel'],
				'alamat' => $get['alamat'],
				'telepon' => $get['telepon'],
				'email' => $get['email'],
				'username' => $this->generateusername($get['nama']),
				'password' => md5(123456),
				'level' => 'mid',
				'foto' => $foto,
				'otp' => '',
				'status' => '1'
			);
			$this->mod->inserting('pengguna',$data);
		}else{
			$data = array(
				'nama' => $get['nama'],
				'jekel' => $get['jekel'],
				'alamat' => $get['alamat'],
				'telepon' => $get['telepon'],
				'email' => $get['email'],
				'status' => $get['status']
			);
			$this->mod->updating('pengguna',$data,['idpengguna' => $get['id']]);
		}
		return redirect()->to(base_url('a/pengguna'));
	}

	public function delete($x){
		$foto = $this->mod->getData('pengguna',['idpengguna' => $x])['foto'];
		if($foto != ''){
			unlink('./assets/gambar/profil/'.$foto);
		}
		$this->mod->deleting('pengguna',['idpengguna' => $x]);
		$this->mod->deleting('tiket',['idpengguna' => $x]);
		$this->mod->deleting('respon',['idpengguna' => $x]);
		$this->mod->deleting('post',['idpengguna' => $x]);
		$this->mod->deleting('komentar',['idpengguna' => $x]);
		return redirect()->to(base_url('a/pengguna'));
	}
}
?>