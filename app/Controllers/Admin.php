<?php
namespace App\Controllers;
use CodeIgniter\Config\Services;
use App\Models\Databasemodel;
class Admin extends BaseController{
	function __construct(){
		$this->mod = new Databasemodel();
		$this->db = db_connect();
	}

	public function index(){
		if(session()->get('high')){
			$data['tahun'] = date('Y');
			return view('admin/landing',$data);
		}else if(session()->get('mid')){
			return redirect()->to(base_url('o'));
		}else if(session()->get('low')){
			return redirect()->to(base_url('c'));
		}else{
			return redirect()->to(base_url(''));
		}
	}

	public function showstatistic(){
		$get = $this->request->getPost();
		$data['tahun'] = $get['tahun'];
		return view('admin/landing',$data);
	}

	public function showprofile(){
		$data['data'] = $this->mod->getData('pengguna',['idpengguna' => session()->get('high')]);
		return view('admin/profile',$data);
	}

	public function changeprofile(){
		$get = $this->request->getPost();
		$cek = $this->db->query("select * from pengguna where idpengguna not in (".session()->get('high').") and username = '".$get['username']."'")->getResultArray();
		if(count($cek) == 0){
			$data = array(
				'nama' => $get['nama'],
				'alamat' => $get['alamat'],
				'telepon' => $get['telepon'],
				'email' => $get['email'],
				'username' => $get['username']
			);
		}else{
			$data = array(
				'nama' => $get['nama'],
				'alamat' => $get['alamat'],
				'telepon' => $get['telepon'],
				'email' => $get['email']
			);
		}
		$this->mod->updating('pengguna',$data,['idpengguna' => session()->get('high')]);
		return redirect()->to(base_url('a/profil'));
	}

	public function showaccess(){
		return view('admin/access');
	}

	public function changeaccess(){
		$get = $this->request->getPost();
		$p = $this->mod->getData('pengguna',['idpengguna' => session()->get('high')]);
		if($p['password'] == md5($get['p1'])){
			if($get['p2'] == $get['p3']){
				$this->mod->updating('pengguna',['password' => md5($get['p3'])],['idpengguna' => session()->get('high')]);
			}
		}
		return redirect()->to(base_url('a/akses'));
	}
}
?>